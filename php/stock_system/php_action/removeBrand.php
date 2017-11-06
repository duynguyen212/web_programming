<?php
	require_once 'core.php';

	$valid['success'] = array('success' => false, 'message' => array());

	$brandID = $_POST['brandID'];

	if ($brandID) {
		$sqlStr = "UPDATE brands SET brand_active = 0 WHERE brand_id = $brandID";

		if($connect->query($sqlStr)===TRUE) {
			$valid['success'] = true;
			$valid['message'] = "Successfully Removed";
		} else {
			$valid['success'] = false;
			$valid['message'] = "Error while removing";
		}
		
		$connect->close();
		
		echo json_encode($valid);
	}

	
?>