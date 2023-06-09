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
    <main>Main  </b> 
<?php

 /* data base psudocode
1. connect
2.authenticate
3.query
4.execute
5.do something
6.close connection
*/
//        ini_set("display_errors", 1);        error messages appear hidden by default always remove before production.
//        ini_set("display_warnings", 1);
//connect amd authentication
    $db = new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=OR22017317','OR22017317','22017317');

//query

    $sql = 'SELECT * FROM ec_patient ORDER BY patient_name';

//santitising (making sure none called "drop table")
    $query = $db->prepare($sql);
//execute
    $query->execute();
//close connection
    $db = null;

//do something
    while($row = $query->fetch()){
        echo
         $row['patient_name'] .
        '<a href="showpatient.php?pid='.$row["patient_number"].'">edit</a>
        <br/>';
    }

?>

    </main>
    <footer>contact us:
        <img src="images/phone-receiver_318-47487.png">

    </footer>







</body>
</html>