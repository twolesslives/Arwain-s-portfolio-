<?php
    ini_set("display_errors", 1);       
    ini_set("display_warnings", 1);

    require_once("code/connect.php");

    $db = connectToDB();
    $sql = "select * from ecs_stock WHERE stock_id = :stk_id";
    $query = $db->prepare($sql);
    $query->bindParam(':stk_id',$_GET["sid"]);
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
    <title>PotHeaven</title>
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
    
    <?php echo $row["description"] ?> </br>    
    Price:£<?php echo $row["price"] ?> </br>    
    Quantity in stock: <?php echo $row["qty_in_stock"] ?> </br> 
    Product id: <?php echo $row["stock_id"] ?> </br>   
    
    <?php
    if(isset($_SESSION["username"])){
           
        echo '<form action="code/InsertProductsIntoCart.php" method="post" class="dataentry">
      
        <select name="sel_quantity" id="sel_quantity">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
            <option value=6>6</option>
            <option value=7>7</option>
            <option value=8>8</option>
            <option value=9>9</option>
        </select>
        <input type="text" id="sid" name="sid" value="'. $row["stock_id"].'"  ></input> </br> 
        <button>Add to Shopping cart</button>
        </form>';                
        }
        else{echo '<p1>Please login to Add products to your shopping cart</p1> </br><a href="login.php" class="button">Login</a>';}

    ?>

    
    <?php
        $directory = $row['image_filepath'];
        $fileIndex = new FilesystemIterator($directory, FilesystemIterator::SKIP_DOTS);
        $imgcount = iterator_count($fileIndex);
        
        for ($index = 1; $index <= $imgcount; $index++){
            echo 
            '<div class="imgspace">
            <img class="imgresize" src="' . $directory . '/' . $index . '.jpg">
            </div> </br>';
            
            // echo '<img src="' . $directory . '/' . $index . '.jpg"> </br>';
        }


    ?>




<br/>

</main>

    
    <footer><?php include('code/footer.php') ?></footer><br/>
</body>