<?php 
ini_set("display_errors", 1);       //error messages appear hidden by default always remove before production.
ini_set("display_warnings", 1);
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
    <form action="code/validate.php" method="post">
            <input type="text" id="txt_username" name="txt_username" placeholder="Username"/>
            <br/>
            <input type="password" id="txt_password" name="txt_password" placeholder="Password"/>
            <br/>
            <button>Login</button><button type="reset">Reset</button>
        </form>
</br>
<p1>Don't have an account? <a href="makeaccount.php" class="button">Click Here</a></p1></br>

</main>

    
    <footer><?php include('code/footer.php') ?></footer><br/>
</body>
</html>

