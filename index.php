<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>	Главная </title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<link rel="icon" type="image/png"  href="src/ico.png">
</head>
	<body>
		<?php require "blocks/header.php"?>
		<?php
			$mysql = new mysqli('localhost','root','root','bank');
			$usmail = $_COOKIE['user'];
			$temp = $mysql->query("SELECT `name`, `surname` FROM `users` WHERE `id` = (SELECT `user_id` FROM `accounts` WHERE `email` = '$usmail')");
			$temp2 = $temp->fetch_assoc();
			$name = $temp2['name'];
			$surname = $temp2['surname'];
			$mysql->close();
		?>
		<section class = "main">
		 	<?php  if($_COOKIE['user']==''):?>
		 <div class="slogan">
			 <h1 сlass = "h1">Здравствуйте!<br>Чтобы оформить вклад, авторизуйтесь</h1>
			 <a href="auth.php" class="butt">Войти</a>
		 </div>
	 		<?php else: ?>
			<div class="slogan">
				 <h1 сlass = "h1">Добро пожаловать,<br><?php echo "$name $surname"?></h1>
				 <a href="deposits.php" class="butt">Оформить вклад</a>
			 </div>
	  <?php endif;?>
		</section>
	</body>
</html>
