<?php
/***************************************************
 *  author: Magnus Tullock
 *  date: 7-2-2023
 *  Note: Connection credentials for comp-server DB 
 ***************************************************/

function connectToDB(){
    return new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=ORmthnc','ORmthnc','ORmthnc');
}

?>