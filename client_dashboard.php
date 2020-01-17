<?php require_once("includes/sessions.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_client_login(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $_SESSION["client_name"]; ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/dashboard.css">
    <link rel="icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/2f7569df82.js" crossorigin="anonymous"></script>
    <link rel = "icon"
    href = "public/images/statue.jpg"
    type = "image/x-icon">
</head>

<body>

    <div class="title-bar">
        <div id="item1">
            <i class="fas fa-gavel fa-3x"></i>
            <h1>Court Case Information System</h1>
        </div>
        <div id="item2">
            <button class="sm" onclick="window.top.location='logout.php'">
                <span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;Logout
            </button>
        </div>
    </div>

    <?php
        if(!isset($_GET['q']))
            require_once("client/clientprofile.php");
        elseif($_GET['q'] == "addcase")
            require_once("client/addcase.php");
        elseif($_GET['q'] == "sendfeedback")
            require_once("client/sendfeedback.php");
        elseif($_GET['q'] == "currentcase")
            require_once("client/currentcase.php");
        elseif($_GET['q'] == "notifications")
            require_once("client/notifications.php");
        elseif($_GET['q'] == "updateinfo")
            require_once("client/updateinfo.php");
        elseif($_GET['q'] == "addtocase")
            require_once("client/addtocase.php");
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/76a3098157.js"></script>
</body>
</html>
