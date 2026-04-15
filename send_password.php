<?php
require __DIR__ . "/vendor/autoload.php"; // Load PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mysqli = require __DIR__ . "/database.php";

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    $sql = "UPDATE user
        SET reset_token_hash = ?,
            token_expires_at = ?
        WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $token_hash, $expiry, $email);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $mail = new PHPMailer(true); // Create a new PHPMailer instance

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'mail.smtp2go.com'; // SMTP server address
                $mail->SMTPAuth = true;
                $mail->Username = 'PanduMKM'; // Your SMTP username
                $mail->Password = 'password'; // Your SMTP password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 2525;

                // Sender settings
                $mail->setFrom('fatharanisativa@umbandung.ac.id'); // Set the sender email and name
                $mail->addAddress($email); // Add recipient email address

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Password Reset PandUMKM Account';
                $mail->Body    = 'Click <a href="http://localhost/pandumkm/resetpw.php?token=' . $token . '">here</a> to reset your password.';

                $mail->send();
                echo 'Message sent, please check your <a href="https://mail.google.com/">email</a>.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "No user found with that email address."]);
            exit;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Email is required."]);
    exit;
}
