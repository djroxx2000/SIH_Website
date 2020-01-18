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
                    SELECT user_name
                    FROM feedbacks WHERE feedback_id=?");
                    $stmt->bind_param('i', $_GET['id']);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($user_name);
                    while ($stmt->fetch()) {
                        $uname = $user_name;
                    }
                }
            ?>
           <div class="col-sm-10">
                <h1>Remove Feedback</h1>
                <div class="alert alert-danger">
                    Are you sure you want to delete feedback from  <?php echo $uname;?> ?
                    <br>
                </div>
                <form action="admin_dashboard.php?q=removefeedback&id=<?php echo $_GET['id']; ?>" method="post">
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
                            DELETE FROM feedbacks WHERE feedback_id = ?");
                            $stmt->bind_param('i', $_GET['id']);
                            $stmt->execute();
                            echo "Deleted Feedback";
                        }
                    }
                    if(isset($_POST['delete-no'])){
                        Header("Location: admin_dashboard.php?q=feedbacks");
                    }
                ?>

           </div>
        <?php } ?>
   </div>
</div>
