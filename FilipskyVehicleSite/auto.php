<? session_start();
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
if ($_POST['out']=='Выход') {$_SESSION['login']=''; $_SESSION['pass1']=''; $_SESSION['status']='';}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name='viewport' content="width=device-width, initial-scale=1">
	<title>auto</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
		$host='localhost';
		$user='root';
		$pass='';
		$dbname='AlikovG';

		$conn=mysqli_connect($host,$user,$pass,$dbname);
	?>
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
		<? 
			if ($_SESSION['login'] != '') 
			{
		?>
			<form>
				<h3><input class="fix_nav" type="submit" name="out" value="Выход"></h3>
			</form>
		<? 
			}
		?>
	</header>
	<main>
		<div class="main_panel">
			<? 
				
				if ($_POST['auto']=='Войти') {
					$login=$_POST['login'];
					$pass1=$_POST['pass1'];

					$query="SELECT * FROM `reg` WHERE `login`='$login' AND `password`='$pass1'";
					$result=mysqli_query($conn, $query);
					$num=mysqli_num_rows($result);
					echo $num;
					// echo "hhhh";
					$row=mysqli_fetch_array($result);

					$_SESSION['login']=$login;
					$_SESSION['pass1']=$pass1;
					$_SESSION['status']=$row[7];

					if ($num == 1) {
						echo "<br><br>вы вошли, пройдите в <a href='profile.php'>Личный кабинет</a><br><br>";
						$_SESSION['login']=$login;
						$_SESSION['pass1']=$pass1;
						$_SESSION['status']=$row[7];
						if ($row[7] == 1) echo "<br><br>Добро пожаловать в <a href='admin.php'>Панель администратора<><br><br>";
					} else {
						echo "<br><br>Данные не верны, попробуйте ещё раз <a href='auto.php'>Войти</a><br><br>";
					}
				} else 
				{
			?>
			<table>
				<form action="auto.php" method="post">
					<tr>
						<td>Введите логин</td>
						<td><input type="text" name="login"></td>
					</tr>
					<tr>
						<td>Введите пароль</td>
						<td><input type="password" name="pass1"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="auto" value="Войти"></td>
					</tr>
				</form>
			</table>
			 <? 
		 		}
			 ?>
		</div>
	</main>
	<footer>
		
	</footer>
</body>
</html>