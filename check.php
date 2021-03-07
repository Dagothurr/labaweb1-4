<?php
$login = filter_var(trim($_POST['Name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['Info']), FILTER_SANITIZE_STRING);


$pass = md5($pass . 'qweeqwweqweqweewq1123');

$mysql = new mysqli('localhost', 'root', 'root', 'autorization'); // root изменен в настройках пхпадмин
$mysql->query("INSERT INTO `autoriz` (`login` , `password`)
VALUES('$login','$pass') ");
$mysql->close();

header('Location:/index.html');
?>