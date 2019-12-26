<?php
if (isset($_POST['admin-signup'])) {

 require 'dbh.inc.php';

 echo "Hello";
 $name = $_POST['name'];
 $uid = $_POST['uid'];
 $mail = $_POST['mail'];
 $loc = $_POST['loc'];
 $pwd = $_POST['pwd'];
 $repwd = $_POST['re-pwd'];

 if (empty($name) || empty($uid) || empty($mail) || empty($pwd) || empty($repwd) || empty($loc)) {
  header("Location: ../admin_signup.php?err=emptyfields&uid=" . $uid . "&name=" . $name . "&mail=" . $mail);
  exit();

 } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-Z0-9]*$/', $username)) {
  header("Location: ../admin_signup.php?err=invalidmailuid&name=" . $name . "&loc=" . $loc);
  exit();

 } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../admin_signup.php?err=invalidmail&uid=" . $uid . "&name=" . $name . "&loc=" . $loc);
  exit();

 } elseif (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
  header("Location: ../admin_signup.php?err=invaliduid&name=" . $name . "&mail=" . $mail . "&loc=" . $loc);
  exit();

 } elseif ($pwd !== $repwd) {
  header("Location: ../admin_signup.php?err=pwdnomatch&uid=" . $uid . "&name=" . $name . "&mail=" . $mail . "&loc=" . $loc);
  exit();

 } else {

  try {
   $stmt = $con->prepare('SELECT * FROM admin_info WHERE admin_uid = ? OR admin_mail = ?');
   $stmt->bind_param('ss', $uid, $mail);
   $stmt->execute();

   $stmt->store_result();
   $numRows = $stmt->num_rows;

   if ($numRows > 0) {
    header("Location: ../admin_signup.php?err=takenuidmail&name=" . $name . "&loc=" . $loc);
    exit();

   } else {
    $stmt = $con->prepare('INSERT INTO admin_info (admin_uid, admin_mail, location, admin_pwd) VALUES (?, ?, ?, ?)');
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt->bind_param('ssss', $uid, $mail, $loc, $hashedpwd);
    $stmt->execute();

    if ($stmt->affected_rows === -1) {
     header("Location: ../admin_signup.php?err=sqlerror");
     exit();

    } else {
     $stmt->close();
     header("Location: ../index.php?signup=success");
     exit();

    }

   }

  } catch (Exception $e) {

  }

 }

} elseif (isset($_POST['lawyer-signup'])) {

 require 'dbh.inc.php';

} else {
 header("Location: ../index.php?inc=true");
}