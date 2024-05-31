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
	<link rel="stylesheet" type="text/css" href="/project/css/checkout.css">
	
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

<div class="container">
    <div id="success_message" class="notice success" style="display: none;"></div>
    <div id="error_message" class="notice error" style="display: none;"></div>
    
    
    <form id="create_order_form" action="order_creating.php" method="post">
        <label for="sort">Категория</label>
        <select id="sort" name="sort" required>
            <option value="">Выберите категорию записи</option>
			<option value="doll">Куклы</option>
			<option value="dress">Одежда</option>
        </select>

        <label for="date">Описание</label>
        <input type="text" id="name" name="name" required>
		
		<label for="user">Изображение</label>
        <input type="text" id="image" name="image" required value="/project/images/">


        <button type="submit" id="submit_button">Отправить</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('create_order_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Отменяем стандартное поведение отправки формы
        var formData = new FormData(this);
        fetch('order_creating.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.startsWith('Ошибка:')) {
                document.getElementById('error_message').textContent = data;
                document.getElementById('error_message').style.display = 'block';
            } else {
                document.getElementById('success_message').textContent = "Запись успешно создана.";
                document.getElementById('success_message').style.display = 'block';
            }
        })
        .catch(error => {
            document.getElementById('error_message').textContent = 'Произошла ошибка при отправке запроса: ' + error;
            document.getElementById('error_message').style.display = 'block';
        });
    });
});
</script>
</body>
</html>