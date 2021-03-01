<?php
    $bank = $_POST['nameselect'];
    $currency = $_POST['curselect'];
    $summ = $_POST['summ'];
    $date = $_POST['term'];
    $email = $_COOKIE['user'];
    $start_date = date("Y-m-d");
    $accurate_date = date("Y-m-d H:i:s");
    $mysql = new mysqli('localhost','root','root','bank');
    $mysql->query("INSERT INTO `deposits` (`user_email`, `bank_name`,`date_of_start` ,`date_of_finish`, `summ`, `currency`)
    VALUES ('$email', '$bank','$start_date', '$date', '$summ', '$currency')");

    $result = $mysql->query("SELECT * FROM `accounts` WHERE `email` = '$email'");
    $ass = $result->fetch_assoc();
    $usid = $ass['id'];

    $dep = $mysql->query("SELECT `id` FROM `deposits` WHERE `user_email` = '$email' AND `bank_name` = '$bank' AND `date_of_start` = '$start_date' AND
    `date_of_finish` = '$date' AND `summ` = '$summ' AND `currency` = '$currency'");
    $assoc = $dep->fetch_assoc();
    $depid = $assoc['id'];

    $mysql->query("INSERT INTO `transactions` (`deposit_id`, `account_id`, `date`, `type`, `summ`) VALUES ('$depid', '$usid', '$accurate_date', 'creation', $summ)");

    $mysql->close();

    header('Location: ../index.php');
 ?>
