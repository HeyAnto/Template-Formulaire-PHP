<?php

// Inclusion de l'autoloader de Composer pour charger les dépendances
require "./vendor/autoload.php";

// Importation classes PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Chargement variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Nettoyer les données entrantes
function clear($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialisation des variables pour les messages d'erreur et de succès
$error = null;
$success = null;

// Vérification formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = clear($_POST["prenom"]);
    $nom = clear($_POST["nom"]);
    $email = clear($_POST["email"]);
    $objet = clear($_POST["objet"]);
    $message = clear($_POST["message"]);

    // Validation des champs du formulaire
    if (empty($prenom) || empty($nom) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($objet) || empty($message)) {
        $error = "Veuillez remplir tous les champs correctement.";
    } else {

        // Création instance PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = $_ENV["mail_Host"];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV["mail_Username"];
            $mail->Password   = $_ENV["mail_Password"];
            $mail->SMTPSecure = $_ENV["mail_SMTPSecure"];
            $mail->Port       = $_ENV["mail_Port"];

            // Destinataires
            $mail->setFrom($email, "$prenom $nom");
            $mail->addAddress("destinataire@example.com");

            // Encodage des caractères
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $objet;
            $mail->Body    = "<b>Prénom:</b> $prenom<br><b>Nom:</b> $nom<br><b>Email:</b> $email<br><br><b>Message:</b> $message";
            $mail->AltBody = "Prénom: $prenom\nNom: $nom\nEmail: $email\nMessage: $message";

            // Envoi de l'email
            $mail->send();

            $success = "Message envoyé avec succès.";
        } catch (Exception $e) {
            $error = "Une erreur s'est produite lors de l'envoi du message.";
        }
    }
}
?>

<!-- Affichage erreur/succès -->
<?php if (!empty($error)): ?>
    <div class="card-danger flex flex-column flex-center">
        <?php echo $error ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="card-success flex flex-column flex-center">
        <?php echo $success ?>
    </div>
<?php endif; ?>