<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, 
						initial-scale=1.0">
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="/project/css/main.css">
	<link rel="stylesheet" type="text/css" href="/project/css/login.css">
</head>
<body>
<body background="/project/images/fon.jpg" style="background-attachment: fixed; background-size: 100% 100%;">

	<header>Tasha Dolls</header>
<?php
$host = 'localhost';
	$user = 'root';
	$password = 'root';
	$database = 'project';

	$conn = new mysqli($host, $user, $password, $database);

	// Проверка соединения
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $name = $_POST['name'];
    $password = $_POST['password'];
    // Проверка существования пользователя
    $sql = "SELECT * FROM users WHERE name='$name' AND paswd='$password'";
	
    $result = $conn->query($sql);
	 
	if ($result->num_rows > 0) {
		// Пользователь найден, проверяем роль
		$row = $result->fetch_assoc();
		$user_id = $row["idusers"];
			session_id($user_id);
			session_start();
			$_SESSION['logged_in_user_id'] = $row["idusers"];
			$_SESSION['logged_in_user_name'] = $row["name"];
		if ($row['index_admin'] == 1) {
			// Пользователь является администратором
			header("Location: /project/home/admin/home1.php");
		} else {
			header("Location: /project/home/client/home1.php");
		}
		exit; // Важно завершить выполнение скрипта после перенаправления
	} else {
		// Пользователь не найден, выводим ошибку
		echo '<div class="notice error">Неверное имя пользователя или пароль</div>';
	}
}

$conn->close();
?>



	

	<!-- container div -->
	<div class="container" >

		<div class="form-section">

			<!-- login form -->
			<form class="login-box" method="post">
				<input
					class="email ele"
					type="text"
					id="name"
					name="name"
					placeholder="Ваш никнейм"
					required
				>
				<input
					class="password ele"
					type="password"
					id="password"
					name="password"
					placeholder="******"
					required
				>
				
				<button class="clkbtn" type="submit" id="submit">Login</button>
			</form>
		
			<div class="btn">
				<span class="text-signup">У меня нет аккаунта </span>
				<a class="signup" href="register.php"> Signup </a>
			</div>
		</div>
	</div>
	
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.getElementById('submit').addEventListener('click', function(event) {
			var nameInput = document.getElementById('name');
			var passwordInput = document.getElementById('password');
			
			var error = false;
			
			if (!nameInput.value.trim()) {
				nameInput.setAttribute('aria-invalid', 'true');
				error = true;
			} else {
				nameInput.removeAttribute('aria-invalid');
			}
			
			if (!passwordInput.value.trim()) {
				passwordInput.setAttribute('aria-invalid', 'true');
				error = true;
			} else {
				passwordInput.removeAttribute('aria-invalid');
			}
			
			if (error) {
				event.preventDefault(); // Предотвращаем отправку формы
				// Выводим сообщение об ошибке или другую обработку, если необходимо
			}
    });
});
</script>
	
	
</body>
</html>


