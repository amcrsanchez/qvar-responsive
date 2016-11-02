<?php 
	$sellerObject = $_SESSION['seller'];
	$clientArray = $_SESSION['client'];
 ?>

 <div class="container">
 
 <div class="row">
 	<div class="col-xs-12">
 		<h4 class="text-white">Cliente: <?php echo $clientArray['nombre']; ?></h4>
 	</div>
 	
		<div class="form-order">
			<div class="col-xs-8 form-group">
				<select class="form-control required" id="slct-product">
					<option value="">Seleccione un producto</option>
				</select>
			</div>
			<div class="col-xs-4 form-group">
				<select class="form-control" id="slct-color">
					<option value="">Color</option>
					<option value="N/A">N/A</option>
					<option value="Purpura">Purpura</option>
					<option value="Rojo">Rojo</option>
					<option value="Verde">Verde</option>
				</select>
			</div>
			<div class="col-xs-8 form-group">
				<select class="form-control required" id="slct-filings">
					<option value="">Seleccione una presentacion</option>
				</select>
			</div>
			<div class="col-xs-4 form-group">
				<input class="form-control required" type="text" id="txt-qty" placeholder="Cantidad"  onkeypress="return onlyNumbers(event)">
			</div>
			<div class="col-xs-8 form-group">
				<input class="form-control required" type="text" id="txt-price" placeholder="Precio de Venta (punto para decimales)" onkeypress="return onlyNumbers(event)">
			</div>
			<div class="col-xs-4 form-group">
				<button class="btn btn-success btn-block" id="btn-add-product">Agregar</button>
			</div>
			<div class="container">
				<div class="col-xs-12 alert text-center background-dark-gray" id="alerta" hidden="hidden"></div>
			</div>
 		</div>	
 		
 	
 </div>
 <div class="row">
 	<div class="col-xs-12">
 		<div class="background-dark-gray order-table-container">
 			
 			<div class="">
 				<table class="table table-condensed" id="order-table">
 				<thead>
	 				<tr>
	 					<th>Producto</th>
	 					<th>Presentacion</th>
	 					<th>Cant</th>
	 					<th>Precio</th>
	 					<th>Total</th>
	 					<th><center>Quitar</center></th>
	 				</tr>
 				</thead>
 				<tbody id="table-body">

 				</tbody>
 				<tfoot>
 					<tr>
 						<th class="text-right" colspan="4">Sub-Total:</th>
 						<td id="sub-total"></td>
 						<td></td>
 					</tr>
 					<tr>
 						<th class="text-right" colspan="4">IVA:</th>
 						<td id="iva"></td>
 						<td></td>
 					</tr>
 					<tr>
 						<th class="text-right" colspan="4">Total:</th>
 						<td id="total"></td>
 						<td></td>
 					</tr>
 				</tfoot>
 				</table>
 				<div id="table-alert"><center>No hay datos en este pedido aun</center></div>
 			</div>
 		</div>
 		<br>
 		<button class="btn btn-block" disabled="disabled" id="pedido-continuar">Continuar</button>
    <br>
 	</div>
 </div>
 	
 </div>
 <script>
 var productList;
  $(document).ready(function(){
  	loadProductsSelect();
  	$("#slct-product").change(loadFilingsSelect);
  	$("#btn-add-product").click(addProductToList);
  	$("#pedido-continuar").click(orderContinue);

  })

  function loadProductsSelect(){
  	$.ajax({
  		url:'php-ajax/product-list.php',
  		dataType:'json',
  		success:function(response){
  			var html = '<option value="">Seleccione un producto</option>';
  			productList = response;
  				$.each(productList,function(i){
  					html += '<option index="'+i+'" value="'+productList[i].Codigo+'">'+productList[i].Nombre+'</option>';
  				})
  				$("#slct-product").html(html);
  		}


  	})
  }

  function loadFilingsSelect(){
  	var index = $("#slct-product option:selected").attr("index");
  	var html = '<option value="">Seleccione una presentacion</option>';
  	
  	if(index === undefined){
  		var html = '<option value="">Seleccione una presentacion</option>';
  		$("#slct-filings").html(html);
  		return false;
  	}

  	$.each(productList[index].Presentaciones,function(i){
  		html += '<option value="'+productList[index].Presentaciones[i]+'">'+productList[index].Presentaciones[i]+'</option>';
  	})
  	$("#slct-filings").html(html);
  }

  function addProductToList(){
  	
  	var emptyField = false;
  	$(".form-order .required").each(function(){
  		if ($(this).val().trim() == "") {
  			emptyField = true;
  		}
  	});

  	if (emptyField) {
  		$(".form-order #alerta").fadeIn(200);
  		$(".form-order #alerta").html("<i class='fa fa-info'></i> <span class='text-danger'>Los campos producto, presentacion, cantidad y precio son requeridos.</span>");
  	}else{
  		$(".form-order #alerta").fadeOut(200);
  		addTableRow();
  	}


  	
  }

  function addTableRow(){
  	$("#table-alert").fadeOut(200);
  	var html = "<tr>"+
            "<td hidden='hidden'>"+ $("#slct-product option:selected").val() + "</td>"+
	 					"<td>"+ $("#slct-product option:selected").html() + " " + $("#slct-color").val() +"</td>"+
	 					"<td>"+ $("#slct-filings").val()+"</td>"+
	 					"<td>"+ parseFloat($("#txt-qty").val()).toFixed(2)+"</td>"+
	 					"<td>"+ parseFloat($("#txt-price").val()).toFixed(2)+"</td>"+
	 					"<td class='total-row'>"+ parseFloat($("#txt-price").val() * $("#txt-qty").val()).toFixed(2)+"</td>"+
	 					"<td class='pointer'><center><i class='fa fa-times-circle fa-2x del text-red' onclick='deleteFromTable(this)'></i></center></td>"+
	 			"</tr>";
	$("#order-table tbody").append(html);
	$("#pedido-continuar").removeAttr("disabled");
	totalize();
  }

  function deleteFromTable(element){     
  	document.getElementById("table-body").removeChild(element.parentNode.parentNode.parentNode);
  	
  	if(isEmptyOrderTable()){
  			$("#table-alert").fadeIn(200);
  			$("#pedido-continuar").attr("disabled","disabled");
  	}
  	totalize();
}

  function isEmptyOrderTable(){
  	if($("#order-table tbody").children().length === 0){
  		return true;
  	}else{
  		return false;
  	}
  	
  }

  function totalize(){
  	var iva = 0.12;
  	var subTotal = 0;
  	var montoIva = 0;
  	var total = 0;

  	$("td.total-row").each(function(){
  		subTotal += parseFloat($(this).html());
  	})

  	montoIva = parseFloat(subTotal * iva);
  	total = parseFloat(subTotal + montoIva);
  	$("#sub-total").html(subTotal.toFixed(2));
  	$("#iva").html(montoIva.toFixed(2));
  	$("#total").html(total.toFixed(2));
  	
  }

  function orderContinue(){
  	var json = createJsonOrder();
  	$.ajax({
  		url:'php-ajax/php-sessions.php',
  		data: {orderDetails:json},
  		method: 'post',
  		
  		success:function(){
  			window.location.href = 'main.php?tab=adicional';
  		}
  	})
  }

  function createJsonOrder(){
  	var jsonDetails = {Detalle:[],SubTotal:$("#sub-total").html(),MontoIva:$("#iva").html(),Total:$("#total").html()};
  	$("#table-body tr").each(function(){
  		jsonDetails.Detalle.push({Codigo:$(this).children()[0].innerHTML, Producto:$(this).children()[1].innerHTML, Presentacion:$(this).children()[2].innerHTML, Cantidad:$(this).children()[3].innerHTML, Precio: $(this).children()[4].innerHTML,Total: $(this).children()[5].innerHTML});
  	});

  	return jsonDetails;
  }

 </script>