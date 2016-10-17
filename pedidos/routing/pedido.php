<?php 
	$sellerObject = $_SESSION['seller'];
	$clientArray = $_SESSION['client'];
 ?>

 <div class="container">
 
 <div class="row">
 	<div class="col-xs-12">
 		<h4 class="text-white">Cliente: <?php echo $clientArray['nombre']; ?></h4>
 	</div>
 	<div class="col-xs-12">
		<div class="form-order">
			<div class="form-group">
				<select class="form-control" id="slct-product">
					<option value="">Seleccione un producto</option>
				</select>
			</div>
			<div class="form-group">
				<select class="form-control" id="slct-filings">
					<option value="">Seleccione una presentacion</option>
				</select>
			</div>
 		</div>	
 	</div>
 	
 </div>	
 	
 </div>
 <script>
 	$(document).ready();
 </script>