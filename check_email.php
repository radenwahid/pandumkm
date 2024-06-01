<?php
require 'function.php';

$email = $_POST['email'];

if (isEmailRegistered($email)) {
    echo 'registered';
} else {
    echo 'not_registered';
}
