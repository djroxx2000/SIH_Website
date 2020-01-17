<?php
    // this form wont be connected to the main site.
    // admins can run this locally and signup whenever needed.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-signup</title>
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/signup.css">
    <link rel = "icon"
    href = "public/images/statue.jpg"
    type = "image/x-icon">
</head>

<body>

    <?php
        if(isset($_POST["admin-signup"])){
            $firstname=($_POST["admin-firstname"]);
            $lastname=($_POST["admin-lastname"]);
            $email=($_POST["admin-email"]);
            $password=($_POST["admin-password"]);
            require_once("includes/db.php");
            $con;
            if ($con) {
                $stmt = $con->prepare("SELECT * FROM admin_login WHERE email = ?");
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $stmt->store_result();
                $numRows = $stmt->num_rows;
                if ($numRows > 0) {
                    echo "Email already used.";
                }
                else{
                    $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $con->prepare("INSERT INTO admin_login(admin_first_name, admin_last_name, email, password)
                    VALUES (?,?,?,?)");
                    $stmt->bind_param('ssss', $firstname, $lastname, $email, $hashedpwd);
                    $stmt->execute();
                    if ($stmt->affected_rows === -1) {
                        echo "Error";
                        exit();
                    } else {
                        $stmt->close();
                        echo "signuped admin";
                        Header("Location: admin_login.php");
                        exit();
                    }
                }
            }
        }

    ?>

    <form action="admin_signup.php" method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an admin.</p>
          <hr>

          <label for="name"><b>First Name</b></label>
          <input type="text" placeholder="First Name" name="admin-firstname" required>

          <label for="name"><b>Last Name</b></label>
          <input type="text" placeholder="Last Name" name="admin-lastname" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="admin-email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="admin-password" id="pass" required>

            <u class="custom-switch btn" >
                <input type="checkbox" class="custom-control-input" onclick="showPass()" id="customSwitches" >
                <label class="custom-control-label" for="customSwitches">Show Password</label>
            </u>

          <div class="clearfix">
            <button type="submit" name="admin-signup" class="signupbtn">Sign Up</button>
          </div>
        </div>
      </form>


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
