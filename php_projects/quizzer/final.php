<!-- <?php session_start(); ?> -->

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
			<h2>You're done</h2>
			<p>Congrats! You have completed the test </p>
			<p>Final Score: <?php echo $_SESSION['score']; ?></p>
			<a href="question.php?n=1" class="start" id="btnTake">Take Again</a>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2018 by Tao Lao Group
		</div>
	</footer>

	
</body>
</html>