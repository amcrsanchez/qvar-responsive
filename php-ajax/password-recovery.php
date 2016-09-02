<?php
if (!isset($_POST['email'])) {
 return false;
}
$email = $_POST['email'];
include '../classes/user.php';
$user = new User;

if(!$user->emailExists($email)){
  echo 0;
}else{
  $userData = mysqli_fetch_assoc($user->userData($email));
  include '../mail/mail-pass-recovery.php';
  echo 1;
}


?>
