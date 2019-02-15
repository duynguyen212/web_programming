<?php 
	include 'database.php';

	//set question number 
	$number = (int)$_GET['n'];

	/*
	*	Get the question 
	*/
	$query = "SELECT * FROM questions WHERE question_number =$number";

	//get result
	$result = $mysqli->query ($query) or die ($mysqli->error .__LINE__);

	$question = $result->fetch_assoc();

	/*
	*	Get the answer 
	*/
	$query = "SELECT * FROM choices WHERE question_id =$number";

	//get result
	$choices = $mysqli->query ($query) or die ($mysqli->error .__LINE__);

	/* 
	*	Get the total questions
	*/
	$query = "SELECT * FROM questions";

	//get result
	$results = $mysqli->query ($query) or die ($mysqli->error .__LINE__);
	$total = $results->num_rows;
?>

<?php session_start(); ?>

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
			<div class="current">
				Question <?php echo $question['question_number']; ?> of <?php echo $total; ?>
			</div>
			<p class="question">
				<?php echo $question['question_text'] ?>
			</p>
			<form action="process.php" method="post">
				<ul class="choices">
					<?php  while ($row = $choices->fetch_assoc()): ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']?>"> <?php echo $row['text']; ?></li>
					<?php endwhile; ?>
				</ul>
				<input type="submit" value="Submit">
				<input type="hidden" name="number" value="<?php echo $number; ?>">
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2018 by Tao Lao Group
		</div>
	</footer>
</body>
</html>