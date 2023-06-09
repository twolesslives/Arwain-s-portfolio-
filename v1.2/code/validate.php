<?php
    session_start();
    ini_set("display_errors", 1);       //error messages appear hidden by default always remove before production.
    ini_set("display_warnings", 1);

    require_once('connect.php');

    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];
    
    function validate($uid,$pwd)  {
       
        $db = connectToDB();

        $sql = 'SELECT * FROM ecs_user WHERE 
        email = :userId AND  password = :pwd';

        $query = $db->prepare($sql);
        $query->bindParam(':userId',$uid);
        $query->bindParam(':pwd',$pwd);
        $query->execute(); 

        $db = null;

    
        if($query->rowCount() == 1){
            $row = $query->fetch(); 
            $_SESSION["username"] = $row["forename"];
            $_SESSION["user_level"] = $row["catagory"];
            $_SESSION["uid"] = $row["user_id"];
            header('location:../myorders.php');
        }
        else {
            header('location:../index.php');
        }


    }

    validate($username, $password);

    echo "UID: $username <br/> PWD: $password";

?>