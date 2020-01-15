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
                    SELECT lawyer_first_name, lawyer_last_name, lawyer_email
                    FROM lawyer_login WHERE lawyer_id=?");
                    $stmt->bind_param('i', $_GET['id']);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($lawyer_first_name, $lawyer_last_name, $lawyer_email);
                    while ($stmt->fetch()) {
                        $lfn = $lawyer_first_name;
                        $lln = $lawyer_last_name;
                        $le = $lawyer_email;
                    }
                }
            ?>
           <div class="col-sm-10">
                <h1>Remove Lawyer</h1>
                <div class="alert alert-danger">
                    Are you sure you want to delete lawyer <?php echo $lfn;?>&nbsp;<?php echo $lln;?> ?
                    <br>
                </div>
                <form action="admin_dashboard.php?q=removelawyer&id=<?php echo $_GET['id']; ?>" method="post">
                    <button class="btn btn-success btn-block" name="delete-yes">
                        Yes
                    </button>
                    <button class="btn btn-danger btn-block" name="delete-no">
                        No
                    </button>
                </form>
                <br>

                <?php
                    if(isset($_POST['delete-yes'])){
                        if ($con) {
                            $stmt = $con->prepare("
                            DELETE FROM lawyer_login WHERE lawyer_id = ?");
                            $stmt->bind_param('i', $_GET['id']);
                            $stmt->execute();
                            echo "Deleted Lawyer";
                        }
                    }
                ?>

           </div>
        <?php } ?>
   </div>
</div>
