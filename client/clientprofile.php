<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <h1>
                <?php echo $_SESSION["client_name"]; ?>
            </h1>
            <br>
            <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li class="active">
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
                    if(!$phone_no){
                        $phone_no = "<span class='text-muted'>Not given</span>";
                    }
                    if(!$address){
                        $address = "<span class='text-muted'>Not given</span>";
                    }
                    echo
                    "
                        <h1>Your Profile</h1>
                        <p>First Name: {$client_first_name}</p>
                        <p>Last Name: {$client_last_name}</p>
                        <p>Email: {$client_email}</p>
                        <p>Phone number: {$phone_no}</p>
                        <p>Address: {$address}</p>
                        <button onclick='window.location.href=`client_dashboard.php?q=updateinfo`'
                        class='btn btn-primary btn-lg'>Update info</button>
                    ";
                }
            ?>

        </div>
   </div>
</div>
