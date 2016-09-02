<?php
include 'db.class.php';
/**
 * user class, to sign up, sign in, and other methods
 */
class User extends LinkMysql
{
  function userData($email){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    if(self::numRows($sql) > 0){
      return parent::returnQuery($sql);
    }else{
      return false;
    }
  }

  function emailExists($email){
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $res = self::numRows($sql);
      if ($res > 0) {
        return true;
      }else if($res == 0){
        return false;
      }
  }

  function rifExists($rif){
      $sql = "SELECT * FROM users WHERE rif = '$rif'";
      $res = self::numRows($sql);
      if ($res > 0) {
        return true;
      }else if($res == 0){
        return false;
      }
  }

  function loginValidation($email, $pass){
      $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
      $res = self::numRows($sql);
      if ($res > 0) {
        return parent::returnQuery($sql);
      }else{
        return false;
      }
  }

  function create($rif, $email, $name, $pass, $type){
    $sql = "INSERT INTO users VALUES('$rif','$email','$name','$pass',NULL,NULL,'','$type', NOW(), 1)";
    //echo $sql;
    if(self::simpleQuery($sql)){
      return true;
    }else{
      return false;
    }

  }

  function update($rif, $email, $razon, $pass, $direccion, $telefono, $vendedor){
    $sql = "UPDATE users SET rif = '$rif', email = '$email', razon_social = '$razon', pass = '$pass', direccion = '$direccion', telefono = '$telefono', vendedor = '$vendedor'
            WHERE rif='".$_SESSION['userData']['rif']."'";

    if(self::simpleQuery($sql)){
      $sqlNewUserData = "SELECT * FROM users WHERE rif = '$rif'";
      //echo $sqlNewUserData;
      $res = parent::returnQuery($sqlNewUserData);
      $_SESSION['userData'] = mysqli_fetch_assoc($res);
      //echo var_dump($_SESSION['userData']);
      return true;
    }else{
      return false;
    }

  }
}


 ?>
