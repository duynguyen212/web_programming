<?php
	include 'database.php';

	/* 
	*	Get the total questions
	*/
	$query = "SELECT * FROM questions";

	//get result
	$results = $mysqli->query ($query) or die ($mysqli->error .__LINE__);
	$total = $results->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Php quizzer</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Test your php knowledge</h2>
			<p>This is a multiple choices quiz to test your knowledge of PHP</p>
			<ul>
				<li><strong>Number of questions:</strong> <?php echo $total; ?></li>
				<li><strong>Type:</strong> Multiple choices</li>
				<li><strong>Estimated time:</strong> <?php echo $total * 1; ?></li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz!</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2018 by Tao Lao Group
		</div>
	</footer>
</body>
</html>