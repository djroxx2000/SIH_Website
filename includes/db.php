<?php

$host = 'localhost';
$user = 'root';
$pwd = 'agent viper';
$db = 'db';

$con = new mysqli($host, $user, $pwd, $db);

if ($con->connect_errno) {
    die("Connection failed: " . $con->connect_error);
}

?>
