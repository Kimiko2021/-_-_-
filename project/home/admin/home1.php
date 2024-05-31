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
	<link rel="stylesheet" type="text/css" href="/project/css/home.css">
	
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
	
	 <div class="container1">
	<div class="hello_text">
	<div class="text1">Приветствую!</div>
	<div class="text2" style="text-align: center;">Меня зовут Таша и Вы попали в мою мастерскую.<br>
Здесь с любовью и вниманием создаются
работы, воплощающие мечты и фантазии.
<br>Моя цель - создавать уникальных кукол
с различными нарядами на все
случаи жизни.</div>
  </div>
  
  

</div>


<div class="card1">
<div class="text">
Каждая кукла в моей коллекции представляет собой отдельную личность, каждая из их уникальна.
</div>
</div>

  <?php
// Формируем SQL запрос с учетом выбранного фильтра
$sql = "SELECT * FROM dolls where type = 'doll' order by date limit 3";
$result = $conn->query($sql);
?>

<div class="container_dolls">
<?php if ($result->num_rows > 0){ ?>
        <?php while($row = $result->fetch_assoc()){ ?>
		<div class="card">
			  <img src="<?php echo $row["image"]; ?>" class="card__image" alt="" />
		</div>
<?php }}?>
</div>
 <div class="card1">
 <div class="text"> Каждая деталь сделана вручную</div>
 </div>
 <?php
// Формируем SQL запрос с учетом выбранного фильтра
$sql = "SELECT * FROM dolls where type = 'dress' order by date DESC limit 3";
$result = $conn->query($sql);
?>

<div class="container_dress">
<?php if ($result->num_rows > 0){ ?>
        <?php while($row = $result->fetch_assoc()){ ?>
		<div class="card">
			  <img src="<?php echo $row["image"]; ?>" class="card__image" alt="" />
		</div>
<?php }}?>
</div>
<div class="header"> 
Следуйте за своими мечтами!
</div>


<footer>
<p>г. Краснодар</p>
<p>+7(918)156-17-2Х</p>
<p >© 2024 TashaDolls</p>
</footer>



	</body>
	</html>