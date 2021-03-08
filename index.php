<?php
session_start();
if (!empty($_COOKIE['token']))
    if (!isset($_SESSION['token'])) {
        setcookie('user', '', time() - 3600, "/");
    } else {
        if ($_SESSION['token'] != $_COOKIE['token']) {
            unset($_SESSION['token']);
            setcookie('token', '', time() - 3600, "/");
            setcookie('user', '', time() - 3600, "/");
        }
    }
?>



<?php
if (empty($_COOKIE['user'])) :
?>

<head>
	<meta charset="UTF-8">
	<title>МВД Волгограда</title>
	<link rel="stylesheet" href="vendor/normalize.css">
	<link rel="stylesheet" href="pages/index.css">
</head>
<body>
<div>
	<a class="authentific" href="/authpage.php">Войти</a>
	<a class="registration" href="/reg.php">Зарегистрироваться</a>
</div>
<div class="page">
    <main class="main">
        <h1 class="main__info">Ситуация в Волгограде</h1>
        <img class="main__photo" src="images/volgograd.jpg">
    </main>
    <footer class="footer">
        <p class="footer__copyright">&copy;Метлицкий и Хакимов</p>
    </footer>
</div>
</body>

<?php
else :
?>

<head>
    <meta charset="UTF-8">
    <title>МВД Волгограда</title>
    <link rel="stylesheet" href="vendor/normalize.css">
    <link rel="stylesheet" href="pages/index.css">
</head>
<div>
<p>Привет, <?= $_COOKIE['user'] ?>
    &nbsp;
    <a class="authentific" href="exit.php">Выйти</a>
</p>
</div>
<body>
<div class="page">
    <header class="header">
        <a class="header__link" href="index.php">Главная</a>
        <a class="header__link" href="swat.php">Дежурные</a>
        <a class="header__link" href="crimes.php">Преступления</a>
    </header>
    <main class="main">
        <h1 class="main__info">Ситуация в Волгограде</h1>
        <img class="main__photo" src="images/volgograd.jpg">
    </main>
    <footer class="footer">
        <p class="footer__copyright">&copy;Метлицкий и Хакимов</p>
    </footer>
</div>
</body>

<?php
endif;
?>