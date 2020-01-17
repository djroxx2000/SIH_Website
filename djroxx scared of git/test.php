<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
if (isset($_POST['submit'])) {
	require_once 'includes/dbpdo.php';
	$name = $_FILES['myfile']['name'];
	$type = $_FILES['myfile']['type'];
	$data = file_get_contents($_FILES['myfile']['tmp_name']);

	$stmt = $conpdo->prepare("INSERT INTO lawyer_login (lawyer_image, image_type) VALUES (?, ?)");
	$stmt->bindParam(1, $data);
	$stmt->bindParam(2, $type);
	$stmt->execute();
}
?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile" id="">
        <input type="submit" name="submit">
    </form>
    <?php
echo '<img src="lawyer_profile_image.php?id=41">  ';
?>
</body>

</html>