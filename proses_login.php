<?php
session_start();

require 'function.php';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                // Set session
                $_SESSION["login"] = true;
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["email"] = $row["email"];

                header("Location: home.php");
                exit;
            } else {
                // Password salah
                $error = true;
            }
        } else {
            // Email tidak ditemukan
            $error = true;
        }
    } else {
        // Kesalahan dalam menjalankan kueri SQL
        header("Location: index.php?error=" . urlencode(mysqli_error($conn)));
        exit;
    }
}
