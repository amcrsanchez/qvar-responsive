<?php 
	include '../../classes/db.class.php';

	class Client extends LinkMysql
	{
		

		public function __construct()
		{
			parent::__construct();
		}

		public function All(){
			$sql = "SELECT * FROM clientes WHERE act = 1";
			$res = parent::returnQuery($sql);
			$clientList = array();

			while ($row = $res->fetch_assoc()) {
				$clientList[] = array("ID" => $row['id_cliente'], "Nombre"=>htmlentities(utf8_encode($row['nombre'])), "Rif"=>$row['rif'], "Ciudad"=>htmlentities($row['ciudad']), "Direccion"=>htmlentities(utf8_encode($row['direccion'])), "Telefono"=>htmlentities($row['telefono']), "Email"=>htmlentities($row['email']));
			}

			return (json_encode($clientList));
		}

		public function Exists($rif){
			$sql = "SELECT * FROM clientes WHERE rif = '$rif'";
			$res = parent::numRows($sql);
			if ($res > 0) {
				return true;
			}else{
				return false;
			}
		}

		public function InsertNew($nombre, $rif, $ciudad, $direccion, $telefono, $email){
			$sql = "INSERT INTO clientes VALUES('','$nombre','$rif','$ciudad','$direccion','$telefono','$email',1)";
			return parent::insertReturnsID($sql);
		}

		public function Update($nombre, $rif, $ciudad, $direccion, $telefono, $email, $id){
			$sql = "UPDATE clientes SET nombre = '$nombre', rif = '$rif', ciudad = '$ciudad', direccion = '$direccion', telefono = '$telefono' , email = '$email' WHERE id_cliente = $id";
			return parent::simpleQuery($sql);
		}

	}



	// $client = new Client;
	// var_dump($client->All());
	
 ?>