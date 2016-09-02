<?php
if (isset($_POST)) :
include '../classes/user.php';
$rif = $_POST['prefijo-rif'].$_POST['ci-rif'];
$razon = $_POST['nombre-razon'];
$email = $_POST['email'];
$pass = $_POST['pass1'];
$type = 'User';

$user = new User;

if($user->emailExists($email)){
  echo "El Email  ya esta registrado";
  return false;
}

if ($user->rifExists($rif)) {
  echo "RIF ya registrado";
  return false;
}

if(!$user->create($rif, $email, $razon, $pass, $type)){
  echo "Problema con el registro, intente de nuevo";
}else{
  $userData = $user->loginValidation($email,$pass);
  session_start();
  $_SESSION['userData'] = mysqli_fetch_assoc($userData);
  include_once '../mail/welcome-mail.php';
  echo 1;
}


endif; //isset($_POST)
?>
