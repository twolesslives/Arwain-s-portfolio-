<?php 
require_once("code/verifylogin.php");
verifyLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link href="code/templates/template.css" rel="stylesheet"/>
    <script src="index.js"></script>
</head>
<body>
<h1>
    <?php include('code/header.php') ?>
    </h1><br/>
    <nav>
        <?php include('code/navbar.php') ?>
    </nav>
    Orders: </br>
    <?php
        $uid =$_SESSION["uid"]; 
 
        ini_set("display_errors", 1);     
        ini_set("display_warnings", 1);
        $db = new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=OR22017317','OR22017317','22017317');

        $sql = 'SELECT * FROM ecs_orders WHERE user_id = :uid ORDER BY order_id DESC';
        $query = $db->prepare($sql);
        $query->bindValue(':uid', $uid);
        $query->execute();
        $db = null;
        while($row = $query->fetch()){
        echo
         $row['order_id'] . '.'.
        '<a href="vieworder.php?oid='.$row["order_id"].'&uid='.$_SESSION["uid"].'">view</a>
        <br/>';
        };
        
    ?>
    <main> 


</main>

    
    <footer><?php include('code/footer.php') ?></footer><br/>
</body>
