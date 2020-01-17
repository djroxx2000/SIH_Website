<?php
require_once "../includes/dbpdo.php";
$id = $_GET['id'];
$stmt = $conpdo->prepare("SELECT lawyer_image, image_type from lawyer_login where lawyer_id = ?");
$stmt->bindParam(1, $id);
$stmt->execute();
$row = $stmt->fetch();
header('Content-Type:' . $row['image_type']);
echo $row['lawyer_image'];