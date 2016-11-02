<?php 
	if (isset($_GET['error-details'])) {
		$error = $_GET['error-details'];
	}
 ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-header well">
  			<h1><span class="glyphicon glyphicon-thumbs-down text-danger"></span> ¡Ha ocurrido un Error! <small class="text-danger">lea los detalles a continuación.</small></h1>
			</div>
			<div class="alert alert-danger" role="alert"><strong>Informacion del Error: </strong><?php echo $error; ?>
			<p><i>En 5 segundos sera redireccionado al formulario de clientes</i></p></div>
			
		</div>
	</div>
</div>
<script type="text/javascript">
	setTimeout(function(){
		window.location.href="main.php?tab=cliente";
	},5000)
</script>