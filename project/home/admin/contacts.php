<!DOCTYPE html>
<html lang="ru">
<head>

<?php
// Подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>

    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/project/css/main.css">
	<link rel="stylesheet" type="text/css" href="/project/css/contacts.css">
	
	<title>TASHA DOLLS</title>
	
<body background="/project/images/fon.jpg" style="background-attachment: fixed; background-size: 100% 100%;">

	<header>Tasha Dolls</header>
	<nav class="navigator">
		<a href="home1.php">ГЛАВНАЯ</a>
		<a href="dress.php">ОДЕЖДА</a>
		<a href="dolls.php">КУКЛЫ</a>
		<a href="contacts.php">КОНТАКТЫ</a> 
		<span>|</span>
		<a href="/project/home/admin/admin.php">Модерация</a>
		<a class="last" href="/project/start/logout.php">Выход</a>
	</nav>
	
	
	<div class="contacts_conteiner">
		<div>
		<div class="cont_img">
			<img src="/project/images/main.jpg" alt=""> 
		</div>
		</div>
		<div>
		<div class="title"></p>Изготавливаю одежду и обувь для испанских кукол<br>Паола Рейна и Паола Рейна мини, <br>а также текстильных кукол разного типа </p></div>
		<div class="city"></p>г. Краснодар</p></div>
		<div class="links">
			<p>WatsApp: +7(918)156-17-2Х</p>
			<p>Email: <a href="Lariska.lggle@gmail.com"> Lariska.lggle@gmail.com</a></p>
			<p>Телеграм: <a href="t.me/Lara_gl1">Lara</a></p>
		</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<footer>
<p>г. Краснодар</p>
<p>+7(918)156-17-2Х</p>
<p >© 2024 TashaDolls</p>
</footer>


	</body>
	</html>