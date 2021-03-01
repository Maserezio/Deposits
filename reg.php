<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" href="css/form.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">	<link rel="stylesheet" href="css/main.css">
	<link rel="icon" type="image/png"  href="src/ico.png">
</head>
<body>
	<div class="form">
		<h1>Регистрация</h1>
			<form action="php\sync.php" method="post">
				<div class="input-form">
					<input id="login" type="text" name="name" required placeholder="Имя">
				</div>
				<div class="input-form">
					<input id="login" type="text" name="surname" required placeholder="Фамилия">
				</div>
					<div class="input-form">
						<input id="login" type="text" pattern="[A-Z]{2}" name="passort-series" required placeholder="Серия паспорта">
					</div>
					<div class="input-form">
						<input id="login" type="number" pattern="[0-9]{6}" name="passport-number" required placeholder="Номер паспорта">
					</div>
				<div class="input-form">
					<input id="login" type="email" name="login" required placeholder="Адрес электронной почты">
				</div>
				<div class="input-form">
					<input id="password" type="password" name="password" required placeholder="Пароль">
				</div>
				<div class="input-form">
					<input id="password2" type="password" name="password2" required placeholder="Пароль ещё раз">
				</div>
				<?php
					$mysql2 = new mysqli('localhost','root','root','bank');
					$temp2 = $mysql2->query("SELECT * FROM `currency`");
					$mysql2->close();
				?>
					<select id="сurreg" style="margin-left:40px" class = "select" name="curselect" required>
						<option class = "opt"  VALUE= "" disabled selected hidden>Валюта счёта</option>
							<?php while($info2 = $temp2->fetch_assoc()):?>
		                <option class = "opt" VALUE = "<?php echo $info2['name']?>"> <?php echo $info2['full_name']?> </option>
		          <?php endwhile?>
					</select>
				<div class="input-form">
					<input id="submit" type="submit" value="Зарегистрироваться">
			  </div>
		</form>
	</div>
			<script>
	        document.addEventListener('DOMContentLoaded', function () {
	            var pass1 = document.getElementById('password'),
	                pass2 = document.getElementById('password2'),
	                submit = document.getElementById('submit');
	            pass1.addEventListener('input', function () {
	                this.value != pass2.value ? pass2.setCustomValidity('Пароли не совпадают') : pass2.setCustomValidity('');
	            })
	            pass2.addEventListener('input', function (e) {
	                this.value != pass1.value ? this.setCustomValidity('Пароли не совпадают') : this.setCustomValidity('');
	                !pass2.checkValidity() && submit.click();
	            })
	            submit.addEventListener('click', function (e) {
	                pass1.value == '' && e.preventDefault();
	            })
	        })
	    </script>
</body>
</html>
