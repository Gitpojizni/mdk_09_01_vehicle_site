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
				$query1="SELECT * FROM `tovar` WHERE `id` = $id ";
				$result1=mysqli_query($conn, $query1);
				print_r($result1);
				$row1=mysqli_fetch_array($result1);

				?>
				<center>
					<div class="main_product">
						<img src="img/<?echo $row1[6]; ?>" alt="tovar" width=50% height=50%>
						<p class='fix_dla_p'><? echo $row1[1]; ?></p>
						<p class='fix_dla_p'><? echo $row1[2]; ?></p>
						<p class='fix_dla_p'><? echo $row1[3]; ?></p>
						<p class='fix_dla_p'>$<? echo $row1[5]; ?></p>
						<p class='fix_dla_p'><? echo $row1[0]; ?></p>
					</div>
				</center>
				<div class="comment_section">
					<div class="comment_view_scrollbar">
						<?

						function filter($m){ 
							if(str_contains($m, ">", "<"){
								$m = str_replace("<", ">", $m)
							} else {
								echo "dddd"
							}
							return $m;
						}

						$comment=$_POST['comment'];
						$comment_text = $_POST['comment_text'];
						
						if ($_POST['send'] == 'Отправить') {
							filter($comment_text);
							$query="INSERT INTO comment (`user_id`, `login`, `status`, `comment`)
									VALUES ('228', 'logos', '227', '$m')";
							$result=mysqli_query($conn, $query);
						}
						
						$query="SELECT * FROM `comment`";
						$result=mysqli_query($conn, $query);
						
						// $row=mysqli_fetch_array($result);
						
						$pass = '111';
						
						if ($pass == '404') {
							print("admin root bla bla bla");
						} else {
							print("defolt");
						}
						
						while($row=mysqli_fetch_array($result))	
						{
						?>
						<div class="comment_block">
							<p><hr class="vertical_line"><h3><?echo $row[2]; ?></h3><h4 id="admin_identificator"><? if ($row[3] == 1) {echo 'Администратор'; }?></h4></p>
							
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
						<?

						?>
					</div>
				</div>
			</div>
		</main>
		<footer>
			
		</footer>
	</body>
</html>