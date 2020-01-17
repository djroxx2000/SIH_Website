<?php
require_once "includes/db.php";
$id = (int) $_SESSION["lawyer_id"];
if ($_GET['status'] == "accepted") {
	$stmt = $con->prepare("UPDATE notifications SET accepted_status = 'accepted' WHERE lawyer_id={$id} and client_id = {$_GET['id']}");
	$stmt1 = $con->prepare("UPDATE cases SET lawyer_status = 'accepted' WHERE lawyer_id_assigned={$id} and clientforcase_id = {$_GET['id']} and case_id = {$_GET['case_id']}");
} else {
	$stmt = $con->prepare("UPDATE notifications SET accepted_status = 'rejected' WHERE lawyer_id={$id} and client_id = {$_GET['id']}");
	$stmt1 = $con->prepare("UPDATE cases SET lawyer_status = 'rejected' WHERE lawyer_id_assigned={$id} and clientforcase_id = {$_GET['id']} and case_id = {$_GET['case_id']}");

}
$stmt->execute();
$stmt1->execute();
header("Location: lawyer_dashboard.php");