<?php
    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if ($_POST) {
        $categoryName = $_POST['categoryName'];
        $categoryStatus = $_POST['categoryStatus'];
        
        $sqlStr = "INSERT INTO category (categories_name, categories_active, categories_status) VALUES ('$categoryName',1,'$categoryStatus')";
        
        if ($connect->query($sqlStr) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = 'Successfully Added';
        } else {    
            $valid['success'] = false;
            $valid['messages'] = 'Error while adding the category.';
        }
        
        $connect->close();
        
        echo json_encode($valid);        
        
    } //if $_POST