<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
</head>

<body>
    <form action="includes/signup.inc.php" method="POST">
        <input type="text" placeholder="Full Name" name="name" value="<?php if (!empty($_GET['name'])) {
 echo $_GET['name'];
}
?>">
        <input type="text" placeholder="Username" name="uid" value="<?php if (!empty($_GET['uid'])) {
 echo $_GET['uid'];
}
?>">
        <input type="text" placeholder="Email" name="mail" value="<?php if (!empty($_GET['mail'])) {
 echo $_GET['mail'];
}
?>">
        <input type="text" placeholder="Location" name="loc" value="<?php if (!empty($_GET['loc'])) {
 echo $_GET['loc'];
}
?>">
        <input type="password" placeholder="Password" name="pwd">
        <input type="password" placeholder="Retype Password" name="re-pwd">
        <input type="submit" name="admin-signup">
    </form>
</body>

</html>