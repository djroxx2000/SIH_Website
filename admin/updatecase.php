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
                <li class="">
                    <a href="admin_dashboard.php?q=feedbacks">
                        <span class="glyphicon glyphicon-comment"></span>
                        &nbsp; Feedbacks
                    </a>
                </li>
            </ul>
       </div>   <!--div ending of vertical nav -->

       <?php if(isset($_GET['id'])){ ?>
           <?php
                require_once("includes/db.php");
                $con;
                if ($con) {
                    $stmt = $con->prepare("
                    SELECT case_type, case_details, next_hearing_date, prev_hearing_date,
                    case_status, court_name
                    FROM cases WHERE case_id=?");
                    $stmt->bind_param('i', $_GET['id']);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($case_type, $case_details, $next_hearing_date,
                    $prev_hearing_date, $case_status, $court_name);
                    while ($stmt->fetch()) {
                        $c_type = $case_type;
                        $c_details = $case_details;
                        $next_hearing = $next_hearing_date;
                        $prev_hearing = $prev_hearing_date;
                        $c_status = $case_status;
                        $c_name = $court_name;
                    }
                }
            ?>
           <div class="col-sm-10">
                <h1>Update Case</h1>
                <form action="admin_dashboard.php?q=updatecase&id=<?php echo $_GET['id']; ?>" method="post">
                    <fieldset>
                    <div class="form-group">

                        <label for="case-type"> Case Type: </label>
                        <input class="form-control" type="text" name="case-type"
                        value="<?php echo $c_type; ?>" placeholder="case-type" required><br>

                        <label for="case-details"> Case details: </label>
                        <input class="form-control" type="text" name="case-details"
                        value="<?php echo $c_details; ?>" placeholder="case-details" required><br>

                        <label for="next-hearing-date"> Next hearing date(Format: dd-mm-yyyy): </label>
                        <input class="form-control" type="text" name="next-hearing-date"
                        value="<?php echo $next_hearing; ?>" placeholder="next-hearing-date"><br>

                        <label for="prev-hearing-date"> Prev hearing date(Format: dd-mm-yyyy): </label>
                        <input class="form-control" type="text" name="prev-hearing-date"
                        value="<?php echo $prev_hearing; ?>" placeholder="prev-hearing-date" required><br>

                        <label for="case-status"> Case Status(pending/finished): </label>
                        <input class="form-control" type="text" name="case-status"
                        value="<?php echo $c_status; ?>" placeholder="case-status" required><br>

                        <label for="court-name"> Court Name: </label>
                        <input class="form-control" type="text" name="court-name"
                        value="<?php echo $c_name; ?>" placeholder="court-name" required><br>

                        <input class="btn btn-info btn-block" type="submit" name="update-case" value="Update Case">
                    </div>
                </form>
           </div>
        <?php } ?>
   </div>
</div>


<?php
if(isset($_POST['update-case'])){
    $case_type = $_POST['case-type'];
    $case_details = $_POST['case-details'];
    $next_hearing_date = $_POST['next-hearing-date'];
    $prev_hearing_date = $_POST['prev-hearing-date'];
    $case_status = $_POST['case-status'];
    $court_name = $_POST['court-name'];
    require_once("includes/db.php");
    $con;
    if ($con) {
        $case_id = $_GET['id'];
        $stmt = $con->prepare("UPDATE cases SET
            case_type = ?, case_details = ?, next_hearing_date = ?,
            prev_hearing_date = ?, case_status = ?, court_name = ?
            WHERE case_id = ? ");

        $stmt->bind_param('ssssssi', $case_type, $case_details, $next_hearing_date,
        $prev_hearing_date, $case_status, $court_name, $case_id);
        $stmt->execute();
        echo "updated case";
    }
}
?>
