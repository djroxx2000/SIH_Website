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
                <li class="active">
                    <a href="client_dashboard.php?q=notifications">
                        <span class="glyphicon glyphicon-bullhorn"></span>
                        &nbsp; Notifications
                    </a>
                </li>
            </ul>
        </div>
        <!--div ending of vertical nav -->

        <div class="col-sm-10" style="font-weight: bold; padding-bottom: 30px;">
            <?php
require_once "includes/db.php";
$con;
if ($con) {
	echo "<h1>Your Notifications</h1>";
	$stmt = $con->prepare("
                    SELECT case_type, case_details, lawyer_status
                    FROM cases WHERE clientforcase_id = ?");
	$cid = (int) $_SESSION['client_id'];
	$stmt->bind_param('i', $cid);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($ctype, $cdetail, $acc_status);
	while ($stmt->fetch()) {
		if ($acc_status == 'accepted') {
			echo "
                            <div>
                                <p  style='font-size:20px;font-family:Times New Roman;color:green;'>Your case of {$ctype} with details {$cdetail} has been {$acc_status}</p>
                            </div>
                            ";
		}
		if ($acc_status == 'rejected') {
			echo "
                            <div>
                                <p style='font-size:20px;font-family:Times New Roman;color:red;'>
                                    Your case of {$ctype} with details {$cdetail} has been {$acc_status}
                                </p>
                            </div>
                            ";
		}
	}
}
?>

        </div>
    </div>
</div>