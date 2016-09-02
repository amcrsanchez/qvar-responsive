<?php
    if(!isset($_POST)){
      return false;
    }else{
      session_start();
      $jsonData = $_POST['jsonData'];
      include '../classes/sellers.php';
      $sellerName = $_SESSION['userData']['vendedor'];
      $seller = new Seller;
      $sellerEmail = $seller->sellerEmail($sellerName);

      include '../mail/mail-send-order.php';
    }




?>
