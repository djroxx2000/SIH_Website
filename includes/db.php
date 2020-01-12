<?php

$host = 'host';
$user = 'user';
$pwd = 'pw';
$db = 'db';

$con = mysqli_connect($host, $user, $pwd);
$connectingdb=mysqli_select_db($con, $db);

if ($con->connect_errno) {
    die("Connection failed: " . $con->connect_error);
}

?>
