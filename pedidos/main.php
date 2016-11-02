<?php 	session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QVAR CA | PEDIDOS ONLINE</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/my.css">
	<script src="../js/jquery-2.2.1.min.js"></script>
 	<script src="../js/bootstrap.js"></script>
 	<script src="js/my.js"></script>

</head>
<body>
<?php 
	
	if (isset($_GET['tab']) && file_exists("routing/".$_GET['tab'].".php") && isset($_SESSION['seller'])) {
		include "include/progress.php";
		include "routing/".$_GET['tab'].".php";
	}else{
		$error = "La pagina no Existe";
		include "routing/error.php";
	}

 ?>
 
 </body>
 </html>