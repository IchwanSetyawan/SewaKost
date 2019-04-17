<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>halaman utama</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>	

	<div class="container">
		<div class="row">
			<div class="header">
				<h1>Welcome admin 96B </h1>				
			</div>

			<div class="body">
				<div class="menu">
					<ul>
						<li><a href="viewData.php">View</a></li>
						<li><a href="insert.php">Add</a></li>
						<li><a href="update.php">Update</a></li>
						<li><a href="delete.php">Delete</a></li>
						<li style="float:right"><a class="active" href="#about">Log out</a></li>
					</ul>
				</div>
				<div class="image">
					<img src="../image/carl.jpg" alt="motel">
				</div>

				

				
			</div>
		</div>	
	
	
	</div>
	


</body>
</html>