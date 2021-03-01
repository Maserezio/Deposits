<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вход</title>
	<link rel="stylesheet" href="css/form.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">	<link rel="stylesheet" href="css/main.css">
	<link rel="icon" type="image/png"  href="src/ico.png">
</head>
<body>
	<div class="form">
		<h1>Вход</h1>
		<form action="php\check.php" method="post">
			<div class="input-form">
				<input type="email" name = "login" required placeholder="Логин">
			</div>
			<div class="input-form">
				<input type="password" name = "password" required placeholder="Пароль">
			</div>
			<div class="input-form">
				<input type="submit" value="Войти">
			</div>
		</form>
			<a href="reg.php" class="forget">Регистрация</a>

	</div>

</body>
</html>
