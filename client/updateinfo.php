<?php
    if(isset($_POST["update-info"])){
        $firstname=($_POST["fname"]);
        $lastname=($_POST["lname"]);
        $phone=($_POST["phone_no"]);
        $address=($_POST["address"]);

        require_once("includes/db.php");
        $con;
        if ($con) {
            $cid = $_SESSION['client_id'];
            $stmt = $con->prepare("UPDATE client SET client_first_name = ?
            , client_last_name = ? , phone_no = ? , address = ? WHERE client_id = ? ");
            $stmt->bind_param('sssss', $firstname, $lastname, $phone, $address, $cid);
            $stmt->execute();
            if ($stmt->affected_rows === -1) {
                echo "Error";
            } else {
                $stmt->close();
                echo "info updated";
                Header("Location: client_dashboard.php");
            }
        }
    }

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <h1>
                <?php echo $_SESSION["client_name"]; ?>
            </h1>
            <br>
            <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li class="">
                    <a href="client_dashboard.php">
                        <span class="glyphicon glyphicon-user"></span>
                        &nbsp; Profile
                     </a>
                </li>
                <li class="">
                    <a href="client_dashboard.php?q=addcase">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        &nbsp; Add case
                    </a>
                </li>
                <li class="">
                    <a href="client_dashboard.php?q=sendfeedback">
                        <span class="glyphicon glyphicon-comment"></span>
                        &nbsp; Send Feedback
                    </a>
                </li>
                <li class="">
                    <a href="client_dashboard.php?q=currentcase">
                        <span class="glyphicon glyphicon-ok"></span>
                        &nbsp; Current Case Info
                    </a>
                </li>
                <li class="">
                    <a href="client_dashboard.php?q=notifications">
                        <span class="glyphicon glyphicon-bullhorn"></span>
                        &nbsp; Notifications
                    </a>
                </li>
            </ul>
        </div>   <!--div ending of vertical nav -->

        <div class="col-sm-10" style="font-weight: bold; padding-bottom: 30px;">
            <?php
                require_once("includes/db.php");
                $con;
                if ($con) {
                    $stmt = $con->prepare("
                    SELECT client_first_name, client_last_name,
                    client_email, phone_no, address
                    FROM client WHERE client_id = ?");
                    $stmt->bind_param('s', $_SESSION['client_id']);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($cfn, $cln, $ce, $cph, $ca);
                    while ($stmt->fetch()) {
                        $client_first_name = $cfn;
                        $client_last_name = $cln;
                        $client_email = $ce;
                        $phone_no = $cph;
                        $address = $ca;
                    }
                    echo
                    "
                        <h1>Update Profile</h1><br>
                        <form action='client_dashboard.php?q=updateinfo' method='post'>
                            <label for='fname'>
                                First Name:
                            </label>
                            <input type='text' class='form-control' value='{$client_first_name}'
                            placeholder='First name' name='fname' required><br>

                            <label for='lname'>
                                Last Name:
                            </label>
                            <input type='text' class='form-control' value='{$client_last_name}'
                            placeholder='Last name' name='lname' required><br>

                            <label for='phone'>
                                Phone no:
                            </label>
                            <input type='number' class='form-control' value='{$phone_no}'
                            placeholder='Phone no' name='phone_no'><br>

                            <label for='add'>
                                Address:
                            </label>
                            <input type='text' class='form-control' value='{$address}'
                            placeholder='Address' name='address'><br>

                            <button class='btn btn-primary btn-lg btn-block' type='submit' name='update-info'>
                                Update info
                            </button>
                        </form>
                    ";
                }
            ?>

        </div>
   </div>
</div>
