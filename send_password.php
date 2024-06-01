<?php
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
            $mail = require __DIR__ . "/mailer.php";
            if ($mail instanceof PHPMailer\PHPMailer\PHPMailer) { // Ensure the returned value is an instance of PHPMailer
                $mail->setFrom("noreply@example.com");
                $mail->addAddress($email);
                $mail->Subject = "Password Reset";
                $mail->Body = <<<END
Click <a href="http://example.com/resetpassword.php?token=$token">here</a>
to reset your password.
END;
                try {
                    $mail->send();
                    echo "Message sent, please check your inbox.";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Mailer setup failed.";
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
