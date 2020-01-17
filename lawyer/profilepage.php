<?php
require_once "includes/db.php";
$stmt = $con->prepare("SELECT lawyer_first_name, lawyer_last_name, lawyer_email, lawyer_phone_no, lawyer_city, lawyer_address, lawyer_rating, specialization, image_type from lawyer_login WHERE lawyer_id = ?");
$stmt->bind_param('s', $_SESSION['lawyer_id']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($fname, $lname, $email, $phone, $city, $address, $rating, $special, $img_type);
$stmt->fetch();
// echo $_SESSION["lawyer_id"];

require_once "includes/dbpdo.php";
if (isset($_POST['img-submit'])) {
	$img_data = file_get_contents($_FILES['up-image']['tmp_name']);
	$img_type = $_FILES['up-image']['type'];
	$stmt = $conpdo->prepare("UPDATE lawyer_login SET lawyer_image = ?, image_type = ? WHERE lawyer_id = ?");
	$stmt->bindParam(1, $img_data);
	$stmt->bindParam(2, $img_type);
	$stmt->bindParam(3, $_SESSION['lawyer_id']);
	$stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <h1>
                    <?php echo $_SESSION["lawyer_name"]; ?>
                </h1>
                <br>

                <ul id="side_menu" class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="lawyer_dashboard.php">
                            <span class="glyphicon glyphicon-comment"></span>
                            &nbsp; Profile
                        </a>
                    </li>
                    <li class="">
                        <a href="lawyer_dashboard.php?q=currentcases">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            &nbsp; Current Cases
                        </a>
                    </li>
                    <li class="">
                        <a href="lawyer_dashboard.php?q=finishedcases">
                            <span class="glyphicon glyphicon-ok"></span>
                            &nbsp; Finished Cases
                        </a>
                    </li>
                    <li class="">
                        <a href="lawyer_dashboard.php?q=managerequests">
                            <span class="glyphicon glyphicon-briefcase"></span>
                            &nbsp; Manage Requests
                        </a>
                    </li>
                    <li class="">
                        <a href="lawyer_dashboard.php?q=invoice">
                            <span class="glyphicon glyphicon-credit-card"></span>
                            &nbsp; Your Invoice
                        </a>
                    </li>
                </ul>
            </div>
            <!--div ending of vertical nav -->

            <div class="col-sm-10">
                <h1>Your Profile</h1>
                <div class="profile_info">
                    <?php
echo '<form action="" method="post" enctype="multipart/form-data"><input type="file" name="up-image"><input type="submit" name="img-submit"></form>';

if (!$phone) {
	$phone = "<span class='text-muted'>Not given</span>";
}
if (!$city) {
	$city = "<span class='text-muted'>Not given</span>";
}
if (!$address) {
	$address = "<span class='text-muted'>Not given</span>";
}
?>
                    <img src="lawyer/lawyer_profile_image.php?id=<?php echo $_SESSION["lawyer_id"]; ?>" alt="">
                    <p class="profile__line">
                        Name: <div><?php echo "{$fname} {$lname}" ?>
                        </div>
                    </p>
                    <p class="profile__line">
                        Email: <div><?php echo $email ?>
                        </div>
                    </p>
                    <p class="profile__line">
                        Phone No: <div><?php echo $phone ?>
                        </div>
                    </p>
                    <p class="profile__line">
                        City: <div><?php echo $city ?>
                        </div>
                    </p>
                    <p class="profile__line">
                        Address: <div><?php echo $address ?>
                        </div>
                    </p>
                    <p class="profile__line">
                        Rating: <div class="rating-star" style='color: "white"'>
                            <i class="fas fa-star star1"></i>
                            <i class="fas fa-star star2"></i>
                            <i class="fas fa-star star3"></i>
                            <i class="fas fa-star star4"></i>
                            <i class="fas fa-star star5"></i>
                        </div>

                    </p>
                    <p class="profile__line"></p>

                    <div class="dom-target" style="display: none">
                        <?php echo $rating; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
    const rating_star = document.querySelector('.rating-star')
    const rating_stars = Array.from(rating_star.children);

    document.addEventListener('DOMContentLoaded', function() {
        rating(stars);
    })
    var stars = document.querySelector('.dom-target').textContent;

    function rating(stars) {
        if (stars == -1) {
            for (var i = 0; i < 5; i++) {
                rating_stars[i].style.color = "grey";
            }
            rating_star.innerHTML += "You have not been rated yet";
            return;
        }
        if (stars == 0) {
            for (var i = 0; i < 5; i++) {
                rating_stars[i].style.color = "white";
            }
            return;
        }
        for (var i = 0; i < stars; i++) {
            rating_stars[i].style.color = "gold";
        }
    }
    </script>

</body>

</html>