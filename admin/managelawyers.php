<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <h1>
                <?php echo $_SESSION["admin_name"]; ?>
            </h1>
            <br>
            <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li class="">
                    <a href="admin_dashboard.php">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        &nbsp; Current Cases
                     </a>
                </li>
                <li class="">
                    <a href="admin_dashboard.php?q=finishedcases">
                        <span class="glyphicon glyphicon-ok"></span>
                        &nbsp; Finished Cases
                    </a>
                </li>
                <li class="active">
                    <a href="admin_dashboard.php?q=managelawyers">
                        <span class="glyphicon glyphicon-user"></span>
                        &nbsp; Manage Lawyers
                    </a>
                </li>
                <li class="">
                    <a href="admin_dashboard.php?q=feedbacks">
                        <span class="glyphicon glyphicon-comment"></span>
                        &nbsp; Feedbacks
                    </a>
                </li>
            </ul>
       </div>   <!--div ending of vertical nav -->

       <div class="col-sm-10">
            <h1>Lawyers</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr. no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone no.</th>
                        <th>City</th>
                        <th>Rating</th>
                    </tr>
                        <?php
                            require_once("includes/db.php");
                            $con;
                            if ($con) {
                                $x=1;
                                $stmt = $con->prepare("
                                SELECT lawyer_id, lawyer_first_name, lawyer_last_name, lawyer_email,
                                lawyer_phone_no, lawyer_city, lawyer_rating
                                FROM lawyer_login");
                                $stmt->execute();
                                $stmt->store_result();
                                $stmt->bind_result($lawyer_id, $lawyer_first_name, $lawyer_last_name,
                                $lawyer_email, $lawyer_phone, $lawyer_city, $lawyer_rating);

                                while ($stmt->fetch()) {
                                    if(!$lawyer_city)
                                        $lawyer_city="<span class='text-muted'>Not given</span>";
                                    if(!$lawyer_phone)
                                        $lawyer_phone="<span class='text-muted'>Not given</span>";
                                    if(!$lawyer_rating)
                                        $lawyer_rating="<span class='text-muted'>Not given</span>";
                                    echo "
                                    <tr>
                                        <td> {$x} </td>
                                        <td> {$lawyer_first_name} {$lawyer_last_name}</td>
                                        <td> {$lawyer_email} </td>
                                        <td> {$lawyer_phone} </td>
                                        <td> {$lawyer_city} </td>
                                        <td> {$lawyer_rating} </td>
                                    </tr>
                                    ";
                                    $x++;
                                }
                            }
                            else{
                                echo "Server Prob";
                            }
                        ?>
                </table>
            </div>
       </div>
   </div>
</div>
