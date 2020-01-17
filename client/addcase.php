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
                <li class="active">
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

        <div class="col-sm-10">
            <h1>Lawyers</h1><br>
            <div class="container">
                <div class="row" style="background-color: white;">

                    <?php
                        require_once("includes/db.php");
                        $con;
                        if ($con) {
                            $stmt = $con->prepare("
                            SELECT lawyer_id, lawyer_first_name, lawyer_last_name, lawyer_email
                            FROM lawyer_login");
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->bind_result($lid, $lfn, $lln, $le);
                            while ($stmt->fetch()) {
                                echo "
                                <div class='col-sm-3'>
                                    <div class='card' style='width: 18rem; text-align: center; margin-top: 2rem;'>
                                        <img src='public/images/user.png' width='40' height='40' class='card-img-top' alt='...'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>{$lfn} {$lln}</h5>
                                            <p class='card-text'>
                                                {$le}
                                            </p>
                                            <a href='client_dashboard.php?q=addtocase&id={$lid}' class='btn btn-primary'>Add to Case</a>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                        }
                    ?>
                </div>
            </div>  <!-- card container ends-->

        </div>  <!-- col-sm-10 ends-->
   </div>
</div>
