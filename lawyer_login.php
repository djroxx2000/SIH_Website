<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lawyer-Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="icon" href="public/images/statue.jpg" type="image/x-icon">
</head>

<body>

    <?php
if (isset($_POST["lawyer-login"])) {
	$email = ($_POST["lawyer-email"]);
	$password = ($_POST["lawyer-password"]);
	require_once "includes/db.php";
	$con;
	if ($con) {
		$stmt = $con->prepare("SELECT lawyer_id, lawyer_password, lawyer_first_name FROM lawyer_login WHERE lawyer_email = ?");
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($lawyer_id, $db_pwd, $lawyer_name);
		while ($stmt->fetch()) {
			$lawyer_pw = $db_pwd;
		}
		$numRows = $stmt->num_rows;
		if ($numRows === 0) {
			echo "email not found";
		} else {
			if (password_verify($password, $lawyer_pw) == false) {
				echo "invalid pw";
			} else {
				require_once "includes/sessions.php";
				$_SESSION["lawyer_id"] = $lawyer_id;
				$_SESSION["lawyer_name"] = $lawyer_name;
				header("Location: lawyer_dashboard.php?id=" . $lawyer_id);

			}
		}
	} else {
		echo "server prob";
	}
}
?>

    <div class="container">
        <form action="lawyer_login.php" method="post">
            <div class="imgcontainer">
                <img src="public/images/user.png" alt="Avatar" class="avatar">
                <br>
                <br>
                <label for="uname">
                    <h4>Login for Lawyers</h4>
                </label>
            </div>

            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="lawyer-email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="lawyer-password" id="pass" required>

                <button type="submit" name="lawyer-login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>&nbsp;
                <u class="custom-switch btn">
                    <input type="checkbox" class="custom-control-input" onclick="showPass()" id="customSwitches">
                    <label class="custom-control-label" for="customSwitches">Show Password</label>
                </u>
            </div>

            <div class="container" style="background-color:#fff">
                <button type="button" class="cancelbtn" onclick="window.location.href='index.php'">
                    Cancel
                </button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
            <a href="lawyer_signup.php"> Dont have account? Sign up </a>
        </form>
    </div>


    <script>
    function showPass() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

</body>

</html>