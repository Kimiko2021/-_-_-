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
	<link rel="stylesheet" type="text/css" href="/project/css/posts.css">
	
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
	
	<div class="container_dolls">
    <?php
    // Формируем SQL запрос с учетом выбранного фильтра
    $sql = "SELECT * FROM dolls where type = 'doll'";
    $result = $conn->query($sql);
    ?>
    <?php if ($result->num_rows > 0){ ?>
        <?php while($row = $result->fetch_assoc()){ 
		?>
		<div class="card2">
		<?php $id = $row["id"];?>
			<form class="form" action="comments.php?id=<?php echo $row["id"]; ?>" method="post">
			<div class="card">
				<img src="<?php echo $row["image"]; ?>" class="card__image" alt="" />
			</div>
			
			<div class="description">
				<p><?php echo $row["description"]; ?></p>
			</div>
				<button onclick="Toggle1(this)" class="btn">&#10084;</button>
				<input class="butn" type="submit" value="Комментировать">
			</form>
        </div>
        <?php }}?>
    </div>

    <script>
        function Toggle1(btn) {
            if (btn.style.color == "red") {
                btn.style.color = "grey";
				
			} else {
                btn.style.color = "red";
            }
        }
    </script>
	
<footer>
<p>г. Краснодар</p>
<p>+7(918)156-17-2Х</p>
<p >© 2024 TashaDolls</p>
</footer>
	
	</body>
	</html>