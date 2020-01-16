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
            Header("Location: admin_login.php");
        }
    }

    function check_client_login(){
        if(isset($_SESSION["client_id"])){
            return true;
        }
        else{
            return false;
        }
    }

    function confirm_client_login(){
        if(check_client_login()==false){
            Header("Location: client_login.php");
        }
    }
 ?>
