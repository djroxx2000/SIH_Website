<?php
if (isset($_POST['admin-login'])) {

 require 'dbh.inc.php';
 $uid = $_POST["uid"];
 $pwd = $_POST["pwd"];

 if (empty($uid) || empty($pwd)) {
  header("Location: ../index.php?field=admin&err=emptyfields");
  exit();

 } else {
  $stmt = $con->prepare('SELECT admin_pwd, admin_uid, admin_id FROM admin_info WHERE admin_uid = ? OR admin_mail = ?');
  $stmt->bind_param('ss', $uid, $uid);
  $stmt->execute();
  $stmt->store_result();
  $numRows = $stmt->num_rows;
  if ($numRows === 0) {
   header("Location: ../index.php?field=admin&err=uidnotfound");
   exit();

  } else {
   $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
   $stmt->bind_result($db_pwd, $db_uid, $db_id);
   if (password_verify($pwd, $db_pwd == false)) {
    header("Location: ../index.php?field=admin&err=pwdnomatch&uid=" . $uid);
    exit();

   } else {
    session_start();
    $_SESSION['admin-id'] = $db_id;
    $_SESSION['admin-uid'] = $db_uid;
    header("Location: ../index.php?field=admin&login=success");
    exit();

   }

  }

 }

}