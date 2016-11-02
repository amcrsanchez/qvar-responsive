<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="form-container background-dark-gray">
			<br>
				<div class="form-aditional-info">
					<div class="form-group">
						<select class="form-control" id="payment-way">
							<option value="">Forma de pago</option>
							<option value="Contado">Contado</option>
							<option value="Credito 8 Dias">Credito 8 Dias</option>
							<option value="Credito 15 Dias">Credito 15 Dias</option>
							<option value="Credito 30 Dias">Credito 30 Dias</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="aditional-emails" placeholder="Emails adicionales (separados por coma)">
					</div>
					<div class="form-group">
						<textarea class="form-control" id="observations" rows="10">Observaciones</textarea>
					</div>
					<div class="alert text-center" id="alerta" hidden="hidden"></div>
					<div class="text-center" id="loader" hidden="hidden"><img class="img" src="images/loading.gif" width="45"></div>
					<br>	
					<button class="btn btn-blue btn-block" id="btn-send-order">Enviar Pedido</button>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#btn-send-order").click(sendOrder);
	})

	function sendOrder(){
		$(".form-aditional-info #loader").fadeIn(200);
		$("#btn-send-order").addClass("disabled","disabled");
		var jsonAditional = {};
		var f = new Date();
		var day = f.getDate();
		var month = f.getMonth() + 1;
		var year = f.getFullYear();
		var date = day + "/" + month + "/" + year;
		var h = f.getHours();
		var m = f.getMinutes();
		var hour = h+":"+m;


		jsonAditional.emails = [];
		jsonAditional.paymentWay = $("#payment-way").val();
		jsonAditional.observations = $("#observations").val();
		jsonAditional.date = date;
		jsonAditional.hour = hour;



		if($("#aditional-emails").val().trim() != ""){
			var correos = $("#aditional-emails").val().split(",");
			for (var i = 0; i < correos.length; i++) {
				jsonAditional.emails.push(correos[i]);
			}
		}
		
		$.ajax({
			url: 'php-ajax/php-sessions.php',
			data: {aditionalInfo:jsonAditional},
			method: 'post',
			success: function(){

				window.location.href = "mail/send-order.php";

			},
			error: function(){
				$(".form-aditional-info #alerta").fadeIn(200);
				$(".form-aditional-info #alerta").html("Ha ocurrido un error, intente de nuevo.")
				$("#btn-send-order").removeAttr("disabled");
				setTimeout(function(){
						$(".form-aditional-info #alerta").fadeOut(200);
				},5000)
			},
			complete: function(){
				$(".form-aditional-info #loader").fadeOut(200);
				$("#btn-send-order").removeAttr("disabled");
			}

		})
	}
</script>