<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>	Депозиты </title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
	<link rel="icon" type="image/png"  href="src/ico.png">
</head>
<body>
  		<?php require "blocks/header.php"?>
      <?php
      $mysql = new mysqli('localhost','root','root','bank');
      $email = $_COOKIE['user'];
      $result = $mysql->query("SELECT * FROM `deposits` WHERE `user_email`='$email'");
			?>
 <div class = "deposits">
    <div class="row">
     <?php while($info = $result->fetch_assoc()):?>
         <div class="infBlock">
        			<p class="infText"><?php echo $info['bank_name']?></p>
							<?php
							$bank = $info['bank_name'];
							$mysql2 = new mysqli('localhost','root','root','bank');
							$intRate = $mysql->query("SELECT `interest_rate` FROM `banks` WHERE `name` = '$bank'");
							$interestRate = $intRate->fetch_assoc();
							$mysql2->close();
							?>
        			<p class="infText"><?php echo $interestRate['interest_rate']?>% </p>
        			<p class="infText"><?php echo $info['date_of_start']?>—<?php echo $info['date_of_finish']?></p>
        			<p class="infText"><?php echo $info['summ']?> <?php echo $info['currency']?></p>
							<a href="trans.php" class="btn">Транзацкия</a>
        </div>
      <?php endwhile?>
    </div>
</div>
      <?php $mysql->close(); ?>
</body>
