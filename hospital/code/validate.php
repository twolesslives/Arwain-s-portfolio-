<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:index.html");
}

?>
<?php
//        ini_set("display_errors", 1);       //error messages appear hidden by default always remove before production.
//        ini_set("display_warnings", 1);
    session_start();
    require_once('connect.php');

    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];
    
    function validate($uid,$pwd)  {
       
        $db = connectToDB();

        $sql = 'SELECT forename FROM ec_staff WHERE staff_id = :staffId AND password = :pwd';

        $query = $db->prepare($sql);
        $query->bindParam(':staffId',$uid); //: mean placeholder 
        $query->bindParam(':pwd',$pwd);
        $query->execute();
        $db = null;

    
        if($query->rowCount() == 1){
            header('location:../mainmenu.php');
            $row = $query->fetch();
            $_SESSION["username"] = $row["forename"]; //could use to know if admin for teamworking */
        }
        else {
            header('location:../index.html');
        }


    }

    validate($username, $password);

    echo "UID: $username <br/> PWD: $password";

?>