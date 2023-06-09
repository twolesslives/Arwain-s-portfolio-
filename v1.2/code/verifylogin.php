<?php

    function verifyLogin(){
        session_start();

        if(!isset($_SESSION["username"])){
           header('location:login.php');
        }
    }

?>