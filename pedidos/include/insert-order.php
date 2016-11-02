<?php 
session_start();
include '../classes/order.class.php';
$mainOrder  = array($_SESSION['seller']['ID'],$_SESSION['client']['id'],$_SESSION['aditionalInfo']['date']." ".$_SESSION['aditionalInfo']['hour'],$_SESSION['orderDetails']['SubTotal'],$_SESSION['orderDetails']['MontoIva'],$_SESSION['orderDetails']['Total'], 1,$_SESSION['aditionalInfo']['paymentWay'],$_SESSION['aditionalInfo']['observations']);
$orderDetails = $_SESSION['orderDetails']['Detalle'];



$order = new Order;
$order->insertNew($mainOrder, $orderDetails);

header("Location: ../main.php?tab=exito&success-details=Pedido enviado correctamente");
 ?>