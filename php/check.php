<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password = md5($pass."asfadfdsafdsafdsaf");

$mysql = new mysqli('localhost','root','root','bank');
$result = $mysql->query("SELECT * FROM `accounts` WHERE `email`='$login' AND `password`='$password'");
$user = $result->fetch_assoc();

if(count($user)==0) {
  echo "Неверно введены логин или пароль";
  exit();
}

setcookie('user', $user['email'], time()+3600, "/");

$mysql->close();
header('Location: /');
 ?>
