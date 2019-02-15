<?php 
	include 'database.php';

	session_start();

	//check to see if score is set_error_handler
	if(!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}	

	if($_POST) {
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		/*
		print_r($_POST);

		echo "<br>". $number;
		echo "<br>". $selected_choice;
		*/
		$next = $number+1;

		/* get total questions */
		$query = "SELECT * FROM questions";

		//get result
		$results = $mysqli->query ($query) or die ($mysqli->error .__LINE__);
		$total = $results->num_rows;

		/* Get correct choice */
		$query = "SELECT * FROM choices WHERE is_correct = 1 AND question_id = $number";

		//get result
		$result = $mysqli->query ($query) or die($mysqli->error .__LINE__);

		$row = $result->fetch_assoc();

		//set the correct choice
		$correct_choice = $row['id'];

		if($correct_choice == $selected_choice) {
			$_SESSION['score']++;
		}

		//check if the last
		if($number == $total) {
			header("Location: final.php");
			exit();
		} else {
			header("Location: question.php?n=".$next);
		}
	}
?>