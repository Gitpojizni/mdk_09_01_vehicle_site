<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<title>tovarish</title>
	</head>
	<body>
		<?php 
			$host='localhost';
			$user='root';
			$pass='';
			$dbname='AlikovG';

			$conn = mysqli_connect($host,$user,$pass,$dbname);
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
				$id=$_POST['id'];
				$query="SELECT * FROM `tovar` WHERE `id` = $id ";
				$result=mysqli_query($conn, $query);
				$row=mysqli_fetch_array($result);

				?>
				<center>
					<div class="main_product">
						<img src="img/<?echo $row[6]; ?>" alt="tovar" width=50% height=50%>
						<p class='fix_dla_p'> <? echo $row[1]; ?></p>
						<p class='fix_dla_p'><? echo $row[2]; ?></p>
						<p class='fix_dla_p'><? echo $row[3]; ?></p>
						<p class='fix_dla_p'>$<? echo $row[5]; ?></p>
						<p class='fix_dla_p'><? echo $row[0]; ?></p>
					</div>
				</center>
			</div>
		</main>
		<footer>
			
		</footer>
	</body>
</html>