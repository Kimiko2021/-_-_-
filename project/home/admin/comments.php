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
	<link rel="stylesheet" type="text/css" href="/project/css/comments.css">
	
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
	
	<div class="return">
			<button class = "history-button" id="history-button">Вернуться назад</button>
	</div>

	<script>
		document.getElementById('history-button').addEventListener('click', () => {
		  history.back();
		});
	</script>
	
	
	<?php
	$id = $_GET['id'];
// Формируем SQL запрос с учетом выбранного фильтра
$sql = "SELECT * from dolls where id = '$id'";
$result = $conn->query($sql);

?>
<?php if ($result->num_rows > 0){ 
$row = $result->fetch_assoc();
$image = $row["image"];
$description = $row["description"];?>

<div class="card2">
	<div class="image_dress">
		<img class="card__image1" src=<?php echo $image;?> alt="">
	</div>
	<div class="description">
		<p> <?php echo $description;?> </p>
	</div>

</div>


<?php }?>
	
	
	<form class="form_comm" id="form_comm" action="AddComment.php" method="post">
		
		<div>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="user" value="<?php session_start(); echo $_SESSION['logged_in_user_id']; ?>">
        </div>
		<div>
			<textarea id="comment" name="comment" required></textarea>
        </div>
		<div>
			<button class = "submit" type="submit">Отправить</button>
		</div>
		
	</form>
	
	
	
	<div class="conteiner_comm">
	<?php
	$id = $_GET['id'];
// Формируем SQL запрос с учетом выбранного фильтра
$sql = "SELECT u.name, c.date, c.post, c.comm
FROM comments c
JOIN users u ON c.user = u.name 
where post = '$id'
order by c.date
";
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0){ ?>
        <?php while($row = $result->fetch_assoc()){ 
		$name = $row["name"];
		$date = $row["date"];
		$comm = $row["comm"];
		
		?>
		<div class="comm">
			<a class="name"> <?php echo $name;?></a>
			<a class="date"> <?php echo $date;?> <br></a>
			<div class="commen">
			<a> > <?php echo $comm;?></a>
			</div>
		</div>
	
<?php }}?>
	</div>
	
	
	</body>
	</html>
	