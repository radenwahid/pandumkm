<?php
$token = $_POST["token"];
$token_hash = hash("sha256", $token);

// Establish a database connection
$mysqli = new mysqli("localhost", "root", "", "pandumkm");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM user WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);

// Check if the prepare() call failed
if (!$stmt) {
    die("Error preparing statement: " . $mysqli->error);
}

$stmt->bind_param("s", $token_hash);
$stmt->execute();

// Check if the execute() call failed
if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
}

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["token_expires_at"]) <= time()) {
    die("Token has expired");
}

if (strlen($_POST["newpass1"]) < 8) {
    die("Password must be at least 8 characters");
}

if ($_POST["newpass1"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["newpass1"], PASSWORD_DEFAULT);

$sql = "UPDATE user
        SET password = ?,
            reset_token_hash = NULL,
            token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);

// Check if the prepare() call failed
if (!$stmt) {
    die("Error preparing statement: " . $mysqli->error);
}

$stmt->bind_param("ss", $password_hash, $user["id"]);
$stmt->execute();

// Check if the execute() call failed
if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
}

echo "Password updated. You can now <a href='index.php'>login</a>.";

$stmt->close();
$mysqli->close();
