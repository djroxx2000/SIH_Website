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
                <li class="">
                    <a href="lawyer_dashboard.php?q=managerequests">
                        <span class="glyphicon glyphicon-briefcase"></span>
                        &nbsp; Manage Requests
                    </a>
                </li>
                <li class="active">
                    <a href="lawyer_dashboard.php?q=invoice">
                        <span class="glyphicon glyphicon-credit-card"></span>
                        &nbsp; Your Invoice
                    </a>
                </li>
            </ul>
        </div>
        <!--div ending of vertical nav -->

        <div class="col-sm-10">
            <h1>Invoice Layout</h1>
            <?php
require_once "includes/db.php";
$con;
if ($con) {
	if (isset($_POST['invoice_submit'])) {
		$stmt = $con->prepare("INSERT INTO invoice (lawyer_id, retainer, hearing, consulting) VALUES (?,?,?,?)");
		$stmt->bind_param("iiii", $_SESSION['lawyer_id'], $_POST['retainer'], $_POST['hearing'], $_POST['consult']);
		$stmt->execute();
	}
	$stmt = $con->prepare("SELECT invoice_id from invoice WHERE lawyer_id = ?");
	$id = (int) $_SESSION['lawyer_id'];
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->store_result();
    $numRows = $stmt->num_rows;
	$stmt->bind_result($invoice_id);
	if ($numRows == 0) {
		echo '    <p>Please fill in details for your invoice layout</p>

            <form action="" method="post">
                <input type="text" placeholder="Retainer Fees" name="retainer">
                <input type="text" placeholder="Per Hearing Fees" name="hearing">
                <input type="text" placeholder="Consulting Fees" name="consult">
                <input type="submit" name="invoice_submit">
            </form>';
	} else {
		$stmt = $con->prepare("SELECT retainer, hearing, consulting from invoice where lawyer_id = ?");
		$stmt->bind_param('i', $_SESSION['lawyer_id']);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($retainer, $hearing, $consulting);
		$stmt->fetch();
		echo "
            <p class='invoice_info'>Retainer Fees: {$retainer} </p>
            <p class='invoice_info'>Per Hearing Fees: {$hearing} </p>
            <p class='invoice_info'>Consulting Fees: {$consulting} </p>
            ";
	}
} else {
	echo "Server Prob";
}
?>

        </div>
    </div>
</div>
