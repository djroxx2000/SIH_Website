<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <h1>
                <?php echo $_SESSION["admin_name"]; ?>
            </h1>
            <br>
            <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li class="active">
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
                <li class="">
                    <a href="admin_dashboard.php?q=feedbacks">
                        <span class="glyphicon glyphicon-comment"></span>
                        &nbsp; Feedbacks
                    </a>
                </li>
            </ul>
       </div>   <!--div ending of vertical nav -->

       <div class="col-sm-10">
            <h1>Current Cases</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr. no</th>
                        <th>Case type</th>
                        <th>Case details</th>
                        <th>Prev hearing</th>
                        <th>Next hearing</th>
                        <th>Case status</th>
                        <th>Court Appointed</th>
                        <th>Update</th>
                    </tr>
                        <?php
                            require_once("includes/db.php");
                            $con;
                            if ($con) {
                                $x=1;
                                $stmt = $con->prepare("
                                SELECT case_id, case_type, case_details, next_hearing_date, prev_hearing_date, court_name
                                FROM cases WHERE case_status = ?");
                                $status = "pending";
                                $stmt->bind_param('s', $status);
                                $stmt->execute();
                                $stmt->store_result();
                                $stmt->bind_result($case_id, $case_type,
                                $case_details, $next_hearing_date,
                                $prev_hearing_date, $court_name);

                                while ($stmt->fetch()) {
                                    echo "
                                    <tr>
                                        <td> {$x} </td>
                                        <td> {$case_type} </td>
                                        <td> {$case_details} </td>
                                        <td> {$prev_hearing_date} </td>
                                        <td> {$next_hearing_date} </td>
                                        <td> Pending </td>
                                        <td> {$court_name} </td>
                                        <td><a class='btn btn-info' href='admin_dashboard.php?q=updatecase&id={$case_id}'> Update </button> </td>
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
