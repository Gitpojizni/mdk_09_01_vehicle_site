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
			<div class="main_panel_tovar">
				<? 
				$id=$_POST['id'];
				$query="SELECT * FROM `tovar` WHERE `id` = $id ";
				$result=mysqli_query($conn, $query);

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
				<div class="comment_section">
					<div class="comment_view_scrollbar">
						<?
						$comment=$_POST['comment'];
						$comment_text = $_POST['comment_text'];
						if ($_POST['send'] == 'Отправить') {
							$query="INSERT INTO comment (`user_id`, `login`, `status`, `comment`)
									VALUES ('228', 'logos', '227', '$comment_text')";
						}
						$query="SELECT * FROM comment";
						$result=mysqli_query($conn, $query);
						$row=mysqli_fetch_array($result);
						
						?>
						
						<? echo count($row); ?>
						<? echo count($row[3]); 
												print_r($row)

						?>
						
						<?
						for ($i = 1; $i <= count($row); $i++)
						{
						?>
						<div class="comment_block">
							<p> <? echo $row[1]; ?></p>
							<p><? echo $row[2]; ?></p>
							<p><? echo $row[3]; ?></p>
							<p><? echo $row[4]; ?></p>
							
						</div>
						<? 
						}
						?>	
					</div>
					<div class="comment_redaction_section">
						<form id="comment_redact_and_send" method="post" action="tovar.php">
							<input id="comment_redact" type="text" name="comment_text">
							<input id="comment_send" type="submit" name="send" value="Отправить">
						</form>
					</div>
				</div>
			</div>
		</main>
		<footer>
			
		</footer>
	</body>
</html>