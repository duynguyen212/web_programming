<?php
	include 'database.php';

	$query = 'select * from shouts order by id desc';
	$shouts = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shout it!</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="container">
		<header>
			<h1>SHOUT IT! Shoutbox</h1>
		</header>
		<div id="shouts">
			<ul>
				<?php while ($row = mysqli_fetch_assoc($shouts)) : ?>
						<li class="shout"><span><?php echo $row['time']; ?> - </span> <strong><?php echo $row['user']; ?> : </strong><?php echo $row['message']; ?></li>
				<?php endwhile; ?>
				
			</ul>
		</div>
		<div id="input">
			<?php if (isset($_GET['error'])) : ?>
				<div class="error"><?php echo $_GET['error']; ?></div>
			<?php endif; ?>
			<form action="process.php" method="post">
				<input type="text" name="user" placeholder="Enter your name">
				<input type="text" name="message" placeholder="Enter your messages here">
				<br/>
				<input class="shoutit-btn" type="submit" name="submit" value="Send">
			</form>
		</div>
	</div>
</body>
</html>