<?php
if (!isset($_POST)) {
  return false;
}
$class = ($_POST['classVal']=='null') ? null:$_POST['classVal'];
$autoClass = ($_POST['classAutoVal']=='null') ? null:$_POST['classAutoVal'];


include '../classes/producto.class.php';
$product = new Product;

if (is_null($class) && is_null($autoClass)) {
  $product->autoClasses();
  $autoClasses = array();
  $product->autoClasses();
  while ($row = $product->autoClasses->fetch_assoc()) {
    $autoClasses[] = array('id' => $row['id'], 'clasificacion_automotriz' => $row['clasificacion_automotriz'] );
  }

  echo json_encode($autoClasses);
}else{
  $productList = array();
  $product->productList($class, $autoClass);
  while ($row = $product->productList->fetch_assoc()) {
    $productList[] = array('codigo' => $row['codigo'], 'nombre' => $row['nombre'] );
  }

  echo json_encode($productList);

}


 ?>
