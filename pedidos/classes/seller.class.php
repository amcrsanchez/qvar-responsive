<?php 
include '../../classes/db.class.php';

class Seller extends LinkMysql
{
	

	public $sellerList;
	public $id;
	public $name;
	public $phone;
	public $email;
	public $pass;


	public function __construct(){
		parent::__construct();
		self::sellerList();
	}

	public function sellerList(){
		$sql = "SELECT * FROM vendedores WHERE act = 1";
		$res = parent::returnQuery($sql);

		$resArray = array();

		while ($row = $res->fetch_assoc()) {
			$resArray[] = array('ID' => $row['id_vendedor'], 'Nombre' => $row['nombre'],'Telefono' => $row['telefono'],'Email' => $row['email']);
		}

		self::set('sellerList',json_encode($resArray));
	}

	public function setName($sellerName){
		
		$sql = "SELECT * FROM vendedores WHERE nombre = '$sellerName'";
		$res = parent::returnQuery($sql);
		$row = $res->fetch_assoc();
		self::set('id',$row['id_vendedor']);
		self::set('name',$sellerName);
		self::set('phone',$row['telefono']);
		self::set('email',$row['email']);
		self::set('pass',$row['pass']);

	}

	public function passRecovery(){
		return array('Email' => $this->email, 'Pass' => $this->pass);
	}

	public function login($sellerName, $pass){
		$sql = "SELECT * FROM vendedores WHERE nombre = '$sellerName' AND pass = '$pass'";
		$res = parent::numRows($sql);
		if ($res === 0) {
			return false;
		}else{
			self::setName($sellerName);
			return true;
		}
	}

	private function set($var,$value){
		$this->$var = $value;
	}


}




?>