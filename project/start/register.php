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
<body background="/project/images/fon.jpg" style="background-attachment: fixed; background-size: 100% 100%;">

	<header>Tasha Dolls</header>
	<?php
	// Подключение к базе данных
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
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['password_confirmation'];

		// Проверка на совпадение пароля и его подтверждения
		if ($password !== $confirmPassword) {
			echo '<div class="notice error">Пароль и его подтверждение не совпадают</div>';
		} else {
			// Проверка на существование пользователя с таким же именем или email
			$sql_check = "SELECT * FROM users WHERE name='$name' OR email='$email'";
			$result_check = $conn->query($sql_check);

			if ($result_check->num_rows > 0) {
				// Пользователь уже существует, выводим ошибку
				echo '<div class="notice error">Пользователь с таким именем или email уже существует</div>';
			} else {
				// Пользователя нет, добавляем в базу данных
				$sql_insert = "INSERT INTO users (Name, Mail, paswd, index_admin) VALUES ('$name', '$email', '$password', 0)";
				if ($conn->query($sql_insert) === TRUE) {
					// Регистрация прошла успешно, перенаправляем на страницу приветствия
					header("Location: /project/start/login.php");
					exit; // Важно завершить выполнение скрипта после перенаправления
				} 
				else {
					echo "Error: " . $sql_insert . "<br>" . $conn->error;
				}	
			}
		}
	}

	$conn->close();
	?>
	
	
	
<!-- container div -->
	<div class="container">

		<!-- upper button section to select
			the login or signup form -->
		<div class="slider"></div>
		

		<!-- Form section that contains the
			login and the signup form -->
		<div class="form-section">
	<!-- signup form -->
			<form class="login-box" method="post">
				<input type="text"
					id="name" name="name"
					class="name ele"
					placeholder="Ваш никнейм">
				<input type="email"
					id="email" name="email"
					class="email ele"
					placeholder="youremail@email.com">
				<input type="password"
					id="password" name="password"
					class="password ele"
					placeholder="password">
				<input type="password"
					id="password_confirmation" name="password_confirmation"
					class="password ele"
					placeholder="Confirm password">
				<button class="clkbtn" type="submit" id="submit1" disabled>Signup</button>
			
			</form>
			
			<div class="btn">
				<span class="text-signup">У меня есть аккаунт </span>
				 <a  href="login.php"> Login </a> 
			</div>
		</div>
	</div>
	
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		const submitButton = document.getElementById('submit1');
		document.querySelector('form').addEventListener('input', function() {
			// Включение кнопки только если все поля валидны
			submitButton.disabled = !this.checkValidity();
		});

		document.getElementById('submit1').addEventListener('click', function(event) {
			var passwordInput = document.getElementById('password');
			var confirmPasswordInput = document.getElementById('password_confirmation');
			
			// Проверка на совпадение пароля и его подтверждения
			if (passwordInput.value !== confirmPasswordInput.value) {
				alert('Пароль и его подтверждение не совпадают');
				event.preventDefault(); // Предотвращаем отправку формы
			}
		});
	});
	</script>
	
	
</body>
</html>