<?php
	$login = filter_var(trim($_POST['Name']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['Info']), FILTER_SANITIZE_STRING);


	$pass = md5($pass . 'qweeqwweqweqweewq1123');

	$mysql = new mysqli('localhost', 'root', 'root', 'autorization'); // root изменен в настройках пхпадмин

	$result = $mysql->query("SELECT * FROM `autoriz` WHERE `login` = '$login' AND `password` = '$pass'");
	$user = $result->fetch_assoc();
	if (count((array)$user) == 0) {
		echo "Такой пользователь не найден";
		exit();
	}

	setcookie('user', $user['name'], time() + 3600, "/");

	$mysql->close();

	header('Location:/index.html');
?>