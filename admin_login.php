<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client-Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="icon" href="public/images/statue.jpg" type="image/x-icon">
</head>

<body>

    <?php
if (isset($_POST["admin-login"])) {
	$email = ($_POST["admin-email"]);
	$password = ($_POST["admin-password"]);
	require_once "includes/db.php";
	$con;
	if ($con) {
		$stmt = $con->prepare("SELECT admin_id, admin_first_name, password FROM admin_login WHERE email = ?");
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($admin_id, $admin_first_name, $db_pwd);
		while ($stmt->fetch()) {
			$admin_pw = $db_pwd;
			$admin_name = $admin_first_name;
		}
		$numRows = $stmt->num_rows;
		if ($numRows === 0) {
			echo "email not found";
		} else {
			if (password_verify($password, $admin_pw) == false) {
				echo "invalid pw";
			} else {
				require_once "includes/sessions.php";
				$_SESSION["admin_id"] = $admin_id;
				$_SESSION["admin_name"] = $admin_name;
				header("Location: admin_dashboard.php?id=" . $admin_id);
			}
		}
	} else {
		echo "server prob";
	}
}
?>

    <!-- client login form -->
    <div class="container">
        <form action="admin_login.php" method="post">
            <div class="imgcontainer">
                <img src="public/images/user.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="admin-email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="admin-password" id="pass" required>

                <button type="submit" name="admin-login">Login</button>
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