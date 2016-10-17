<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QVAR CA | PEDIDOS ONLINE</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/my.css">

</head>
<body>
	<div class="container div-vertical-align">
		<div class="row">
			<div class="col-xs-12">
				<img class="img img-responsive center-block logo" src="../images/logo.png" alt="logo-qvar">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1 class="font-OSCB text-white text-shadow">Pedidos <span class="font-OSCI">en Línea</span></h1>
			</div>
		</div>
		<div class="row">
			
			<div class="col-xs-12">
				<div class="form-container background-dark-gray">
					<h3 class="font-OSCI text-white text-shadow text-center">Entrada al Sistema</h3>
					<br>
					<div class="form" id="form-login">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user text-dark-gray"></i></div>
								<select class="form-control" id="slct-vendedor" data-container="body" data-toggle="popover" data-content="">
									
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key text-dark-gray"></i></div>
								<input class="form-control" type="password" id="txt-pass" placeholder="Contraseña" data-container="body" data-toggle="popover" data-content="">
							</div>
						</div>
						
						<button class="btn btn-blue btn-block" id="btn-login">Acceder</button>
						<br>
						<div class="alert text-center" id="alerta" hidden="hidden"></div>
						<div class="text-center" id="loader" hidden="hidden"><img class="img" src="images/loading.gif" width="45"></div>
						<div class="text-center">
							<button class="btn btn-link text-shadow" id="btn-forgot-password" >¿Ha olvidado su contraseña?</button>	
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<script src="../js/jquery-2.2.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script>
		(function($) {
			

			$('#btn-login').bind('click', function(event){
				if ($('#slct-vendedor').val() == '') {
					$('#slct-vendedor').popover({'placement':'top','content':'Debe seleccionar su nombre'})
					$('#slct-vendedor').popover('show')
				}else{
					$('#slct-vendedor').popover('hide')
						if($('#txt-pass').val().length < 4){
							$('#txt-pass').popover({'placement':'top', 'content':'La contraseña debe tener minimo 4 caracteres'})
							$('#txt-pass').popover('show')
						}else{
							$('#txt-pass').popover('hide')
							login($('#slct-vendedor').val(), $('#txt-pass').val());
						}
				}

				
			});

			$("#btn-forgot-password").bind('click',function(){
				if ($('#slct-vendedor').val() == '') {
					$('#slct-vendedor').popover({'placement':'top','content':'Debe seleccionar su nombre'})
					$('#slct-vendedor').popover('show')
				}else{
					$('#slct-vendedor').popover('hide')
					passRecovery($('#slct-vendedor').val());
				}
			});



			$.ajax({
				url:'php-ajax/seller-list.php',
				dataType: 'json',
				success: function(response){
							var html = "<option value=''>Seleccione su Nombre</option>";
							for(var i in response){
								html += "<option value='"+response[i].Nombre+"'>"+response[i].Nombre+"</option>";
							}

							$('#slct-vendedor').html(html);
						}
			})

			
		})(jQuery);
			
		function login(sellerName, pass){
			$("#loader").fadeIn(200);
			$("#btn-login").attr("disabled","disabled");
			$("#btn-forgot-password").attr("disabled","disabled");
			$.ajax({
				url:'php-ajax/login.php',
				type: 'post',
				data:{sellerName:sellerName, pass: pass},
				success: function(response){
					if (response == 1) {
						$("#loader").fadeOut(10);
						$("#alerta").fadeIn(100);
						$("#alerta").removeClass("alert-danger");
						$("#alerta").addClass("alert-success");
						$("#alerta").html("Inicio de Sesion correcto");
						setTimeout(function(){
							window.location.href="main.php?tab=cliente";
						},3000)
					}else if(response == 0){
						$("#loader").fadeOut(10);
						$("#alerta").fadeIn(100);
						$("#alerta").removeClass("alert-success");
						$("#alerta").addClass("alert-danger");
						$("#alerta").html("Contraseña Inválida");
					}

					setTimeout(function(){
						$("#alerta").fadeOut(500);
					},5000)
				},
				complete: function(){
					$("#loader").fadeOut(10);
					$("#btn-login").removeAttr("disabled");
					$("#btn-forgot-password").removeAttr("disabled");
				}
			})
		}

		function passRecovery(sellerName){
			$("#loader").fadeIn(200);
			$("#btn-login").attr("disabled","disabled");
			$("#btn-forgot-password").attr("disabled","disabled");
			$.ajax({
				url:'mail/mail-pass-recovery.php',
				type: 'post',
				data:{sellerName:sellerName},
				success: function(response){
					if (response == 1) {
						$("#loader").fadeOut(10);
						$("#alerta").fadeIn(100);
						$("#alerta").removeClass("alert-danger");
						$("#alerta").addClass("alert-success");
						$("#alerta").html("Se ha enviado la contraseña a su correo");
					}else if(response == 0){
						$("#loader").fadeOut(10);
						$("#alerta").fadeIn(100);
						$("#alerta").removeClass("alert-success");
						$("#alerta").addClass("alert-danger");
						$("#alerta").html("Ha ocurrido un error, intente luego");
					}

					setTimeout(function(){
						$("#alerta").fadeOut(500);
					},5000)
				},
				complete: function(){
					$("#loader").fadeOut(10);
					$("#btn-login").removeAttr("disabled");
					$("#btn-forgot-password").removeAttr("disabled");
				}
			})
		}
		

		
	</script>
</body>
</html>