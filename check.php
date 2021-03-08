<?php
session_start();

$login = filter_var(trim($_POST['Name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['Info']), FILTER_SANITIZE_STRING);


$pass = md5($pass . 'qweeqwweqweqweewq1123');

$mysql = new mysqli('localhost', 'root', 'root', 'autorization'); // root изменен в настройках пхпадмин

$result = $mysql->query("SELECT * FROM `autoriz` WHERE login = '$login'");
$check_if = mysqli_num_rows($result);

if ($check_if) {
    $_SESSION['message'] = "Данный логин уже существует";
    header('Location: /reg.php');
    exit();
}

$mysql->query("INSERT INTO `autoriz` (`login` , `password`)
VALUES('$login','$pass') ");

$_SESSION['message'] = 'Регистрация прошла успешно!';

$mysql->close();

header('Location: /authpage.php');
?>