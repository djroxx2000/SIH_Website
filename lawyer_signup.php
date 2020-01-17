<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lawyer-signup</title>
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
        if(isset($_POST["lawyer-signup"])){
            $firstname=($_POST["lawyer-firstname"]);
            $lastname=($_POST["lawyer-lastname"]);
            $email=($_POST["lawyer-email"]);
            $password=($_POST["lawyer-password"]);
            require_once("includes/db.php");
            $con;
            if ($con) {
                $stmt = $con->prepare("SELECT * FROM lawyer_login WHERE lawyer_email = ?");
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $stmt->store_result();
                $numRows = $stmt->num_rows;
                if ($numRows > 0) {
                    echo "Email already used.";
                }
                else{
                    $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $con->prepare("INSERT INTO lawyer_login(lawyer_first_name, lawyer_last_name, lawyer_email, lawyer_password)
                    VALUES (?,?,?,?)");
                    $stmt->bind_param('ssss', $firstname, $lastname, $email, $hashedpwd);
                    $stmt->execute();
                    if ($stmt->affected_rows === -1) {
                        echo "Error";
                        exit();
                    } else {
                        $stmt->close();
                        echo "signuped lawyer";
                        Header("Location: lawyer_login.php");
                        exit();
                    }
                }
            }
        }

    ?>

    <form action="lawyer_signup.php" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up for Lawyers</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="name"><b>First Name</b></label>
            <input type="text" placeholder="First Name" name="lawyer-firstname" required>

            <label for="name"><b>Last Name</b></label>
            <input type="text" placeholder="Last Name" name="lawyer-lastname" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="lawyer-email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="lawyer-password" id="pass" required>

            <label>
                <input type="checkbox" checked="checked" name="remember"  style="margin-bottom:15px"> Remember me
            </label>&nbsp;
            <u class="custom-switch btn" >
                <input type="checkbox" class="custom-control-input" onclick="showPass()" id="customSwitches" >
                <label class="custom-control-label" for="customSwitches">Show Password</label>
            </u>

            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" class="cancelbtn" onclick="window.location.href='index.php'">
                    Cancel
                </button>
                <button type="submit" name="lawyer-signup" class="signupbtn">Sign Up</button>
            </div>
            <a href="lawyer_login.php"> Have account? Login </a>
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
