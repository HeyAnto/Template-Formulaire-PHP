<?php

require "./vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Nettoyer les données
function clear($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$error = null;
$success = null;

// Vérification des champs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = clear($_POST["prenom"]);
    $nom = clear($_POST["nom"]);
    $email = clear($_POST["email"]);
    $objet = clear($_POST["objet"]);
    $message = clear($_POST["message"]);

    if (empty($prenom) || empty($nom) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($objet) || empty($message)) {
        $error = "Veuillez remplir tous les champs correctement.";
    } else {

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Débogage
            $mail->isSMTP();
            $mail->Host       = $_ENV["mail_Host"];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV["mail_Username"];
            $mail->Password   = $_ENV["mail_Password"];
            $mail->SMTPSecure = $_ENV["mail_SMTPSecure"];
            $mail->Port       = $_ENV["mail_Port"];

            // Recipients
            $mail->setFrom($email, "$prenom $nom");
            $mail->addAddress("joe@example.net");

            // Character encoding
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";

            // Content
            $mail->isHTML(true);
            $mail->Subject = $objet;
            $mail->Body    = "<b>Prénom:</b> $prenom<br><b>Nom:</b> $nom<br><b>Email:</b> $email<br><br><b>Message:</b> $message";
            $mail->AltBody = "Prénom: $prenom\nNom: $nom\nEmail: $email\nMessage: $message";

            $mail->send();
            $success = "Message envoyé avec succès.";
        } catch (Exception $e) {
            $error = "Une erreur s'est produite lors de l'envoi du message.";
        }
    }
}
?>

<!-- Alert Error/Success -->
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