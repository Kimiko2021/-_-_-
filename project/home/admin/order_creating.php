<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $name = $_POST['name'];
    $sort = $_POST['sort'];
    $image = $_POST['image'];

    // Подготовка запроса
    $stmt = $conn->prepare("INSERT INTO dolls (description, date, image, type) VALUES (?, NOW(), ?, ?)");
    $stmt->bind_param("sss", $name, $image, $sort);

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "Заявка успешно создана";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>