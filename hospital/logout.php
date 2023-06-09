<?php
    session_start();
    unset($_SESSION["username"]);
//     if(!isset($_SESSION["username"])){
//         header("location:index.html");
// }

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
    <nav>Nav</nav>
    <main>
        <h3>you have been logged off</h3>
    <a href="index.html" class="button">Login</a> </br>
    </main>
    <footer>contact us:
        <img src="images/phone-receiver_318-47487.png">

    </footer>







</body>
</html>
