<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<div class="block_right">
				<h3><a href='index.php'>Главная</a></h3>
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
						<? echo $row[0]; ?>
					</div>
				</center>
			</div>
		</main>
		<footer>
			
		</footer>
	</body>
</html>