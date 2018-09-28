<?php
    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if ($_POST) {
        $brandName = $_POST['brandName'];
        $brandStatus = $_POST['brandStatus'];
        
        $sqlStr = "INSERT INTO brands (brand_name, brand_active, brand_status) VALUES ('$brandName',1,'$brandStatus')";
        
        if ($connect->query($sqlStr) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = 'Successfully Added';
        } else {    
            $valid['success'] = false;
            $valid['messages'] = 'Error while adding the brands.';
        }
        
        $connect->close();
        
        echo json_encode($valid);        
        
    } //if $_POST
