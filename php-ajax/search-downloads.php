<?php
if (!isset($_POST['productCode'])) {
  return false;
}
include '../classes/producto.class.php';
$productCode = $_POST['productCode'];
$product = new Product;
$product->productDownloads($productCode);

if ($product->productDownloads == false) {
  echo 0;
}else{
  echo json_encode($product->productDownloads);
}







?>
