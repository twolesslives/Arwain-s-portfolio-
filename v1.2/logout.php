<?php 
session_start();
    if (!isset($_SESSION["username"])) {
        header('location:index.php');
    }
    unset($_SESSION["username"]);
    
?>
you have been logged out. click the link to return to the homepage</br>
<a href="index.php" class="button">Homepage</a>