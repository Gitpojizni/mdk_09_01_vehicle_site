<? session_start();
// ini_set('display_errors', 0);
// error_reporting(E_ALL ^ E_NOTICE);
if ($_POST['out']=='Выход') {$_SESSION['login']=''; $_SESSION['pass1']=''; $_SESSION['status']='';}
if ($_SESSION['status'] == '') {
	echo "<script>alert('Вы не вошли в аккаунт');
	location.href='http://filipskyvehiclesite:81/index.php';
	</script>";
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name='viewport' content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<? 
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
	</header>
	<main>
		<div class="main_panel">
			<? 
				if ($_SESSION['login']!='') {
					$login=$_SESSION['login'];
					$pass1=$_SESSION['pass1'];
					if ($_POST['img_user']=='Изменить данные') {
						$id=$_POST['id'];
						$img=$_POST['img'];

						$query="UPDATE `reg` SET `img`='$img' WHERE `id`='$id'";
						$result=mysqli_query($conn, $query);
					}
					
					if ($_POST['update_user']=='Изменить контакты') {
						$id=$_POST['id'];
						$login2=$_POST['login2'];
						$mail=$_POST['mail'];
						$name=$_POST['name'];
						$pass2=$_POST['pass2'];
						$last_name=$_POST['last_name'];
						$father_name=$_POST['father_name'];

						$query="UPDATE `reg` SET `login`='$login2', `mail`='$mail', `name`='$name', `password`='$pass2', `last_name`='$last_name', `father_name`='$father_name' WHERE `id`='$id'";
						$result=mysqli_query($conn, $query);
					}
					
					$query="SELECT * FROM `reg` WHERE `login`='$login' AND `password`='$pass1'";
					$result=mysqli_query($conn, $query);
					$row=mysqli_fetch_array($result);


			?>
			<div class="img_tovar">
				<form action="profile.php" method="POST">
					<img src="img/<? echo $row[8]; ?>" width='20%'>
					<span>Аватар</span>
					<input type="file" name="img">
					<div class="button">
						<input type="hidden" name="id" value="<? echo $row[0]; ?>">
						<input type="submit" name="img_user" value="Изменить данные">
					</div>
				</form>
			</div>
			<div class="information">
				<form action="profile.php" method="POST">
					<div class="text_size_3">
						Информация о пользователе
					</div>
					<br>
					<div class="info_to_vrf">
						<span>
							Логин:
						</span>
						<input type="text" name="login2" value="<? echo $row[1]; ?>">
					</div>
					<br>
					<div class="info_to_vrf">
						<span>
							Почта:
						</span>
						<input type="text" name="mail" value="<? echo $row[6]; ?>">
					</div>
					<br>
					<div class="info_to_vrf">
						<span>
							Пароль:
						</span>
						<input type="text" name="pass2" value="<? echo $row[5]; ?>">
					</div>
					<br>
					<div class="info_to_vrf">
						<span>
							Имя:
						</span>
						<input type="text" name="name" value="<? echo $row[2]; ?>">
					</div>
					<br>
					<div class="info_to_vrf">
						<span>
							Фамилия:
						</span>
						<input type="text" name="last_name" value="<? echo $row[3]; ?>">
					</div>
					<br>
					<div class="info_to_vrf">
						<span>
							Отчество:
						</span>
						<input type="text" name="father_name" value="<? echo $row[4]; ?>">
					</div>
					<br>
					<div>
						<input type="hidden" name="id" value="<? echo $row[0]; ?>">
						<input type="submit" name="update_user" value="Изменить контакты">
					</div>
				</form>
			</div>
			<? 
						}
			?>
		</div>
	</main>
	<footer>
		
	</footer>
</body>
</html>