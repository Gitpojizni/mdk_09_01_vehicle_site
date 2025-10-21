<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>index</title>
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
		<div class="left_panel">
			<form method="post" action="index.php">
				<input type="text" name="search_text">
				<input type="submit" name="search" value="Поиск">
			</form>
				<? 
				$query = "SELECT * FROM `category`";
				$result = mysqli_query($conn, $query);
	
				while($row=mysqli_fetch_array($result))
				{
				?>
					<div>
						<form action="index.php" method="post">
							<input type='submit' name='category' value='<? echo $row[1]; ?>'>
						</form>
					</div>
				<? 
				}
				?>
		</div>
		<div class="main_panel">
			<? 
			ini_set('display_errors', 0);
			error_reporting(E_ALL ^ E_NOTICE);
			$category=$_POST['category'];

			if ($category == 'Все товары') {
				$query="SELECT * FROM tovar";
			} else {
				$query="SELECT * FROM tovar WHERE category='$category'";
			}
			$search_text=$_POST['search_text'];

			if ($_POST['search'] == 'Поиск') {
				$query="SELECT * FROM tovar WHERE name LIKE '%$search_text%' OR category LIKE '%$search_text%' OR description_less LIKE '%$search_text%' OR description_full LIKE '%$search_text%'";
			}
			$result=mysqli_query($conn,$query);

			while($row=mysqli_fetch_array($result))
			{
			?>
			<div class="product_block">
				<center class="bba">
					<img src="img/<?echo $row[6]; ?>" alt="tovar" width=80% height=60%>
					<p> <? echo $row[1]; ?></p>
					<p>Характеристики:</p>
					<p><? echo $row[2]; ?></p>
					<p><? echo $row[3]; ?></p>
					<p>$<? echo $row[5]; ?></p>
					<div>
						<form action="tovar.php" method="post">
							<input type="hidden" name="id" value="<? echo $row[0]; ?>">
							<input type="submit" name="tovar" value="Подробнее">
						</form>
					</div>
				</center>
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