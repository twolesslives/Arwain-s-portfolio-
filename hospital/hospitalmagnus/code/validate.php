<?php
    require_once('connect.php');
    
    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];

    function validate($uid, $pwd) {

        $db = connectToDB();

        $sql = 'SELECT forename FROM ec_staff WHERE staff_id = :staffId AND BINARY password = :pwd';
        $query = $db->prepare($sql);
        $query->bindParam(':staffId',$uid);
        $query->bindParam(':pwd',$pwd);
        $query->execute();
        $db = null;

        if($query->rowCount() == 1){
            header('location:../mainmenu.php');
        } else {
            header('location:../index.html');
        }
    }

    validate($username, $password);


?>