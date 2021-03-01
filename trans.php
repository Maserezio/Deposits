<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Оформление</title>
	<link rel="stylesheet" href="css/form.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png"  href="src/ico.png">
</head>
<body>
	<div class="form">
		<h1>Транзакция</h1>
			<form action="php/transback.php" method="post">
        <?php
        $mysql = new mysqli('localhost','root','root','bank');
        $email = $_COOKIE['user'];
        $result = $mysql->query("SELECT * FROM `deposits` WHERE `user_email`='$email'");
        ?>
        <div class="input-form">
          <select id="deposit" class = "select" name="depselect" required>
            <option class = "opt" VALUE = "" hidden selected>Вклад</option>
          <?php while($info = $result->fetch_assoc()):?>
                <option class = "opt" VALUE = "<?php echo $info['id']?>"> <?php echo $info['bank_name']?>-<?php echo $info['summ']?> </option>
          <?php endwhile?>
          </select>
          </div>
          <div class="input-form">
            <select id="type" class = "select" name="typeselect" required>
              <option class = "opt" VALUE = "" hidden selected>Тип операции</option>
              <option class = "opt" VALUE = "stop">Прерывание вклада</option>
              <option class = "opt" VALUE = "plus">Пополнение</option>
              </select>
  				</div>
          <div class="input-form">
            <input id="summ" type="number" name="summ" required placeholder="Сумма">
          </div>
				  <div class="input-form">
					  <input id="submit" type="submit" value="Выполнить">
			    </div>
		</form>
	</div>
  <script>
      var type = document.getElementById("type");
      var summ = document.getElementById("summ");
      type.addEventListener('input', function(){
      switch (type.value) {
        case "stop":
          summ.readOnly=true;
          break;
        case "plus":
          summ.readOnly=false;
          summ.setAttribute('max',500000);
          break;
      }
    })
  </script>
</body>
</html>
