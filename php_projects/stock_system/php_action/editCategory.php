<?php
	require_once 'core.php';

	$valid['success'] = array('success' => false, 'message' => array());

	if($_POST) {
		$categoryName = $_POST['editCategoryName'];
		$categoryStatus = $_POST['editCategoryStatus'];
		$categoryId = $_POST['categoryID'];

		$sqlStr = "UPDATE category SET categories_name = '$categoryName', categories_status = '$categoryStatus' WHERE categories_id = '$categoryId'";

		if($connect->query($sqlStr) === TRUE) {
			$valid['success'] = true;
			$valid['message'] = "Successfully updated";
		} else {
			$valid['success'] = false;
			$valid['message'] = "Error while updating the category";
		}
		$connect->close();
		echo json_encode($valid);
	}
?>