<?php
    if(isset($_POST["feedback"])){
        $name = $_POST["name"];
        $feedback = $_POST["comment"];
        require_once("includes/db.php");
        $con;
        if ($con) {
            $stmt = $con->prepare("INSERT INTO feedbacks(feedback_content, user_name)
            VALUES (?,?)");
            $stmt->bind_param('ss', $feedback, $name);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->affected_rows === -1) {
                echo "Error";
            }
            else {
               $stmt->close();
               echo "Feedback submitted";
           }
        }
    }
?>

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
                <li class="active">
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
                <li class="">
                    <a href="client_dashboard.php?q=notifications">
                        <span class="glyphicon glyphicon-bullhorn"></span>
                        &nbsp; Notifications
                    </a>
                </li>
            </ul>
        </div>   <!--div ending of vertical nav -->

        <div class="col-sm-10">
            <h1> Feedback </h1>
            <form method="post" action="client_dashboard.php?q=sendfeedback">
                <div class="form-group">
                    <label for="name">
                        * Your Name:
                    </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name " name="name" required>
                </div>

                <div class="form-group">
                    <label>* How do you rate your overall experience?</label>
                    <p>
                        <label class="radio-inline">
                        <input type="radio" name="experience" id="radio_experience" value="Worst" >
                            Worst
                        </label>

                        <label class="radio-inline">
                        <input type="radio" name="experience" id="radio_experience" value="bad" >
                            Bad
                        </label>

                        <label class="radio-inline">
                        <input type="radio" name="experience" id="radio_experience" value="average" >
                            Average
                        </label>


                        <label class="radio-inline">
                        <input type="radio" name="experience" id="radio_experience" value="good" >
                            Good
                        </label>


                        <label class="radio-inline">
                        <input type="radio" name="experience" id="radio_experience" value="Excellent" >
                            Excellent
                        </label>
                    </p>
                </div>

                <div class="form-group">
                    <label for="comments">
                        * Comments:
                    </label>
                    <textarea class="form-control" type="textarea" name="comment" id="comment" placeholder="Please enter your suggestions" maxlength="6000" rows="7"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="feedback" class="btn btn-lg btn-primary btn-block" >Send Feedback </button>
                </div>
            </form>
        </div>
    </div>
</div>
