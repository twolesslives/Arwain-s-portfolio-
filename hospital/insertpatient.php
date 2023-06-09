<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location:index.html");
}

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
    <form action="code/insertpatientdata.php" method="post" class="dataentry">   
    
    <input type="text" id="txt_patient_number" name="txt_patient_number" placeholder="patient number" ></input> </br>    
    <input type="text" id="txt_patient_name" name="txt_patient_name" placeholder="patient name"></input> </br>    
    <input type="date" id="txt_patient_DOB" name="txt_patient_DOB" placeholder="DOB name" ></input> </br>    
    <input type="text" id="txt_patient_city" name="txt_patient_city" placeholder="patient city" ></input> </br>    
    <input type="text" id="txt_patient_bed" name="txt_patient_bed" placeholder="patient bed" ></input> </br>    
    <input type="text" id="txt_patient_ward" name="txt_patient_ward" placeholder="patient ward" ></input> </br>    
    <select name="sel_gender" id="sel_gender">
        <option value=M>Male</option>
        <option value=F>Female</option>
        <option value=U>Undisclosed</option>
</select>
    <input type="text" id="txt_patient_img" name="txt_patient_img"  placeholder="patient picture (paste url)" ></input> </br>    
    <button>submit</button>
</form>


    </main>
    <footer>contact us:
        <img src="images/phone-receiver_318-47487.png">

    </footer>


</body>
</html>