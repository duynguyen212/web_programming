<?php
    $host = "localhost";
    $user = "root";
    $pwd = "0212";
    $db = "stock";

    //DB connection command
    $connect = new mysqli($host, $user, $pwd, $db);
    
    //checking connection status
    if ($connect -> connect_error) {
        die ("Connection is failed! " . $connect -> connect_error);
    } /*else {
        echo "Connection is succeeded";
    }*/
        
?>