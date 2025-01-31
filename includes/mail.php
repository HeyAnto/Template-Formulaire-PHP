<?php require_once "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = $_ENV["mail_Host"];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV["mail_Username"];
    $mail->Password   = $_ENV["mail_Password"];
    $mail->SMTPSecure = $_ENV["mail_SMTPSecure"];
    $mail->Port       = $_ENV["mail_Port"];

    //Recipients
    $mail->setFrom("from@example.com");
    $mail->addAddress("joe@example.net");

    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Sujet du mail";
    $mail->Body    = "Hello <b>world!</b>";
    $mail->AltBody = "Hello world!";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
