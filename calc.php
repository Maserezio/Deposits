<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/calc.css">
    <link rel="icon" type="image/png"  href="src/ico.png">
    <title>Калькулятор</title>
</head>
<body>
  <?php require "blocks/header.php"?>
  <section class="main">
   <form action="depback.php" method="post">
      <div class="flex-wrapper">
          <div class="calculator-content">
              <div class="calculator-content-title">
                  <h1>Рассчитайте вклад</h1>
              </div>
              <div class="calculator-content-body">
                  <div class="calculator-content-body-left">
                      <div class="calculator-content-body-left-inputs">
                          <div class="input-wrapper">
                              <div class="title">Первоначальный взнос</div>
                              <div class="input">
                                  <input type="number" name = "initial-fee"  id="initial-fee" value="1">
                              </div>
                              <div class="input">
                                  <input type="range" name = "initial-fee-range" id="initial-fee-range" value="1" class="input-range">
                              </div>
                          </div>
                          <div class="input-wrapper">
                              <div class="title">Срок вклада</div>
                              <div class="input">
                                  <input type="number" name = "term" id="term" value="1">
                              </div>
                              <div class="input">
                                  <input type="range" name = "term-range" id="term-range" value="1" class="input-range">
                              </div>
                          </div>
                      </div>
                      <div class="calculator-content-body-left-btns">
                          <button type="button" data-name="citi" class="bank">
                              <div class="text">сitibank</div>
                              <div class="value">5%</div>
                          </button>
                          <button type="button" data-name="mkb" class="bank">
                              <div class="text">МКБ</div>
                              <div class="value">6%</div>
                          </button>
                          <button type="button" data-name="tinkoff" class="bank">
                              <div class="text">Тинькофф</div>
                              <div class="value">4,7%</div>
                          </button>
                          <button type="button" data-name="skb" class="bank">
                              <div class="text">СКБ-Банк</div>
                              <div class="value">5,2%</div>
                          </button>
                          <button type="button" data-name="gazprombank" class="bank">
                              <div class="text">ГазпромБанк</div>
                              <div class="value">5,96%</div>
                          </button>
                          <button type="button" data-name="keb" class="bank">
                              <div class="text">Кредит Европа Банк</div>
                              <div class="value">5,75%</div>
                          </button>
                      </div>
                  </div>
                  <div class="calculator-content-body-right">
                      <div class="final-results-wrapper">
                          <div class="final-result-item">
                              <div class="title">Вы получите</div>
                              <div class="value" id="final-summ">1<span> ₽|€|$</span></div>
                          </div>
                          <div class="final-result-item">
                              <div class="title">Вы вкладёте</div>
                              <div class="value" id="start-summ">0<span> ₽|€|$</span></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </form>
  </section>
 <script src="js\calc.js"></script>
</body>
</html>
