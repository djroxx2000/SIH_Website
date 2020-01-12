<?php

$host = 'localhost';
$user = 'root';
$pwd = 'agent viper';
$db = 'court_case_management';

$con = mysqli_connect($host, $user, $pwd);
$connectingdb=mysqli_select_db($con, $db);

if ($con->connect_errno) {
    die("Connection failed: " . $con->connect_error);
}

?>
