<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pandumkm";

$mysqli = new mysqli($host, $user, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

return $mysqli;
