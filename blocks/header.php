<link rel="stylesheet" href="css/main.css">
<header id="header" class="header">
  <div class="container">
    <div class="nav">
    <a href="index.php"><img class = "logo" src="src/bank_logo.png"></a>
      <ul class = "menu">
      <li>
        <a href="deposits.php">
          Депозиты
        </a>
      </li>
      <li>
        <a href="calc.php">
          Калькулятор
        </a>
      </li>
      <li>
        <?php  if($_COOKIE['user']==''):?>
          <a href="auth.php">
            Мои депозиты
          </a>
        <?php else: ?>
          <a href="mydeps.php">
            Мои депозиты
          </a>
        <?php endif;?>
      </li>
      </ul>
      <?php  if($_COOKIE['user']==''):?>
      <a href="auth.php" class="reg">
        Войти
      </a>
      <?php else: ?>
          <a href="php\exit.php" class="reg"> Выйти </a>
      <?php endif;?>

    </div>

  </div>
</header>
