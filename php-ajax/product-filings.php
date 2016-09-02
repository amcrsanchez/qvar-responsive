<?php
  if (!isset($_POST['prodCode']))
    return false;

  include '../classes/producto.class.php';
  $product = new Product;
  $filings = $product->productFilling($_POST['prodCode']);
  echo json_encode($filings);


 ?>
