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
	
</head>
<body>	

	<div class="container">
	<!-- cek apakah sudah login -->
	<?php require_once('viewData.php');?>
	</div>
	<br/>
	<br/>


</body>
</html>