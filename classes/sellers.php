<?php
  include 'db.class.php';
  /**
   * HANDLE SELLERS
   */
  class Seller extends LinkMysql
  {
    function sellerList(){
      $sql = "SELECT * FROM vendedores WHERE act = 1";
      return parent::returnQuery($sql);
    }

    function sellerEmail($name){
      $sql = "SELECT email FROM vendedores WHERE nombre = '$name' LIMIT 1";
      $res = parent::returnQuery($sql);
      $res = $res->fetch_assoc();
      return $res['email'];
    }

  }

 ?>
