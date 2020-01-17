<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <h1>
                <?php echo $_SESSION["lawyer_name"]; ?>
            </h1>
            <br>

            <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li class="">
                    <a href="lawyer_dashboard.php">
                        <span class="glyphicon glyphicon-comment"></span>
                        &nbsp; Profile
                    </a>
                </li>
                <li class="">
                    <a href="lawyer_dashboard.php?q=currentcases">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        &nbsp; Current Cases
                    </a>
                </li>
                <li class="active">
                    <a href="lawyer_dashboard.php?q=finishedcases">
                        <span class="glyphicon glyphicon-ok"></span>
                        &nbsp; Finished Cases
                    </a>
                </li>
                <li class="">
                    <a href="lawyer_dashboard.php?q=managerequests">
                        <span class="glyphicon glyphicon-briefcase"></span>
                        &nbsp; Manage Requests
                    </a>
                </li>
                <li class="">
                    <a href="lawyer_dashboard.php?q=invoice">
                        <span class="glyphicon glyphicon-credit-card"></span>
                        &nbsp; Your Invoice
                    </a>
                </li>
            </ul>
        </div>
        <!--div ending of vertical nav -->

        <div class="col-sm-10">
            <h1>Finished Cases</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr. no</th>
                        <th>Case type</th>
                        <th>Case details</th>
                        <th>Case status</th>
                        <th>Court Appointed</th>
                    </tr>
                    <?php
require_once "includes/db.php";
$con;
if ($con) {
	$x = 1;
	$stmt = $con->prepare("SELECT case_type, case_details, court_name FROM cases WHERE case_status = ? AND lawyer_id_assigned = ?");
	$status = "finished";
	$id = (int) $_SESSION['lawyer_id'];
	$stmt->bind_param('si', $status, $id);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($case_type,
		$case_details, $court_name);

	while ($stmt->fetch()) {
		echo "
                                    <tr>
                                        <td> {$x} </td>
                                        <td> {$case_type} </td>
                                        <td> {$case_details} </td>
                                        <td> Finished </td>
                                        <td> {$court_name} </td>
                                    </tr>
                                    ";
		$x++;
	}
} else {
	echo "Server Prob";
}
?>
                </table>
            </div>
        </div>
    </div>
</div>