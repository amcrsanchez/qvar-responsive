<?php
require '../classes/producto.class.php';
$producto = new Product;
echo $producto->productJson($_GET['prodCode']);

?>
