<?php 
	if (isset($_POST['seller'])) {
		session_start();
		$_SESSION['seller'] = $_POST['seller'];
	}
	if (isset($_POST['client'])) {
		session_start();
		$_SESSION['client'] = $_POST['client'];
	}
	if (isset($_POST['orderDetails'])) {
		session_start();
		$_SESSION['orderDetails'] = $_POST['orderDetails'];
	}
	if (isset($_POST['aditionalInfo'])) {
		session_start();
		$_SESSION['aditionalInfo'] = $_POST['aditionalInfo'];
	}
 ?>