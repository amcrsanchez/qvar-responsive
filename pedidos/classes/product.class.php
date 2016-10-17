<?php 
	include '../../classes/db.class.php';
	
	class Product extends LinkMysql
	{
		public $ProductList = array();

		public function __construct(){
			parent::__construct();
			self::ProductList();
		}

		private function ProductList(){
			$sql = "SELECT codigo, nombre FROM productos";
			$res = parent::returnQuery($sql);
			while ($row = $res->fetch_assoc()) {
				$this->ProductList[] = array("Codigo"=>$row['codigo'],"Nombre"=>$row['nombre'],"Presentaciones"=>array());
			}

			self::addFilings();
		}

		private function SearchFilings($prodCode){
			$resArray = array();
			$sql = "SELECT presentaciones.presentacion 
					FROM presentaciones
					INNER JOIN producto_presentacion
					ON presentaciones.id = producto_presentacion.id_presentacion
					WHERE producto_presentacion.codigo_producto = '$prodCode'";

			$res = parent::returnQuery($sql);
			while ($row = $res->fetch_assoc()) {
				$resArray[] = $row['presentacion'];
			}

			return $resArray;
		}

		private function addFilings(){
			for ($i=0; $i < count($this->ProductList) ; $i++) { 
				$filings = self::SearchFilings($this->ProductList[$i]['Codigo']);

				for ($j=0; $j < count($filings) ; $j++) { 
					$this->ProductList[$i]['Presentaciones'][] = $filings[$j];
				}
			}
		}



		
	}


	

 ?>