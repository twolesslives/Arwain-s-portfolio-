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
    $sid = $_POST["sid"];
    $sel_qty = $_POST["sel_quantity"];
    $db = connectToDB();
    $sql = 'INSERT INTO ecs_shoppingcart (user_id, stock_id ,quantity )
    VALUES (:uid,:sid,:qty)';

    $query = $db->prepare($sql);
    $query->bindValue(':uid',$uid);
    $query->bindValue(':sid',$sid);
    $query->bindValue(':qty',$sel_qty);
    if ($query->execute()){
        $db = null;
        echo 'successful'. '<a href="../displaycart.php">Veiw cart</a> </br>';
        

    } else 'unsuccessful';

?>