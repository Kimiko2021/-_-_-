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
	<link rel="stylesheet" type="text/css" href="/project/css/admin.css">
	
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
	
	<?php
// Обработка запроса на удаление
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['name_to_delete'])) {
    $name_to_delete = $conn->real_escape_string($_POST['name_to_delete']);
    // Диалоговое окно подтверждения будет обработано на стороне клиента с помощью JavaScript
    $stmt = $conn->prepare("DELETE FROM dolls WHERE id = ?");
    $stmt->bind_param("s", $name_to_delete);
    if ($stmt->execute()) {
        $message = "Товар удален успешно.";
        $messageType = 'success';
    } else {
        $message = "Ошибка при удалении: " . $stmt->error;
        $messageType = 'error';
    }
    $stmt->close();
}
?>

<div class="container">	
	<section>

        <h2>Управление записями</h2>
        <div class="flex-row">
            
			<form action="create_order.php" method="post">
                <button type="submit" class="button3">Добавить пост</button>
            </form>
			
			<form action="" method="post" class="right-aligned" onsubmit="return confirmDelete();">
            <select name="name_to_delete">
                <?php
                $sql = "SELECT id FROM dolls";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['id']}</option>";
                    }
                }
                ?>
            </select>
            <input type="hidden" name="delete" value="true">
            <button type="submit" class="button3">Удалить запись</button>
        </form>
        </div>
    </section>
	</div>
<script>
// Функция для отображения диалогового окна подтверждения
function confirmDelete() {
    return confirm('Вы уверены, что хотите удалить эту запись?');
}
</script>



	</body>
	</html>