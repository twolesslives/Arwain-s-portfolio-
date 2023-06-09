<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <link href="css/rules.css" rel="stylesheet" />
</head>
<body>
    <div class="back"></div>
    <header>
        <h1>Tullocks MediCare</h1>
        <span class="sub">You'll never leave!</span>
    </header>
    <nav></nav>
    <main>


        <?php

            ini_set("display_errors", 1);
            ini_set("display_warnings", 1);

            $db = new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=ORmthnc','ORmthnc','ORmthnc');
            $sql = 'SELECT * FROM ec_patient';
            $query = $db->prepare($sql);
            $query->execute();
            $db = null;                        

            while($row = $query->fetch()){
                echo $row["patient_name"] . '<br />';
            }

        ?>


    </main>
    <footer>
        123 Slice'em Way<br />
        Hurtsya Ave <br />
        Orkney
    </footer>
</body>
</html>