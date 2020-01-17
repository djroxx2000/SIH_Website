<?php

//Admin
function check_admin_login()
{
 if (isset($_SESSION["admin_id"])) {
  return true;
 } else {
  return false;
 }
}

function confirm_admin_login()
{
 if (check_admin_login() == false) {
  echo "Login Required";
  header("Location: admin_login.php");
 }
}

//Lawyer
function check_lawyer_login()
{
 if (isset($_SESSION["lawyer_id"])) {
  return true;
 } else {
  return false;
 }
}

function confirm_lawyer_login()
{
 if (check_lawyer_login() == false) {
  echo "Login Required";
  header("Location: admin_login.php");
 }
}