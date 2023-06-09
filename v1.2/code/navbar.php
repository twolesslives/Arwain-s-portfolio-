<a href="index.php" class="button">Homepage</a>
<a href="shopfloor.php" class="button">Shop floor</a>
<a href="displaycart.php" class="button">My Cart</a>
<a href="myorders.php" class="button">My Orders</a>
<?php
    function nav_verifyLogin(){
        session_start();

        if(isset($_SESSION["username"])){
           
        echo '<a href="logout.php" class="button">Logout</a>';                
        }
        else{echo '<a href="login.php" class="button">Login</a>';}

}
nav_verifyLogin();
?>
