<? session_start();
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
if ($_POST['out']=='Выход') {$_SESSION['login']=''; $_SESSION['pass1']=''; $_SESSION['status']='1';}
if ($_SESSION['status'] != 1) {
	echo "<script>alert('Вы не администратор');
	location.href='http://filipskyvehiclesite:81/index.php'
	</script>";
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="style.css"> -->
	<title>GOOD</title>
</head>
<body>
	<?php 
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$dbname = 'AlikovG';

		$conn = mysqli_connect($host, $user, $pass, $dbname);
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
	</header>
	<main>
		<div class="main_panel">
			<form action="add.php" method="post">
				<input type="submit" name="add_pol" value="Добавить пользователя">
				<input type="submit" name="add_cat" value="Добавить категорию">
				<input type="submit" name="add_tov" value="Добавить товар">
			</form>
			<table border=1>
				<tr>
					<td>Аватар</td>
					<td>Логин</td>
					<td>Фамилия</td>
					<td>Имя</td>
					<td>Почта</td>
					<td>Статус</td>
					<td></td>
					<td></td>
				</tr>
				<? 
					$query="SELECT * FROM `reg`";
					$result=mysqli_query($conn,$query);

					while($row=mysqli_fetch_array($result))
					{
				?>
				<tr>
					<td><img src="img/<? echo $row[8];?>" width="10%"></td>
					<td><? echo "$row[1]";?></td>
					<td><? echo "$row[2]";?></td>
					<td><? echo "$row[3]";?></td>
					<td><? echo "$row[5]";?></td>
					<td><? echo "$row[7]";?></td>
					<td>
						<form action="add.php" method="post">
							<input type="hidden" name="id" value="<? echo $row[0];?>">
							<input type="submit" name="red_pol" value="Редактировать">
						</form>
					</td>
					<td>
						<form action="add.php" method="post">
							<input type="hidden" name="id" value="<? echo $row[0];?>">
							<input type="submit" name="del_pol" value="Удалить">
						</form>
					</td>
				</tr>
				<? 
					}
				?>
			</table>
			<br>
			<table border=1>
				<tr>
					<td>Наименование</td>
					<td></td>
					<td></td>
				</tr>
				<? 
					$query="SELECT * FROM `category`";
					$result=mysqli_query($conn, $query);

					while ($row=mysqli_fetch_array($result))
					{
				?>
				<tr>
					<td><? echo $row[1];?></td>
					<td>
						<form action="add.php" method="post">
							<input type="hidden" name="id" value="<? echo $row[0];?>">
							<input type="submit" name="red_pol" value="Редактировать">
						</form>
					</td>
					<td>
						<form action="add.php" method="post">
							<input type="hidden" name="id" value="<? echo $row[0];?>">
							<input type="submit" name="del_pol" value="Удалить">
						</form>
					</td>
				</tr>
				<? 
					}
				?>
			</table>
			<br>
			<table>
				<tr>
					<td>Изображение</td>
					<td>Наименование</td>

					<td>Цена</td>
					<td>Категория</td>
					<td colspan=3>Краткие характеристики</td>
					<td>Полная характеристика</td>
					<td></td>
					<td></td>
				</tr>
				<? 
					$query="SELECT * FROM `tovar`";
					$result=mysqli_query($conn, $query);

					while ($row=mysqli_fetch_array($result)) 
					{
				?>
				<tr>
					<td><img src="img/ <? echo $row[2];?>" width="10%"></td>
					<td><? echo $row[1];?></td>
					<td><? echo $row[3];?></td>
					<td><? echo $row[4];?></td>
					<td><? echo $row[5];?></td>
					<td><? echo $row[6];?></td>
					<td><? echo $row[7];?></td>
					<td><? echo $row[8];?></td>
					<td>
						<form action="add.php" method="post">
							<input type="hidden" name="id" value="<? echo $row[0];?>">
							<input type="submit" name="red_pol" value="Редактировать">
						</form>
					</td>
					<td>
						<form action="add.php" method="post">
							<input type="hidden" name="id" value="<? echo $row[0];?>">
							<input type="submit" name="del_pol" value="Удалить">
						</form>
					</td>
				</tr>
				<? 
					}
				?>
			</table>
		</div>
	</main>
</body>
</html>