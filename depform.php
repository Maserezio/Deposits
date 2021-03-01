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
		<h1>Оформление</h1>
			<form action="php\depback.php" method="post">
				<?php
					$mysql = new mysqli('localhost','root','root','bank');
					$temp = $mysql->query("SELECT * FROM `banks`");
					$mysql->close();
				?>
				<div class="input-form">
          <select id="bank" class = "select" name="nameselect" required>
						<option class = "opt" VALUE = "" selected hidden>Банк</option>
						<?php while($info = $temp->fetch_assoc()):?>
	                <option class = "opt" VALUE = "<?php echo $info['name']?>"> <?php echo $info['name']?> </option>
	          <?php endwhile?>
            </select>
				</div>
				<?php
					$mysql2 = new mysqli('localhost','root','root','bank');
					$temp2 = $mysql2->query("SELECT * FROM `currency`");
					$mysql2->close();
				?>
				<div class="input-form">
					<select id="currency" class = "select" name="curselect" required>
						<option class = "opt"  VALUE= "" disabled selected hidden>Валюта вклада</option>
						<?php while($info2 = $temp2->fetch_assoc()):?>
	                <option class = "opt" VALUE = "<?php echo $info2['name']?>"> <?php echo $info2['full_name']?> </option>
	          <?php endwhile?>
					</select>
				</div>
				<div class="input-form">
					<input id="summ" type="number" name="summ" required placeholder="Сумма">
				</div>
				<div class="input-form">
					<input id="term" type="date" min = "2021-03-02" name="term" required placeholder="Cрок окончания вклада">
				</div>
				<div class="input-form">
					<input id="submit" type="submit" value="Оформить">
			  </div>
		</form>
	</div>
  <script>
      var bank = document.getElementById("bank");
      var date = document.getElementById("term");
      var summ = document.getElementById("summ");
      bank.addEventListener('input', function(){
      switch (bank.value) {
        case "сitibank":
          summ.setAttribute('min',1);
          summ.setAttribute('max',1000000);
          date.setAttribute('min',"2021-04-02");
          date.setAttribute('max',"2022-03-02");
          break;
        case "MКБ":
          summ.setAttribute('min',1);
          summ.setAttribute('max',1500000);
          date.setAttribute('min',"2021-04-02");
          date.setAttribute('max',"2022-03-02");
          break;
        case "Тинькофф":
          summ.setAttribute('min',50000);
          summ.setAttribute('max',1000000);
          date.setAttribute('min',"2021-06-01");
          date.setAttribute('max',"2023-03-02");
          break;
        case "СКБ-Банк":
          summ.setAttribute('min',10000);
          summ.setAttribute('max',100000000);
          date.setAttribute('min',"2021-11-27");
          date.setAttribute('max',"2021-11-27 ");
          break;
        case "ГазпромБанк":
          summ.setAttribute('min',50000);
          summ.setAttribute('max',1000000);
          date.setAttribute('min',"2022-03-04");
          date.setAttribute('max',"2024-03-01");
            break;
        case "Кредит Европа Банк":
          summ.setAttribute('min',100000);
          summ.setAttribute('max',1000000);
          date.setAttribute('min',"2024-03-10");
          date.setAttribute('max',"2024-03-10");
          break;
        default:
        break;
      }
    })
  </script>
</body>
</html>
