<?php
	session_start();
	
	$login = filter_var(trim($_POST['Name']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['Info']), FILTER_SANITIZE_STRING);


	$pass = md5($pass . 'qweeqwweqweqweewq1123');

	$mysql = new mysqli('localhost', 'root', 'root', 'autorization'); // root изменен в настройках пхпадмин

	$result = $mysql->query("SELECT * FROM `autoriz` WHERE `login` = '$login' AND `password` = '$pass'");
	$user = $result->fetch_assoc();
	
	
	if (count((array)$user) == 0) {
		$_SESSION['message'] = "Пользователя не существует";
		header('Location: /auth.php');
	}

	if (isset($_POST['check']) && $_POST['check'] == '1') {
    $token = md5(uniqid(rand(), true));
    $_SESSION['token'] = $token;

    setcookie('user', $user['login'], time() + 3600 * 24 * 7, "/");
    setcookie('token', $token, time() + 3600 * 24 * 7, "/");
} else {
    $token = md5(uniqid(rand(), true));
    $_SESSION['token'] = $token;

    setcookie('user', $user['login'], 0, "/");
    setcookie('token', $token, 0, "/");
}


	$mysql->close();

	header('Location:/index.php');
?>
	<head>
		<meta charset="UTF-8">
		<title>МВД Волгограда</title>
		<link rel="stylesheet" href="vendor/normalize.css">
		<link rel="stylesheet" href="pages/authpage.css">
	</head>