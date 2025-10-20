<? session_start(); 
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
if ($_POST['out']=='Выход') {$_SESSION['login']=''; $_SESSION['pass1']='';$_SESSION['status']='1';}
if ($_SESSION['status'] != 1) {
    echo "<script>alert('Вы не администратор');
    location.href='http://project/index.php';
    </script>";

}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Good</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
        $host='localhost';
        $user='root';
        $password='';
        $dbname = 'AlikovG';

        $conn=mysqli_connect($host,$user,$password,$dbname);
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
		<div class="block_right">
			<div class="block_right">
			<?
              if ($_SESSION['login'] != '')
              	{
            ?>    
                <form action="index.php" method="post">
                    <h3><input class="fix_nav" type="submit" name="out" value="Выход"></h3>
                </form>
            <?
                }
            ?>
        </div>
		</div>
	</header>
	<main>
		<div class="main_panel">
			<section class="sectionAdd">
				 
				 <form action='add.php' method='post'>
					
				 </form>
				
				<?
					if ($_SESSION['status'] =='1') 
					{
					
					if ($_POST['add_pol2']=='Добавить пользователя')
					{
						$login=$_POST['login'];
						$mail=$_POST['mail'];
						$pass1=$_POST['pass1'];
						$pass2=$_POST['pass2'];
						$img=$_POST['img'];
						$last_name=$_POST['last_name'];
						$name=$_POST['name'];
						$father_name=$_POST['father_name'];
						$status=$_POST['status'];
						
						if ($pass1 == $pass2)
						{
							$query="INSERT INTO `reg` (`login`, `mail`, `password`, `img`, `last_name`, `name`, `father_name`, `status`)
										        VALUES ('$login','$mail','$pass1','$img','$last_name','$name','$father_name','$status')";
												
							$result=mysqli_query($conn,$query);
							echo "<br><br>Пользователь добавлен, <a href='admin.php'>Вернуться назад</a><br><br>";
						}
						else
						{
							echo "<br><br>Пароли не совпадают, попробуйте еще раз <a href='admin.php'>Вернуться назад</a><br><br>";
						}
					}
					else
					{
						if ($_POST['add_pol']=='Добавить пользователя')
						{
				?>
				<table>
					<h2>Добавить пользователя</h2>
					<form action='add.php' method='post'>
						<tr>
							<td>Введите логин</td>
							<td><input type='text' name='login'></td>
						</tr>
						<tr>
							<td>Введите почту</td>
							<td><input type='text' name='mail'></td>
						</tr>
						<tr>
							<td>Введите пароль</td>
							<td><input type='password' name='pass1'></td>
						</tr>
						<tr>
							<td>Повторите пароль</td>
							<td><input type='password' name='pass2'></td>
						</tr>
						<tr>
							<td>Выбрать аватар</td>
							<td><input type='file' name='img'></td>
						</tr>
						<tr>
							<td>Введите фамилию</td>
							<td><input type='text' name='last_name'></td>
						</tr>
						<tr>
							<td>Введите имя</td>
							<td><input type='text' name='name'></td>
						</tr>
						<tr>
							<td>Введите отчество</td>
							<td><input type='text' name='father_name'></td>
						</tr>
						<tr>
							 <td>Статус пользователя</td>
                                <td>
                                <select name="status">
                                  <option value="0">Пользователь</option>
                                  <option value="1">Администратор</option>
                                </select>
                                </td>
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' name='add_pol2' value='Добавить пользователя'></td>
						</tr>
					</form>
				</table>
				<?
						}
					}
	
					//add_category
	
					if ($_POST['add_cat2']=='Добавить категорию')
					{
						$name=$_POST['name'];
						
						$query="INSERT INTO `category`(`name`) VALUES ('$name')";
						$result=mysqli_query($conn,$query);
						echo "<br><br>Категория добавлена, <a href='admin.php'>Вернуться назад</a><br><br>";
					}
					else
					{
						if ($_POST['add_cat']=='Добавить категорию')
						{
				?>
				<table>
					<h2>Добавить категорию</h2>
					<form action='add.php' method='post'>
						<tr>
							<td>Наименование категории</td>
							<td><input type='text' name='name'></td>
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' name='add_cat2' value='Добавить категорию'></td>
						</tr>
					</form>
				</table>
				<?
						}
					}
					
					//add_tov
					
					if ($_POST['add_tov2']=='Добавить товар')
					{

						$id=$_POST['id'];
						$name=$_POST['name'];
						$img=$_POST['img'];
						$price=$_POST['price'];
						$category=$_POST['category'];
						$description_less=$_POST['description_less'];
						$description_full=$_POST['description_full'];
		
						$query="INSERT INTO `tovar` (`id`, `name`, `img`, `price`, `category`, `description_less`, `description_full`)
										        VALUES ('$id', '$name', '$img', '$price', '$category', '$description_less', '$description_full')";
							$result=mysqli_query($conn,$query);
						echo "<br><br>Товар добавлен, <a href='admin.php'>Вернуться назад</a><br><br>";
					}
					else
					{
						if ($_POST['add_tov']=='Добавить товар')
						{
				?>
				<table>
				&emsp;<h2>Добавить товар</h2>
					<form action='add.php' method='post'>
						<tr>
							<td>Номер товара</td>
							<td><input type='text' name='id'></td>
						</tr>
						<tr>
							<td>Название товара</td>
							<td><input type='text' name='name'></td>
						</tr>
						<tr>
							<td>Фото товара</td>
							<td><input type='file' name='img'></td>
						</tr>
						<tr>
							<td>Цена товара</td>
							<td><input type='text' name='price'></td>
						</tr>
						<tr>
							<td>Категория товара</td>
							<td>
							    <select name='category'>
								     <?
									 $query1="SELECT * FROM `category` WHERE `id`<>0";
									 $result1=mysqli_query($conn,$query1);
									 while ($row2=mysqli_fetch_array($result1))
									 {
									 ?>
									 <option value='<? echo $row2[1]; ?>'><? echo $row2[1]; ?></option>
									 <?
									 }
									 ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Описание товара 1</td>
							<td><input type='text' name='description_less'></td>
						</tr>
						<tr>
							<td>Описание товара 2</td>
							<td><input type='text' name='description_full'></td>
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' name='add_tov2' value='Добавить товар'></td>
						</tr>
					</form>
				</table>
				<?
						}
					}
					
					//red_user
					
						if ($_POST['red_pol2']=='Сохранить изменения')
						{
							$id=$_POST['id'];
							$login=$_POST['login'];
							$mail=$_POST['mail'];
							$pass1=$_POST['pass1'];
							$img=$_POST['img'];
							$last_name=$_POST['last_name'];
							$name=$_POST['name'];
							$name=$_POST['father_name'];
							$status=$_POST['status'];
						
								$query="UPDATE `reg` SET `login`='$login',`mail`='$mail',`password`='$pass1',
															`last_name`='$last_name',`name`='$name',`father_name`='$father_name',`status`='$status' WHERE `id`='$id' ";
								$result=mysqli_query($conn,$query);
								echo "<br><br>Изменения сохранены, <a href='admin.php'>Вернуться назад</a><br><br>";
						}
						else
						{
							if ($_POST['red_pol']=='Редактировать') 
							{
								$id=$_POST['id'];
								$query="SELECT * FROM `reg` WHERE `id`='$id'";
								$result=mysqli_query($conn,$query);

								while($row=mysqli_fetch_array($result))
								{		
				?>
				<table>
					<h2>Редактировать пользователя</h2>
					<form action='add.php' method='post'>
						<tr>
							<td>Введите логин</td>
							<td><input type='text' name='login' value='<? echo $row[1]; ?>'></td>
						</tr>
						<tr>
							<td>Введите почту</td>
							<td><input type='text' name='mail' value='<? echo $row[6]; ?>'></td>
						</tr>
						<tr>
							<td>Введите пароль</td>
							<td><input type='password' name='pass1' value='<? echo $row[5]; ?>'></td>
						</tr>
						<tr>
							<td>Выбрать аватар</td>
							<td><input type='file' name='img'></td>
						</tr>
						<tr>
							<td>Введите фамилию</td>
							<td><input type='text' name='last_name' value='<? echo $row[3]; ?>'></td>
						</tr>
						<tr>
							<td>Введите имя</td>
							<td><input type='text' name='name' value='<? echo $row[2]; ?>'></td>
						</tr>
						<tr>
							<td>Введите отчество</td>
							<td><input type='text' name='name' value='<? echo $row[4]; ?>'></td>
						</tr>
						<tr>
							 <td>Статус пользователя</td>
                                <td>
                                <select name="status">
                                  <option value="0">Пользователь</option>
                                  <option value="1">Администратор</option>
                                </select>
                                </td>
						</tr>
						<tr>
							<td><input type='hidden' name='id' value='<? echo $row[0];?>'></td>
							<td><input type='submit' name='red_pol2' value='Сохранить изменения'></td>
						</tr>
					</form>
				</table>
				<?
								}
							}
						}
						
						//red_cat
					
						if ($_POST['red_cat2']=='Сохранить изменения')
						{
							$id=$_POST['id'];
							$name=$_POST['name'];
							
						
								$query="UPDATE `category` SET `name`='$name' WHERE `id`='$id' ";
								$result=mysqli_query($conn,$query);
								echo "<br><br>Изменения сохранены, <a href='admin.php'>Вернуться назад</a><br><br>";
							
						}
						else
						{
							if ($_POST['red_cat']=='Редактировать') 
							{
								$id=$_POST['id'];
								$query="SELECT * FROM `category` WHERE `id`='$id' ";
								$result=mysqli_query($conn,$query);

								while($row=mysqli_fetch_array($result))
								{		
				?>
				<table>
					<h2>Редактировать категории</h2>
					<form action='add.php' method='post'>
						<tr>
							<td>Введите наименование</td>
							<td><input type='text' name='name' value='<? echo $row[1]; ?>'></td>
						</tr>
						<tr>
							<td><input type='hidden' name='id' value='<? echo $row[0];?>'></td>
							<td><input type='submit' name='red_cat2' value='Сохранить изменения'></td>
						</tr>
					</form>
				</table>
				<?
								}
							}
						}
					//red_tov
						
					if ($_POST['red_tov2']=='Сохранить изменения')
					{
						$id=$_POST['id'];
						$name=$_POST['name'];
						$img=$_POST['img'];
						$price=$_POST['price'];
						$category=$_POST['category'];
						$description_less=$_POST['description_less'];
						$description_full=$_POST['description_full'];
		
						$query="UPDATE `tovar` SET `name`='$name', `img`='$img', `price`='$price', `category`='$category',
												`description_less`='$description_less', `description_full`='$description_full' WHERE `id`='$id' ";
							$result=mysqli_query($conn,$query);
						echo "<br><br>Изменения сохранены, <a href='admin.php'>Вернуться назад</a><br><br>";
					}
					else
					{
						if ($_POST['red_tov']=='Редактировать') 
							{
								$id=$_POST['id'];
								$query="SELECT * FROM `tovar` WHERE `id`='$id'";
								$result=mysqli_query($conn,$query);

								while($row=mysqli_fetch_array($result))
								{		
				?>
				<table>
					<h2>Редактировать товар</h2>
					<form action='add.php' method='post'>
						<tr>
							<td>Номер товара</td>
							<td><input type='text' name='id' value='<? echo $row[0]; ?>'></td>
						</tr>
						<tr>
							<td>Название товара</td>
							<td><input type='text' name='name' value='<? echo $row[1]; ?>'></td>
						</tr>
						<tr>
							<td>Фото товара</td>
							<td><input type='file' name='img'></td>
						</tr>
						<tr>
							<td>Цена товара</td>
							<td><input type='text' name='price' value='<? echo $row[3]; ?>'></td>
						</tr>
						<tr>
							<td>Категория товара</td>
							<td>
							    <select name='category'>
								     <?
									 $query1="SELECT * FROM `category` WHERE `id`<>1";
									 $result1=mysqli_query($conn,$query1);
									 while ($row2=mysqli_fetch_array($result1))
									 {
									 ?>
									 <option value='<? echo $row2[1]; ?>'><? echo $row2[1]; ?></option>
									 <?
									 }
									 ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Описание товара</td>
							<td><input type='text' name='description_less' value='<? echo $row[5]; ?>'></td>
						</tr>
						<tr>
							<td>Описание товара</td>
							<td><input type='text' name='description_full' value='<? echo $row[6]; ?>'></td>
						</tr>
						<tr>
							<td><input type='hidden' name='id' value='<? echo $row[0];?>'></td>
							<td><input type='submit' name='red_tov2' value='Сохранить изменения'></td>
						</tr>
					</form>
				</table>		
				<?
							}
						}
					}
						
						if ($_POST['del_pol']=='Удалить')
							{
								$id=$_POST['id'];
								$query="DELETE FROM `reg` WHERE `id`='$id'";
								$result=mysqli_query($conn, $query);
								echo "<br><br>Пользователь удален, <a href='admin.php'>Вернуться назад</a><br><br>";
							}
							
						
						if ($_POST['del_cat']=='Удалить')
							{
								$id=$_POST['id'];
								$query="DELETE FROM `category` WHERE `id`='$id'";
								$result=mysqli_query($conn, $query);
								echo "<br><br>Категория удалена, <a href='admin.php'>Вернуться назад</a><br><br>";
							}
							
						
						if ($_POST['del_tov']=='Удалить')
							{
								$id=$_POST['id'];
								$query="DELETE FROM `tovar` WHERE `id`='$id'";
								$result=mysqli_query($conn, $query);
								echo "<br><br>Товар удален, <a href='admin.php'>Вернуться назад</a><br><br>";
							}
				?>
				   <?
					}
					else
						{
							echo "<br><br>У вас нет доступа.<br><br>";
						}
					?>
						
		         </section>
		</div>
	</main>
	<footer></footer>
</body>
</html>