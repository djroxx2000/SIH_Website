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
                <li class="active">
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
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr no.</th>
                        <th>Case Type</th>
                        <th>Case Details</th>
                        <th>Next Hearing Date</th>
                        <th>Case Status</th>
                        <th>Lawyer Status</th>
                    </tr>
                        <?php
                            require_once("includes/db.php");
                            $con;
                            if ($con) {
                                $cid = $_SESSION['client_id'];
                                $stmt = $con->prepare("
                                SELECT case_type, case_details, next_hearing_date,
                                case_status, lawyer_status
                                FROM cases WHERE clientforcase_id = ?");
                                $stmt->bind_param('s', $cid);
                                $stmt->execute();
                                $stmt->store_result();
                                $stmt->bind_result($case_type, $case_details,
                                $next_hearing_date, $case_status, $lawyer_status);
$x=1;		

                                while ($stmt->fetch()) {
                                    
                                    if(!$next_hearing_date)
                                        $next_hearing_date = "not yet decided";
                                    echo "
                                    <tr>
                                        <td> {$x} </td>
                                        <td> {$case_type} </td>
                                        <td> {$case_details} </td>
                                        <td> {$next_hearing_date} </td>
                                        <td> {$case_status} </td>
                                        <td> {$lawyer_status} </td>
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
