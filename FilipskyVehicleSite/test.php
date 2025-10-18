<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>reg</title>
</head>
<body>
	<main>
		<?php 
			$host='localhost';
			$user='root';
			$pass='';
			$dbname='AlikovG';

			$conn = mysqli_connect($host,$user,$pass,$dbname);
		?>
		
		<?
			$query="SELECT * FROM `comment`";
			$result=mysqli_query($conn, $query);
			
			// $row=mysqli_fetch_array($result);
			
			while($row=mysqli_fetch_array($result)) {
				echo $row[4];
			}
			
			// print_r($result);
			// $res = $row[0]
			// print_r()
		?>
	</main>
</body>
</html>