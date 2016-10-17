<?php 
	include '../classes/client.class.php';
	$client = new Client;

	if(!isset($_POST['nombre']))
		return false;

	$nombre = $_POST['nombre'];
	$rif = $_POST['rif'];
	$ciudad = $_POST['ciudad'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];

	if (!$client->Exists($rif)) {
		$id = $client->insertNew($nombre,$rif,$ciudad,$direccion,$telefono,$email);
		echo $id;
	}else{
		echo 0;
	}

 ?>