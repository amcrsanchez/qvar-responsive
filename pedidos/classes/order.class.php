<?php 
	//include '../../classes/db.class.php';
	
	class Order extends LinkMysql
	{
		private $insertID;
		function __construct()
		{
			parent::__construct();
		}

		private function set($var,$val){
			$this->$var = $val;
		}

		public function insertNew($mainArray, $detailsArray){
			$sql = "INSERT INTO `pedidos_vendedores`(`id_pedido`, `id_vendedor`, `id_cliente`, `fecha_hora`, `base_imp`, `iva`, `total`, `act`, `forma_pago`, `observaciones`) 
					VALUES ('',$mainArray[0],$mainArray[1],'$mainArray[2]',$mainArray[3],$mainArray[4],$mainArray[5],$mainArray[6],'$mainArray[7]','$mainArray[8]')";

		$this->insertID = parent::insertReturnsId($sql);

			if ($this->insertID) {
				self::insertDetails($this->insertID,$detailsArray);
			}else{
				return false;
			}

		}

		private function insertDetails($id,$detailsArray){
			$sql = "INSERT INTO `detalle_pedidos_vendedores`(`id_detalle`, `id_pedido`, `codigo_producto`, `producto`, `presentacion`,`cantidad`, `precio`, `iva`, `total`, `act`)  VALUES ";
			for ($i=0; $i < sizeof($detailsArray) ; $i++) { 
				$sql .= "('',$id,'".$detailsArray[$i]['Codigo']."','".$detailsArray[$i]['Producto']."','".$detailsArray[$i]['Presentacion']."',".$detailsArray[$i]['Cantidad'].",".$detailsArray[$i]['Precio'].",0,".$detailsArray[$i]['Total'].",1),";
			}

			$sql = trim($sql,',');
			
			parent::simpleQuery($sql);
		}
	}


 ?>