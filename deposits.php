<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>	Депозиты </title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/cards.css">
	<link rel="icon" type="image/png"  href="src/ico.png">
</head>
<body>
<?php require "blocks/header.php"?>
<?php
	$mysql = new mysqli('localhost','root','root','bank');
	$temp = $mysql->query("SELECT * FROM `banks`");
	$mysql->close();
?>
<div class = "deposits">
		<div class="row">
		 <?php while($banks = $temp->fetch_assoc()):?>
				 <div class="infBlock">
							<p class="infText"><?php echo $banks['name']?></p>
							<p class="infText"><?php echo $banks['interest_rate']?>% </p>
							<p class="infText"><?php echo $banks['min_term']?> - <?php echo $banks['max_term']?> дн.</p>
							<p class="infText"><?php echo $banks['min_summ']?> - <?php echo $banks['max_summ']?> ₽ | € | $</p>
							<?php  if($_COOKIE['user']==''):?>
							 <a href="auth.php" class="btn">Войти</a>
							 <?php else: ?>
							 <a href="depform.php" class="btn">Оформить</a>
							 <?php endif;?>
				</div>
			<?php endwhile?>
		</div>
</div>
</body>
</html>
