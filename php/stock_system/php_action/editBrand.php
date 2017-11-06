<?php
	require_once 'core.php';

	$valid['success'] = array('success' => false, 'message' => array());

	if($_POST) {
		$brandName = $_POST['editBrandName'];
		$brandStatus = $_POST['editBrandStatus'];
		$brandId = $_POST['brandID'];

		$sqlStr = "UPDATE brands SET brand_name = '$brandName', brand_status = '$brandStatus' WHERE brand_id = '$brandId'";

		if($connect->query($sqlStr) === TRUE) {
			$valid['success'] = true;
			$valid['message'] = "Successfully updated";
		} else {
			$valid['success'] = false;
			$valid['message'] = "Error while updating the brand";
		}
		$connect->close();
		echo json_encode($valid);
	}
?>