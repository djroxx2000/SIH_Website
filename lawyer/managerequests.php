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
                <li class="">
                    <a href="lawyer_dashboard.php?q=finishedcases">
                        <span class="glyphicon glyphicon-ok"></span>
                        &nbsp; Finished Cases
                    </a>
                </li>
                <li class="active">
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
            <h1>Notifications</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr. no</th>
                        <th>Client Name</th>
                        <th>Case Type</th>
                        <th>Case Details</th>
                        <th>Accept / Reject</th>
                    </tr>
                    <?php
require_once "includes/db.php";
$con;
if ($con) {
	$x = 1;
	$stmt = $con->prepare("SELECT notif_id, client_id, case_type, case_detail FROM notifications WHERE lawyer_id = ? AND accepted_status = 'not yet accepted'");
	$id = (int) $_SESSION['lawyer_id'];
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($notif_id, $client_id, $case_type, $case_detail);

	while ($stmt->fetch()) {

		$stmt1 = $con->prepare("SELECT client_first_name, client_last_name from client where client_id = ?");
		$stmt1->bind_param('i', $client_id);
		$stmt1->execute();
		$stmt1->store_result();
		$stmt1->bind_result($c_fname, $c_lname);
		$stmt1->fetch();

		$stmt2 = $con->prepare("SELECT case_id from cases WHERE lawyer_id_assigned = ? AND clientforcase_id = ? AND case_type = ? AND case_details = ?");
		$stmt2->bind_param("ssss", $id, $client_id, $case_type, $case_detail);
		$stmt2->execute();
		$stmt2->store_result();
		$stmt2->bind_result($case_id);
		$stmt2->fetch();

		echo "<tr>
                <td> {$x} </td>
                <td> {$c_fname} {$c_lname}</td>
                <td> {$case_type} </td>
                <td> {$case_detail} </td>
                <td>
                <a class='btn btn-success' href='lawyer_dashboard.php?q=addcase&id={$client_id}&status=accepted&case_id={$case_id}'>
                    Accept
                </a>
                <a class='btn btn-danger' href='lawyer_dashboard.php?q=addcase&id={$client_id}&status=rejected&case_id={$case_id}'> Reject
                </a>
                </td>
            </tr>";
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