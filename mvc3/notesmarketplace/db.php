<?php
    
     
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_NAME = "notesmarketplace";


    $connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

    if(!($connection)){
        die(mysqli_connect_error());
    }
    


?>