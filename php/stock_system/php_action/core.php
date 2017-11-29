<?php
    require_once 'db_connect.php';

    // initialize a session
    session_start();

    if (!$_SESSION['userID']) {
        header ('location: http://duynguyen.dev/stock_system/index.php');
    }
?>