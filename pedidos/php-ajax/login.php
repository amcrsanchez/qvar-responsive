<?php 
include '../classes/seller.class.php';
$seller = new Seller;

if ($seller->login($_POST['sellerName'], $_POST['pass'])) {
	session_start();
	$_SESSION['seller'] = $seller;
	echo 1;
}else{
	echo 0;
}
?>