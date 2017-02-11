<div class="container">
	<div class="row">
		<div class="col-sm-12">
			
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-filter"></i></div>
					<input class="form-control" id="filter" type="text" placeholder="Filtrar Clientes">
				</div>
				
			</div>
				
			<div class="form-group">
				<select class="form-control" id="slct-cliente">
					
				</select>	
			</div>
			
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-container background-dark-gray" hidden="hidden" id="client-container">
			
				<div class="form" id="form-cliente">
					<input class="hidden" type="text" id="id-cliente">
					<div class="form-group">
						<label for="nombre">Razón Social</label>		
						<input class="form-control required" type="text" id="razon" disabled="disabled">		
					</div>
					<div class="form-group">
						<label for="nombre">RIF</label>		
						<input class="form-control required" type="text" id="rif" disabled="disabled">		
					</div>
					<div class="form-group">
						<label for="nombre">Ciudad</label>		
						<input class="form-control" type="text" id="ciudad" disabled="disabled">		
					</div>
					<div class="form-group">
						<label for="nombre">Dirección</label>		
						<textarea  class="form-control" type="text" id="direccion" disabled="disabled"></textarea>
					</div>
					<div class="form-group">
						<label for="nombre">Teléfono</label>		
						<input class="form-control" type="text" id="telefono" disabled="disabled">		
					</div>
					<div class="form-group">
						<label for="nombre">Email</label>		
						<input class="form-control" type="text" id="email" disabled="disabled">		
					</div>
					<div class="row">
						<div class="col-xs-6"><button class="btn btn-block btn-danger" id="client-edit">Editar</button></div>
						<div class="col-xs-6"><button class="btn btn-block btn-success" id="client-save" disabled="disabled">Guardar</button></div>
					</div>
					<div class="alert text-center" id="alerta" hidden="hidden"></div>
					<div class="text-center" id="loader" hidden="hidden"><img class="img" src="images/loading.gif" width="45"></div>
				</div>
			</div>
			 <br>
			<button class="btn btn-block" disabled="disabled" id="cliente-continuar">Continuar</button>	
			<br>
		</div>
	</div>
</div>
<script>
	var clientArrayPos = null;
	var clientList;

	(function($){
		slctClientFill();
		
		
		$("#filter").bind("keyup",filter);
		$("#slct-cliente").bind("change",loadClient);
		$("#cliente-continuar").bind("click",toOrderDetails);
	})(jQuery);

	function slctClientFill(){
		
		var html = "<option value=''>Seleccione</option><option value='nuevo'>CREAR NUEVO CLIENTE</option>";

		$.ajax({
			url:'php-ajax/client-list.php',
			dataType:'json',
			success: function(response){
				clientList = response;
				for(var i in response){
					html += "<option value='"+response[i].ID+"'>"+response[i].Nombre+"</option>"
				}

				$("#slct-cliente").html(html);
				
			}
		});

			
	}


	function filter(){

		var val = RegExp($(this).val(),'i');
		var html = "<option value=''>Seleccione</option><option value='nuevo'>CREAR NUEVO CLIENTE</option>";

		for(var i in clientList){
			if (val.test(clientList[i].Nombre)) {

				html += "<option value='"+clientList[i].ID+"'>"+clientList[i].Nombre+"</option>"
			}
		}
		$("#slct-cliente").html(html);
		
	}

	function loadClient(){
		disableFormInputs();
		$("#alerta").fadeOut(200);

		if($(this).val() == ''){
			$("#client-container").fadeOut(300);
			$("#cliente-continuar").attr("disabled","disabled");
			return false;
		}
			

		if ($(this).val() == 'nuevo') {
			newClient();
			
			return false;
		}else if($(this).val() != '' && $(this).val()!= 'nuevo'){
			editClient();
		}

		$("#client-container").fadeIn(300);
		$("#client-edit").removeAttr("disabled");
		$("#cliente-continuar").removeAttr("disabled");
		var id = $(this).val();
		for(var i in clientList){
			if (clientList[i].ID === id) {
				id = i;
			}
		}

		$("#id-cliente").val(clientList[id].ID);
		$("#razon").val(clientList[id].Nombre);
		$("#rif").val(clientList[id].Rif);
		$("#ciudad").val(clientList[id].Ciudad);
		$("#direccion").html(clientList[id].Direccion);
		$("#telefono").val(clientList[id].Telefono);
		$("#email").val(clientList[id].Email);
	}

	function clearFormInputs(){
		$("#razon").val("");
		$("#rif").val("");
		$("#ciudad").val("");
		$("#direccion").html("");
		$("#telefono").val("");
		$("#email").val("");
	}

	function enableFormInputs(){
		$("#razon").removeAttr("disabled");
		$("#rif").removeAttr("disabled");
		$("#ciudad").removeAttr("disabled");
		$("#direccion").removeAttr("disabled");
		$("#telefono").removeAttr("disabled");
		$("#email").removeAttr("disabled");
		
	}

	function disableFormInputs(){
		$("#razon").attr("disabled","disabled");
		$("#rif").attr("disabled","disabled");
		$("#ciudad").attr("disabled","disabled");
		$("#direccion").attr("disabled","disabled");
		$("#telefono").attr("disabled","disabled");
		$("#email").attr("disabled","disabled");
		
	}

	function disableAll(){
		disableFormInputs();
		$("#cliente-continuar").attr("disabled","disabled");
		$("#client-edit").attr("disabled","disabled");
		$("#client-save").attr("disabled","disabled");

	}

	function enableAll(){
		enableFormInputs();
		$("#cliente-continuar").removeAttr("disabled");
		$("#client-edit").removeAttr("disabled");
		$("#client-save").removeAttr("disabled");

	}

	function loading(){
		disableFormInputs();
		$("#loader").fadeIn(200);
	}

	function loaded(){
		enableFormInputs();
		$("#loader").fadeOut(200);
	}

	function editClient(){
		
		$("#client-edit").bind("click", editToggle);
		$("#client-edit").removeClass("hidden");
		$("#client-edit").removeAttr("disabled","disabled");
		
		$("#client-save").attr("disabled","disabled");
		$("#client-save").parent().removeClass("col-xs-12");
		$("#client-save").parent().addClass("col-xs-6");
		$("#client-save").unbind("click");
		$("#client-save").bind("click", saveEditClient);

		$("#cliente-continuar").removeAttr("disabled");

		$("#razon").focus();
	}

	function editToggle(){
		enableFormInputs();
		$("#client-edit").attr("disabled","disabled");
		$("#client-save").removeAttr("disabled");
		$("#cliente-continuar").attr("disabled","disabled");

		$("#razon").focus();
	}

	function createClientJSON(){
		var clientJSON = {
			id:$("#id-cliente").val(),
			nombre:$("#razon").val(),
			rif:$("#rif").val(),
			ciudad:$("#ciudad").val(),
			direccion:$("#direccion").val(),
			telefono:$("#telefono").val(),
			email:$("#email").val()
		};

		return clientJSON;
	}
	

	function formValidation(){
		var res = {status:"", msg:""};
		var emptyField = false;

		$("#form-cliente .required").each(
			function(){

				if ($(this).val().trim() == '') {
					emptyField = true;
				}
			}
		);
	

		if (emptyField) {
			res.status = false;
			res.msg = "<i class='fa fa-info'></i> Los campos Razón Social y RIF son requeridos";
			
		}else{

			if (strLengthValidation($("#rif").val(),10,12)) {
				
				if ($("#email").val().trim() != '' && !validEmail($("#email").val())) {
					res.status = false;
					res.msg = "<i class='fa fa-info'></i> Formato de correo incorrecto";
					
				}else{
					res.status = true;
					res.msg = "<i class='fa fa-check'></i> Validacion Exitosa";
					
				}
				
			}else{
				res.status = false;
				res.msg = "<i class='fa fa-info'></i> El RIF debe tener de 10 a 12 caracteres";
				
			}
			
		}

		return res;
	}

	function newClient(){
		clearFormInputs();
		enableFormInputs();
		$("#client-edit").addClass("hidden");
		$("#client-container").fadeIn(300);
		$("#client-save").removeAttr("disabled");
		$("#client-save").parent().removeClass("col-xs-6");
		$("#client-save").parent().addClass("col-xs-12");

		$("#client-save").unbind("click");
		$("#client-save").bind("click",saveNewClient);

		$("#cliente-continuar").attr("disabled","disabled");
	}

	function saveNewClient(){
		var validation = formValidation();
		
		
		if (!validation.status) {
			$("#alerta").fadeIn(200);
			$("#alerta").html(validation.msg);
		}else{
			clientInsert();
		}
		

		setTimeout(function(){
			$("#alerta").fadeOut(200);
		},7000);
	}

	function saveEditClient(){
		var validation = formValidation();
		
		
		if (!validation.status) {
			$("#alerta").fadeIn(200);
			$("#alerta").html(validation.msg);
		}else{
			clientUpdate();
			$("#client-edit").removeAttr("disabled");
			$("#client-save").attr("disabled","disabled");
			$("#cliente-continuar").removeAttr("disabled");
			disableFormInputs();
		}
		

		setTimeout(function(){
			$("#alerta").fadeOut(200);
		},7000);
	}

	function clientInsert(){
		loading();
		var msg;
		$.ajax({
			url:'php-ajax/new-client.php',
			data:{
				nombre:$("#razon").val(),
				rif:$("#rif").val(),
				ciudad:$("#ciudad").val(),
				direccion:$("#direccion").val(),
				telefono:$("#telefono").val(),
				email:$("#email").val()
			},
			type:'post',
			success: function(response){
				if (response != 0) {
					$("#id-cliente").val(response);
					console.log(response);
					$msg = "<i class='fa fa-check'></i> Cliente Registrado Exitosamente";
					editClient();
					slctClientFill();
				}else if(response == 0){
					$msg = "<i class='fa fa-info'></i> Este rif ya esta registrado en la base de datos";
				}
				$("#alerta").fadeIn(200);
				$("#alerta").html($msg);
				loaded();
				disableFormInputs();
			}
		});

		
		
	}
	
	

	function clientUpdate(){
	loading();
	var res = $.ajax({
			url:'php-ajax/update-client.php',
			data:{
				id:$("#id-cliente").val(),
				nombre:$("#razon").val(),
				rif:$("#rif").val(),
				ciudad:$("#ciudad").val(),
				direccion:$("#direccion").val(),
				telefono:$("#telefono").val(),
				email:$("#email").val()
			},
			type:'post',
			success: function(response){
				if (response == 1) {
					$msg = "<i class='fa fa-check'></i> Cliente Actualizado Exitosamente";

					slctClientFill();
				}else if(response == 0){
					$msg = "<i class='fa fa-user'></i> Hubo un problema, Intente de nuevo";
				}
				$("#alerta").fadeIn(200);
				$("#alerta").html($msg);
				loaded();
				disableFormInputs();
			}
		});
	}

	function toOrderDetails(){
		var clientJSON = createClientJSON();
		$.ajax({
			url:'php-ajax/php-sessions.php',
			data:{client:clientJSON},
			method:'post',
			
			success:function(){
				window.location.href = "main.php?tab=pedido";
			}
		});
	}
</script>
