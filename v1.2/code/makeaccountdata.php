<?php
    ini_set("display_errors", 1);  
    ini_set("display_warnings", 1);
    require_once('connect.php');

    $txt_fore = $_POST["txt_forename"];
    $txt_sur = $_POST["txt_surname"];
    $txt_street = $_POST["txt_street"];
    $txt_town = $_POST["txt_town"];
    $txt_pc = $_POST["txt_postcode"];
    $txt_em = $_POST["txt_email"];
    $sel_memb = $_POST["sel_membership"];
    $txt_pw = $_POST["txt_password"];

    $db = connectToDB();
    $sql = 'INSERT INTO ecs_user (forename, surname, street, town, postcode, email, category, password) 
    VALUES (:ufore, :usur, :ustreet, :utown, :upc, :uem, :umemb, :upw)';
    $query = $db->prepare($sql);
    $query->bindValue(':ufore', $txt_fore);
    $query->bindValue(':usur',$txt_sur);
    $query->bindValue(':ustreet',$txt_street);
    $query->bindValue(':utown',$txt_town);
    $query->bindValue(':upc',$txt_pc);
    $query->bindValue(':uem',$txt_em);
    $query->bindValue(':umemb',$sel_memb);
    $query->bindValue(':upw',$txt_pw);

    // $query->execute();
    if ($query->execute()){
        $db = null;
        echo '<a href="../login">Successful! Click Here to login.</a> </br>';
        

    } else '<a href="../login">unsuccessful. Click Here to try again.</a> </br>';



?>