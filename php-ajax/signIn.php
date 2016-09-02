<?php
if (isset($_POST)) :
include '../classes/user.php';
$email = $_POST['email-login'];
$pass = $_POST['pass-login'];
$user = new User;

if($userData = $user->loginValidation($email,$pass)){
  session_start();
  $_SESSION['userData'] = mysqli_fetch_assoc($userData);
  echo 1;
}else{
  echo "Usuario y/o Contraseña Inválidos, por favor, intente nuevamente.";
}

endif; //isset($_POST)
?>
