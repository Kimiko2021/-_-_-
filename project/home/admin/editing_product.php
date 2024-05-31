<?php
// Подключение к базе данных
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

$message = '';
$messageType = '';

// Обработка POST-запроса для обновления данных
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
	$id = $conn->real_escape_string($_POST['sort']);
    $sort = $conn->real_escape_string($_POST['sort']);
    $structure = $conn->real_escape_string($_POST['structure']);
    $image = $conn->real_escape_string($_POST['image']);

    $stmt = $conn->prepare("UPDATE products SET type=?, description=?, image=? WHERE id=?");
    $stmt->bind_param("sss", $sort, $structure, $image);

    if ($stmt->execute()) {
        $message = "Запись обновлена успешно.";
        $messageType = 'success';
    } else {
        $message = "Ошибка: " . $stmt->error;
        $messageType = 'error';
    }
    $stmt->close();
}

$id = $id ?? $_GET['id'] ?? '';
// Получение текущего значения name для редактирования
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM dolls WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
		$sort = $row['type'];
        $structure = $row['description'];
        $image = $row['image'];
    } else {
        $message = "Товар не найден.";
        $messageType = 'error';
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара</title>
    <link rel="stylesheet" href="/project/css/style1.css">
</head>


<body>
<div class="container">
    <a href="admin.php" class="button">Вернуться на главную</a>
    <div style="height: 20px;"></div> 

    <h2>Редактирование товара: </h2>
	<h2 ><?php echo htmlspecialchars($id); ?></h2>
    <?php if (!empty($message)): ?>
        <div class="notice <?php echo $messageType === 'error' ? 'error' : 'success'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <form method="post">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	
        <label for="sort">Категория товара</label>
        <select id="sort" name="sort" required>
            <option value="">Выберите категорию записи</option>
			<option value="doll">Куклы</option>
			<option value="dress">Одежда</option>
        </select>
		<label for="structure">Описание</label>
        <textarea id="structure" name="structure" required> <?php echo htmlspecialchars($structure ?? ''); ?></textarea>
        
		<label for="user">Изображение</label>
        <input type="text" id="image" name="image" required value="<?php echo htmlspecialchars($image ?? ''); ?>">

        <button type="submit">Сохранить изменения</button>
    </form>
</div>


</body>
</html>