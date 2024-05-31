<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['logged_in_user_id'])) {
        die('Ошибка: пользователь не вошёл в систему.');
    }
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    $stmt = $conn->prepare("INSERT INTO comments (user, comm, date, post) VALUES (?, ?, NOW(), ?)");
    $stmt->bind_param("isi", $_SESSION['logged_in_user_id'], $comment, $id);
    $stmt->execute();
    $stmt->close();

    // Сохраняем текущую страницу в сессии
    $_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];

    // Перенаправляем пользователя на предыдущую страницу
    header("Location: " . $_SESSION['previous_page']);
    exit();
}

$conn->close();
?>
