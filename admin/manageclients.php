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
                <li class="">
                    <a href="admin_dashboard.php?q=managelawyers">
                        <span class="glyphicon glyphicon-user"></span>
                        &nbsp; Manage Lawyers
                    </a>
                </li>
                <li class="active">
                    <a href="admin_dashboard.php?q=manageclients">
                        <span class="glyphicon glyphicon-comment"></span>
                        &nbsp; Manage Clients
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
            <h1>Clients</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr. no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone no.</th>
                        <th>Address</th>
                    </tr>
                        <?php
                            require_once("includes/db.php");
                            $con;
                            if ($con) {
                                $x=1;
                                $stmt = $con->prepare("
                                SELECT client_first_name, client_last_name, client_email,
                                phone_no, address
                                FROM client");
                                $stmt->execute();
                                $stmt->store_result();
                                $stmt->bind_result($client_first_name, $client_last_name,
                                $client_email, $phone_no, $address);

                                while ($stmt->fetch()) {
                                    if(!$phone_no)
                                        $lawyer_phone="<span class='text-muted'>Not given</span>";
                                    if(!$address)
                                        $address="<span class='text-muted'>Not given</span>";
                                    echo "
                                    <tr>
                                        <td> {$x} </td>
                                        <td> {$client_first_name} {$client_last_name}</td>
                                        <td> {$client_email} </td>
                                        <td> {$phone_no} </td>
                                        <td> {$address} </td>
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
