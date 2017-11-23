<?php
	require_once 'core.php';

	$valid['success'] = array('success' => false, 'messages' => array());

	$categoryID = $_POST['categoryID'];

	if ($categoryID) {
		$sqlStr = "UPDATE category SET categories_active = 0 WHERE categories_id = $categoryID";

		if($connect->query($sqlStr)===TRUE) {
			$valid['success'] = true;
			$valid['messages'] = "Successfully Removed";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while removing";
		}
		
		$connect->close();
		
		echo json_encode($valid);
	}
?>