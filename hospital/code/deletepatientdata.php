<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:index.html");
}

?>

<?php
    // ini_set("display_errors", 1);  
    // ini_set("display_warnings", 1);
    require_once('connect.php');

    $txt_patNO = $_GET["patient_number"];




    $db = connectToDB();
    $sql ='DELETE FROM
    ec_patient
    WHERE patient_number = :patNo';
    $query = $db->prepare($sql);
    $query->bindValue(':patNo', $txt_patNO);



    // $query->execute();
    if ($query->execute()){
        $db = null;
        echo 'successful'. '<a href="../mainmenu.php">Home</a> </br>';
        

    } else 'unsuccessful';



?>