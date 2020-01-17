<?php require_once "includes/sessions.php";?>
<?php require_once "includes/functions.php";?>
<?php confirm_lawyer_login();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $_SESSION["lawyer_name"]; ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/dashboard.css">
    <link rel="icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/2f7569df82.js" crossorigin="anonymous"></script>
    <link rel="icon" href="public/images/statue.jpg" type="image/x-icon">
    <link rel="stylesheet" href="public/css/style.css">

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
if (!isset($_GET['q'])) {
	require_once "lawyer/profilepage.php";
} elseif ($_GET['q'] == "currentcases") {
	require_once "lawyer/currentcases.php";
} elseif ($_GET['q'] == "finishedcases") {
	require_once "lawyer/finishedcases.php";
} elseif ($_GET['q'] == "managerequests") {
	require_once "lawyer/managerequests.php";
} elseif ($_GET['q'] == "invoice") {
	require_once "lawyer/invoice.php";
} elseif ($_GET['q'] == "addcase") {
   require_once "lawyer/addcase.php";
}

?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/76a3098157.js"></script>
</body>

</html>
