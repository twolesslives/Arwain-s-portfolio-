<?php
    ini_set("display_errors", 1);  
    ini_set("display_warnings", 1);

    require_once("code/verifylogin.php");
// require_once('connect.php');
verifyLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart PotHeaven</title>
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
    
    <main> 
<?php 
        
        $db = new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=OR22017317','OR22017317','22017317');
        $uid = $_SESSION["uid"];
        // $db connectToDB();
        $sql = 
        'SELECT ecs_shoppingcart.user_id,  ecs_shoppingcart.stock_id , ecs_shoppingcart.quantity , ecs_stock.price, ecs_stock.description
        FROM ecs_shoppingcart , ecs_stock
        WHERE ecs_shoppingcart.stock_id = ecs_stock.stock_id 
        AND user_id=:uid 
        ORDER BY stock_id';
        $query = $db->prepare($sql);
        $query->bindValue(':uid',$uid);
        $query->execute();
        $db = null;
    


        while($row = $query->fetch()){

            
        echo 'stock id: ' . $row["stock_id"] . ' Product Name:' .$row["description"] . ' Quantity: '. $row["quantity"]. '  Price:£' .$row["price"].  ' <br/>';
    }


?>
    <p1>This is the shopping cart where users can view and confirm purchases</p1><br/>

</main>

    
    <footer><?php include('code/footer.php') ?></footer><br/>
</body>
