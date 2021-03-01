<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($pass."asfadfdsafdsafdsaf");

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);

$passport_series = filter_var(trim($_POST['passort-series']), FILTER_SANITIZE_STRING);
$passport_number = filter_var(trim($_POST['passport-number']), FILTER_SANITIZE_STRING);

$currency = $_POST["curselect"];

$mysql = new mysqli('localhost','root','root','bank');
$check = $mysql->query("SELECT * FROM `users` WHERE `name`='$name' AND `surname`='$surname' AND
`passport_series`='$passport_series' AND `passport_number`='$passport_number'");
$user = $check->fetch_assoc();

if(count($user)==0) {
   $mysql->query("INSERT INTO `users` (`name`, `surname`, `passport_series`, `passport_number`)
   VALUES ('$name','$surname', '$passport_series', '$passport_number')");
}
else {}

$temp=$mysql->query("SELECT * FROM `users` WHERE `name`='$name' AND `surname`='$surname' AND
`passport_series`='$passport_series' AND `passport_number`='$passport_number'");
$temp2 = $temp->fetch_assoc();
$usid = $temp2['id'];

$result = $mysql->query("SELECT * FROM `accounts` WHERE `email`='$login'");
$account = $result->fetch_assoc();
if(count($account)!=0) {
  echo "Пользователь с таким email уже существует";
  exit();
}

$mysql->query("INSERT INTO `accounts` (`user_id`,`email`, `password`, `currency`) VALUES ('$usid','$login', '$password', '$currency')");
$mysql->close();
header("Location: ../auth.php");

?>
