<?php

    $servername = '127.0.0.1';
    $username = 'remoteuser';
    $password = '4ndr0m3d@';
    $dbname = "Thelp02";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      
    // Check connection
    if(!$connection){
        die('Database connection error : ' .mysqli_error());
    }
    
?>
