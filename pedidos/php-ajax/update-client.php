<?php 
if(!isset($_POST['id']))
	return false;

include '../classes/client.class.php';
$client = new Client;

$nombre = $_POST['nombre']; 
$rif = $_POST['rif'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$id = $_POST['id'];


if ($client->Update($nombre, $rif, $ciudad, $direccion, $telefono, $email, $id)) {
	echo 1;
}else{
	echo 0;
}



 ?>