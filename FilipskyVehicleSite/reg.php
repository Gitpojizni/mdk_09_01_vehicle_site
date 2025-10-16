<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>reg</title>
</head>
<body>
	<header>
		<div class="header_button_container">
			<a href='index.php'>
				<button class="header_button">
					Главная
				</button>
			</a>
			<a href='reg.php'>
				<button class="header_button">
					Регистрация
				</button>
			</a>
			<a href='auto.php'>
				<button class="header_button">
					Авторизация
				</button>
			</a>
			<a href='profile.php'>
				<button class="header_button">
					Профиль
				</button>
			</a>
		</div>
	</header>
	<main>
		<?php 
		if ($_POST['reg'] == 'Зарегистрироваться') {
			$login = $_POST['login'];
			$mail = $_POST['mail'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$last_name = $_POST['last_name'];
			$name = $_POST['name'];
			$father_name = $_POST['father_name'];

			if (!empty($login) && !empty($mail) && !empty($pass1) && !empty($pass2) && !empty($last_name) && !empty($name) && !empty($father_name)) {
				if ($pass1 == $pass2) {
					$host = 'localhost';
					$user='root';
					$pass='';
					$dbname='AlikovG';

					$conn = mysqli_connect($host,$user,$pass,$dbname);

					if (!$conn) {
						die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
					}

					$query = "INSERT INTO `reg` (`login`, `mail`, `password`, `status`, `last_name`, `name`, `father_name`)
								VALUES ('$login', '$mail', '$pass1', '0', '$last_name', '$name', '$father_name')";
					$result = mysqli_query($conn, $query);
					echo "<br><br>Регистрация прошла успешно <a href='auto.php'>Войдите</a><br><br>";
				} else {
					echo "<br><br>Пароли не совпадают, попробуйте ещё раз <a href='reg.php'>Зарегистрироваться</a><br><br>";
				}
			} else {
				echo "<br><br>Заполните все поля формы <a href='reg.php'>Зарегистрироваться</a><br><br>";
			}
		}
		?>

		<table align="center">
			<form action="reg.php" method="post">
				<tr>
					<td>Введите логин</td>
					<td><input type='text' name='login' placeholder="" required></td>
				</tr>
				<tr>
					<td>Введите почту</td>
					<td><input type='email' name='mail' placeholder="" required></td>
				</tr>
				<tr>
					<td>Введите фамилию</td>
					<td><input type='text' name='last_name' placeholder="" required></td>
				</tr>
				<tr>
					<td>Введите имя</td>
					<td><input type='text' name='name' placeholder="" required></td>
				</tr>
				<tr>
					<td>Введите отчество</td>
					<td><input type='text' name='father_name' placeholder="" required></td>
				</tr>
				<tr>
					<td>Введите пароль</td>
					<td><input type='password' name='pass1' placeholder="" required></td>
				</tr>
				<tr>
					<td>Повторите пароль</td>
					<td><input type='password' name='pass2' placeholder="" required></td>
				</tr>
				<tr>
					<td><input type='submit' name='reg' value="Зарегистрироваться"></td>
				</tr>
			</form>
		</table>
	</main>
	<footer>
		
	</footer>
</body>
</html>