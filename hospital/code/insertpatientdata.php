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

    $txt_patNO = $_POST["txt_patient_number"];
    $txt_Name = $_POST["txt_patient_name"];
    $txt_patDOB = $_POST["txt_patient_DOB"];
    $txt_patCity = $_POST["txt_patient_city"];
    $txt_patBed = $_POST["txt_patient_bed"];
    $txt_patWard = $_POST["txt_patient_ward"];
    $sel_patGen = $_POST["sel_gender"];
    $txt_patImg = $_POST["txt_patient_img"];




    $db = connectToDB();
    $sql = 'INSERT INTO ec_patient (patient_number, patient_name, dob, city, bed_no, ward_number, gender, pat_img) 
    VALUES (:patNO, :patName, :patDOB, :patCity, :patBed, :patWard, :patGen, :patImg)';
    $query = $db->prepare($sql);
    $query->bindValue(':patNO', $txt_patNO);
    $query->bindValue(':patName',$txt_Name);
    $query->bindValue(':patDOB',$txt_patDOB);
    $query->bindValue(':patCity',$txt_patCity);
    $query->bindValue(':patBed',$txt_patBed);
    $query->bindValue(':patWard',$txt_patWard);
    $query->bindValue(':patGen',$sel_patGen);
    $query->bindValue(':patImg',$txt_patImg);


    // $query->execute();
    if ($query->execute()){
        $db = null;
        echo 'successful'. '<a href="../mainmenu.php">Home</a> </br>';
        

    } else 'unsuccessful';



?>