<?php
session_start();
if (isset($_POST)) :
include '../classes/user.php';
$rif = $_POST['rif'];
$razon = $_POST['razon-social'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$vendedor = $_POST['vendedor'];

$user = new User;

if($user->emailExists($email) && $email != $_SESSION['userData']['email']){
  echo "El Email  ya esta registrado";
  return false;
}

if ($user->rifExists($rif) && $rif != $_SESSION['userData']['rif']) {
  echo "RIF ya registrado";
  return false;
}

if(!$user->update($rif, $email, $razon, $pass, $direccion, $telefono, $vendedor)){
  echo "Problema con el registro, intente de nuevo";
}else{
  echo 1;
}


endif; //isset($_POST)
?>
