<?php 
	if (isset($_GET['success-details'])) {
		$success = $_GET['success-details'];
	}
 ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-header well">
  			<h1><span class="glyphicon glyphicon-thumbs-up text-success"></span> ¡Exito! <small class="text-success">lea los detalles a continuación.</small></h1>
			</div>
			<div class="alert alert-success" role="alert"><strong>Información: </strong><?php echo $success; ?>
			<p><i>En 5 segundos sera redireccionado al formulario de clientes</i></p>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	setTimeout(function(){
		window.location.href="main.php?tab=cliente";
	},5000)
</script>