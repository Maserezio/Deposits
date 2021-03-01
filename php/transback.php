<?php
  $depid = $_POST['depselect'];
  $type = $_POST['typeselect'];
  $summ = $_POST['summ'];
  $usmail = $_COOKIE['user'];
  $now = date("Y-m-d H:i:s");

  $mysql = new mysqli('localhost','root','root','bank');
  $temp = $mysql->query("SELECT `id` FROM `accounts` WHERE `email` = '$usmail'");
  $temp2 = $temp->fetch_assoc();
  $usid = $temp2['id'];

  switch ($type) {
    case 'plus':
      $mysql->query("INSERT INTO `transactions` (`deposit_id`, `account_id`, `date`, `type`, `summ`) VALUES ('$depid', '$usid', '$now', 'deposit', $summ)");
      $mysql->query("UPDATE `deposits` SET `summ` = `summ` + $summ WHERE `id` = '$depid'");
      break;
    case 'stop':
      $mysql->query("INSERT INTO `transactions` (`deposit_id`, `account_id`, `date`, `type`) VALUES ('$depid', '$usid', '$now','withdraw')");
      $mysql->query("DELETE FROM `deposits` WHERE `id` = '$depid'");
      break;
  }

  $mysql->close();
  header('Location: ../mydeps.php');
?>
