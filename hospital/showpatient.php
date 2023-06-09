<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:index.html");
}

?>

<?php
// ini_set("display_errors", 1);       
// ini_set("display_warnings", 1);

require_once("code/connect.php");
$db = connectToDB();
$sql = "select * from ec_patient WHERE patient_number = :patNO";
$query = $db->prepare($sql);
$query->bindParam(':patNO',$_GET["pid"]);
$query->execute();
$db = null;
$row = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hotpital_template</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <img src="images/header.png" alt="Arwain_Care">

    </header>
    <nav> <?php include('code/navbar.php') ?></nav>
    <main>
    <form action="code/updatepatientdata.php" method="post" class="dataentry">   
    <?php echo $row["patient_number"] ?>
    <input type="hidden" id="txt_patient_number" name="txt_patient_number" value=<?php echo $row["patient_number"] ?> placeholder="patient number" ></input> </br>    
    <input type="text" id="txt_patient_name" name="txt_patient_name" value=<?php echo $row["patient_name"] ?> placeholder="patient name"></input> </br>    
    <input type="date" id="txt_patient_DOB" name="txt_patient_DOB" value=<?php echo $row["dob"] ?> placeholder="DOB name" ></input> </br>    
    <input type="text" id="txt_patient_city" name="txt_patient_city" value=<?php echo $row["city"]?> placeholder="patient city" ></input> </br>    
    <input type="text" id="txt_patient_bed" name="txt_patient_bed" value=<?php echo $row["bed_no"]?> placeholder="patient bed" ></input> </br>    
    <input type="text" id="txt_patient_ward" name="txt_patient_ward" value=<?php echo $row["ward_number"]?> placeholder="patient ward" ></input> </br>    
    <select name="sel_gender" id="sel_gender">
        <option value=M <?php if ($row["gender"] == 'M') echo "selected" ?>> Male</option>
        <option value=F <?php if ($row["gender"] == 'F') echo "selected" ?>> Female</option>
        <option value=U <?php if ($row["gender"] == 'U') echo "selected" ?>> Undisclosed</option>

    </select>
    <input type="text" id="txt_patient_img" name="txt_patient_img" value="<?php echo $row["pat_img"]?>" placeholder="patient picture (paste url)" ></input> </br>
    <button>submit</button>
</form> </br>
<!-- <a href="code/deletepatientdata.php" method="post" class="dataentry">delete</a> -->

<a href="code/deletepatientdata.php?patient_number=<?php echo $row["patient_number"]?>'">delete</a>

<br/>
 <img src=<?php echo $row["pat_img"]?>>
    </main>
    <footer>contact us:
        <img src="images/phone-receiver_318-47487.png">

    </footer>


</body>
</html>
 





    
 
    
<!-- php?uid=123456789 -->
