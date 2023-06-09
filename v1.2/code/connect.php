<?php
/***********************
*author:arwain davies
*date:21-2-2023
*note: connection credentials for compserver database 
*/
    function connectToDB(){
        $dbHost = "comp-server.uhi.ac.uk";
        $dbName = "OR22017317";
        $dbUsername = "OR22017317";
        $dbPassword = "22017317";

        return new PDO("mysql:host=$dbHost;dbname=$dbName", "$dbUsername", "$dbPassword");
    }
?>