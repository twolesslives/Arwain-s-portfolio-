<?php
    ini_set("display_errors", 1);  
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
    <form action="code/makeaccountdata.php" method="post" class="dataentry">   
        
    <input type="text" id="txt_forename" name="txt_forename" placeholder="Forename" ></input> </br>    
    <input type="text" id="txt_surname" name="txt_surname" placeholder="Surname"></input> </br>        
    <input type="text" id="txt_street" name="txt_street" placeholder="Street" ></input> </br>    
    <input type="text" id="txt_town" name="txt_town" placeholder="Town" ></input> </br>    
    <input type="text" id="txt_postcode" name="txt_postcode" placeholder="Postcode" ></input> </br>    
    <input type="text" id="txt_email" name="txt_email" placeholder="Email Adress" ></input> </br>        
    <select name="sel_membership" id="sel_membership">
        <option value=gold>Gold</option>
        <option value=silver>Silver</option>
        <option value=bronze>Bronze</option>
    </select>
    <input type="password" id="txt_password" name="txt_password"  placeholder="Password" ></input> </br>    
    <button>submit</button>
    
    <br/>

</main>

    
    <footer><?php include('code/footer.php') ?></footer><br/>
</body>