<?php
session_start();    


    




        

        if(!isset($_SESSION["username"])){
           header('location:login.php');
        }
        else{
        if (($_SESSION["uid"]) != ($_GET["uid"])){
                header('location:login.php');
            };
    

        };

 
        
        $db = new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=OR22017317','OR22017317','22017317');
        $uid = $_SESSION["uid"];
        $oid = $_GET["oid"];
        // $db connectToDB();
        $sql = 'SELECT * FROM ecs_order_line WHERE order_id=:oid ORDER BY stock_id';
        $query = $db->prepare($sql);
        // $query->bindValue(':uid',$uid);
        $query->bindValue(':oid',$oid);
        $query->execute();
        $db = null;
        echo 'order:###  ' . $_GET["oid"] . '<br/>'; 
        
        while($row = $query->fetch()){
        
                echo 'stock id: ' . $row["stock_id"] . ' qty: '. $row["quantity"].' <br/>';
        }






echo  "wip";
?>
