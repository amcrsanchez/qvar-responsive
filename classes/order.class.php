<?php

  class Order extends LinkMysql
  {

    private $insertId;

    function insert($mainInfoArray, $orderDetailsArray){
      foreach ($mainInfoArray as $key => $value) {
        $$key = $value; //creacion dinamica de variables, tienen el mismo nombre que los que traigan del array
      }
      $sqlMain = "INSERT INTO pedidos VALUES(NULL,'$rif_user',$fecha_hora,'$realizado_por', $subtotal, $iva, $total, $act)";

      $this->insertId = parent::insertReturnsId($sqlMain);

      $sqlDetails = "INSERT INTO detalle_pedido (id_pedido, cod_producto, presentacion, cantidad, precio, subtotal, iva, total, act) VALUES";

      for ($i=0; $i < sizeof($orderDetailsArray) ; $i++) {
        if ($i < (sizeof($orderDetailsArray)-1)) {
          $sqlDetails .= "($this->insertId, '".$orderDetailsArray[$i]['codigo']."', '".$orderDetailsArray[$i]['presentacion']."', '";
          $sqlDetails .= $orderDetailsArray[$i]['cantidad']."',".$orderDetailsArray[$i]['precio'].",".$orderDetailsArray[$i]['subtotal'];
          $sqlDetails .= ",".$orderDetailsArray[$i]['iva'].",".$orderDetailsArray[$i]['total'].",".$orderDetailsArray[$i]['act']."),";
        }else {
          $sqlDetails .= "($this->insertId, '".$orderDetailsArray[$i]['codigo']."', '".$orderDetailsArray[$i]['presentacion']."', '";
          $sqlDetails .= $orderDetailsArray[$i]['cantidad']."',".$orderDetailsArray[$i]['precio'].",".$orderDetailsArray[$i]['subtotal'];
          $sqlDetails .= ",".$orderDetailsArray[$i]['iva'].",".$orderDetailsArray[$i]['total'].",".$orderDetailsArray[$i]['act'].")";
        }
      }

      if ($this->insertId > 0){
        parent::simpleQuery($sqlDetails);
      }

    }

  }


 ?>
