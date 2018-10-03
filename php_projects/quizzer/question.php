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
				Question 1 of 5
			</div>
			<p class="question">
				What does PHP stand for?
			</p>
			<form action="process.php" method="post">
				<ul class="choices">
					<li><input type="radio" name="choice" value="1"> PHP: Hypertext Preprocessor</li>
					<li><input type="radio" name="choice" value="1"> PHP: Private Home Page</li>
					<li><input type="radio" name="choice" value="1"> PHP: Preprocessor Hypertext Page</li>
					<li><input type="radio" name="choice" value="1"> PHP: Personal Hypertext Preprocessor</li>
				</ul>
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