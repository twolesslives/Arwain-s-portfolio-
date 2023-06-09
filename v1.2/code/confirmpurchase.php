<?php
    session_start();
//     if(!isset($_SESSION["username"])){
//         header("location:index.html");
// }
echo "hello?" 

?>
<?php 
    ini_set("display_errors", 1);  
    ini_set("display_warnings", 1);
    require_once('connect.php');

    $uid = $_SESSION["uid"];
    $oid = $_POST["oid"];
    $price = $_POST["price_quantity"];
    $db = connectToDB();
    $sql = 'INSERT INTO ecs_orders (order_id, user_id ,price )
    VALUES (:oid,:uid,:£££)
    INSERT INTO ecs_order_line (stock_id , quantity)
    SELECT ';

    //can have the discount applied furthur on when veiwing orders when displaying to screen based on account tier
    //instead of requireing a prior calculation before inserting into the orders table
    // use previous primary key itteration to act as the foreign key in the ecs oorderline table for insertion
    //$db->lastInsertid();

    $query = $db->prepare($sql);
    $query->bindValue(':id',$oid);
    $query->bindValue(':uid',$uid);
    $query->bindValue(':£££',$price);
    if ($query->execute()){
        $db = null;
        echo 'successful'. '<a href="../displaycart.php">Veiw cart</a> </br>';
        

    } else 'unsuccessful';

?>