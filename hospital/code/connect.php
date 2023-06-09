<?php
/***********************
*author:arwain davies
*date7-2-2023
*note connection dredentials for compserver database
*/
    function connectToDB(){
        return new PDO('mysql:host=comp-server.uhi.ac.uk;dbname=OR22017317','OR22017317','22017317');
    };

?>