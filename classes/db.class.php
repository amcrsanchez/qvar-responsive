<?php
/**
 *
 */
class LinkMysql extends mysqli
{
  private $host;
  private $user;
  private $pass;
  private $db;
  private $link;

  public function __construct()
  {
    $this->host = "localhost";
    $this->user = "qvarvene_root";
    $this->pass = "qvar16130548-*/";
    $this->db = "qvarvene_responsive";

    $this->link = new mysqli($this->host, $this->user, $this->pass, $this->db);
    if ($this->link->connect_errno) {
      echo "Fallo al conectar a la base de datos (".$this->link->connect_errno.") ".$this->link->connect_error;
    }
  }
  public function numRows($sql){
      $res = $this->link->query($sql);
      return $res->num_rows;
  }

  public function simpleQuery($sql){
    if($this->link->query($sql)){
      return true;
    }else{
      return false;
    }
  }

  public function returnQuery($sql){
  if($res = $this->link->query($sql)){
    return $res;
  }else{
    return false;
  }
  }

  public function insertReturnsId($sql){
    if($this->link->query($sql)){
      return $this->link->insert_id;
    }else{
      return false;
    }
  }

}






 ?>
