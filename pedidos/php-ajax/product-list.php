<?php 
	include '../classes/product.class.php';
	$product = new Product;
	echo json_encode($product->ProductList);
?>