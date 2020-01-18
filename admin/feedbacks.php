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
                    <a href="admin_dashboard.php?q=feedbacks">
                        <span class="glyphicon glyphicon-comment"></span>
                        &nbsp; Feedbacks
                    </a>
                </li>
            </ul>
       </div>   <!--div ending of vertical nav -->

       <div class="col-sm-10">
            <h1>Feedbacks</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr. no</th>
                        <th>Feedback</th>
                        <th>User</th>
                        <th>Delete</th>
                    </tr>
                        <?php
                            require_once("includes/db.php");
                            $con;
                            if ($con) {
                                $x=1;
                                $stmt = $con->prepare("
                                SELECT feedback_id, feedback_content, user_name
                                FROM feedbacks");
                                $stmt->execute();
                                $stmt->store_result();
                                $stmt->bind_result($feedback_id, $feedback, $name);

                                while ($stmt->fetch()) {
                                    echo "
                                    <tr>
                                        <td> {$x} </td>
                                        <td> {$feedback} </td>
                                        <td> {$name} </td>
                                        <td>
                                            <a class='btn btn-danger' href='admin_dashboard.php?q=removefeedback&id={$feedback_id}'>
                                                Remove
                                            </a>
                                        </td>
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
