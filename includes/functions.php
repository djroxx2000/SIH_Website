<?php

    function check_admin_login(){
        if(isset($_SESSION["admin_id"])){
            return true;
        }
        else{
            return false;
        }
    }


    function confirm_admin_login(){
        if(check_admin_login()==false){
            echo "Login Required";
            Header("Location: admin_login.php");
        }
    }
 ?>
