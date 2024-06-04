<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
try {
    // Server settingss
    $mail->isSMTP();
    $mail->Host = 'mail.smtp2go.com'; // Replace with your SMTP server hostname
    $mail->SMTPAuth = true;
    $mail->Username = 'PanduMKM'; // Replace with your SMTP username
    $mail->Password = 'vBLLdiigtHV3YMsJ'; // Replace with your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 2525; // TCP port to connect to
    $mail->isHtml(true);

    // You can set default recipients here or in your main script

} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    exit;
}

return $mail;
