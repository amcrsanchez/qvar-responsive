<?php
include 'db.class.php';

/**
 * clase para el producto
 */
class Product extends LinkMysql
{
  public $autoClasses;
  public $productList;
  public $product;
  public $productDownloads;



  public function autoClasses(){
    $sql = "SELECT * FROM clasificacion_automotriz ORDER BY clasificacion_automotriz DESC";
    $this->autoClasses = self::returnQuery($sql);

  }


  public function productList($class, $autoClass){
    if($class !== null && $autoClass === null){
      $sql = "SELECT * FROM productos WHERE clasificacion = $class";
    }else if($class !== null && $autoClass !== null){
      $sql = "SELECT * FROM productos WHERE clasificacion = $class AND clasificacion_automotriz = $autoClass";
    }else if($class === null && $autoClass === null){
      $sql = "SELECT * FROM productos";
    }
    //echo $sql;
    if ($res = self::returnQuery($sql)) {
      self::set('productList',$res);

    }else{
      return false;
    }
  }

  public function productDetails($prodCode){
    $sql = "SELECT * FROM productos WHERE codigo = '$prodCode'";
    //echo $sql;
    if ($res = self::returnQuery($sql)) {
      self::set('product',$res);

    }else{
      return false;
    }
  }

  public function productDescription($prodCode){
    $sql = "SELECT * FROM productos WHERE codigo='$prodCode'";
    $description = array();
    $res = self::returnQuery($sql);
    $row = $res->fetch_assoc();
      foreach ($row as $key => $value) {
        if($value != null){
          //$key = str_replace("_"," ",$key);
          $description[$key] = utf8_encode($value);

        }
      }
      return $description;
  }

  public function productProperties($prodCode){
    $sql = "SELECT * FROM propiedades WHERE codigo='$prodCode'";
    $properties = array();
    $res = self::returnQuery($sql);
    $row = $res->fetch_assoc();
      foreach ($row as $key => $value) {
        if($value != null){
          $key = str_replace("_"," ",$key);
          if($key != "codigo")
            $properties[strtoupper($key)] = utf8_encode($value);

        }
      }
      return $properties;
  }

  public function productDownloads($prodCode){
    $sql = "SELECT * FROM descargas WHERE cod_producto = '$prodCode'";
    $downloadList = array();
    if ($res = parent::returnQuery($sql)) {

      if (parent::numRows($sql) > 0) {
        while ($row = $res->fetch_assoc()) {
          $downloadList[] = array('codigo' =>  utf8_encode($row['cod_producto']), 'descripcion' => utf8_encode($row['descripcion']), 'url' => utf8_encode($row['url']) );
        }
        self::set('productDownloads',$downloadList);
        //echo json_encode($this->productDownloads);
      }else{
        self::set('productDownloads',false);
      }

    }else{

      self::set('productDownloads',false);
    }
  }

  public function productClass(){
    $sql = "SELECT * FROM clasificacion_productos";
    return parent::returnQuery($sql);
  }

  public function productFilling($prodCode){
    $sql = "SELECT presentacion FROM presentaciones
    INNER JOIN producto_presentacion
    ON presentaciones.id = producto_presentacion.id_presentacion
    WHERE codigo_producto = '$prodCode'";

    $fillings = array();
    $res = self::returnQuery($sql);
    $i = 0;
    while($row = $res->fetch_assoc()){
       $fillings[] = $row['presentacion'];
     }

     return $fillings;
  }

  public function productJson($prodCode){
    $productJson = self::productDescription($prodCode);
    $productJson['Propiedades'] = self::productProperties($prodCode);
    $productJson['Presentaciones'] = self::productFilling($prodCode);

    return json_encode($productJson);
  }

  public function set($var, $value){
    $this->$var = $value;
  }

}






?>
