<?php 
include '../classes/seller.class.php';
$seller = new Seller;

if ($seller->login($_POST['sellerName'], $_POST['pass'])) {
	$sellerData  = array('ID'=>$seller->id, 'Name' => $seller->name, 'Email'=>$seller->email);
	session_start();
	$_SESSION['seller'] = $sellerData;
	echo 1;
}else{
	echo 0;
}
?>