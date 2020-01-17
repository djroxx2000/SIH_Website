<?php require_once("includes/db.php");
require_once("includes/sessions.php");

if(!isset($_SESSION['clientname'])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['clientname'];
    ?></title>
    <link rel="stylesheet" href="public/css/carousel.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/2f7569df82.js" crossorigin="anonymous"></script>
    <link rel = "icon"
    href = "public/images/statue.jpg"
    type = "image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION["admin_name"]; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
                <button class="sm" id="home-login-btn" onclick="window.location.href ='index.php?loguot=true';">
                <span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;LogOut</button>
            </div>
        </div>


        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2" style="background-color: #bbded6;">
                <h1 style="color: #1b262c; text-align:center;">
                    <?php echo $_SESSION["clientname"]; ?>
                </h1>
                <br>
                <ul id="side_menu" class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="admindashboard.php">
                             <span class="glyphicon glyphicon-th"></span>
                             Dashboard
                          </a>
                    </li>
                    <li class="">
                        <a href="AddNewPost.php">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Add New Case
                        </a>
                    </li>
                    <li class="">
                        <a href="Categories.php">
                            <span class="glyphicon glyphicon-list-alt"></span> Current Cases
                        </a>
                    </li>
                    <li class="">
                        <a href="Admins.php">
                            <span class="glyphicon glyphicon-user"></span>
                            Manage Lawyers
                        </a>
                    </li>
                    <li class="">
                        <a href="Comments.php">
                            <span class="glyphicon glyphicon-comment"></span>
                            Feedbacks
                        </a>
                    </li>
                    <li class="">
                        <a href="Logout.php">
                            <span class="glyphicon glyphicon-off"></span>
                            LogOut
                        </a>
                    </li>
                </ul>
           </div>   <!--div ending of vertical nav -->
       </div>
   </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/76a3098157.js"></script>
  </body>
</html>

<?php

?>