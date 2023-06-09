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
    <nav>

    <?php include('code/navbar.php') ?>
    </nav>
    <main>

<a href="mainmenu.php" class="button">Home</a> </br>
 <a href="showallpatients.php" class="button">All patients</a> </br>
 <a href="searchpatient.php" class="button">search patients</a> </br>
 <a href="insertpatient.php" class="button">insert patient</a> </br>
 <a href="logout.php" class="button">Logout</a> </br>

    </main>
    <footer>contact us:
        <img src="images/phone-receiver_318-47487.png">

    </footer>







</body>
</html>
