<?php
require_once "includes/sessions.php";
if (isset($_SESSION["admin_id"])) {
 $_SESSION["admin_id"] = null;
 $_SESSION["admin_name"] = null;
} elseif (isset($_SESSION["lawyer_id"])) {
 $_SESSION["lawyer_id"] = null;
 $_SESSION["lawyer_name"] = null;
} elseif (isset($_SESSION["client_id"])) {
 $_SESSION["client_id"] = null;
 $_SESSION["client_name"] = null;
}
session_destroy();
header("Location: index.php");
