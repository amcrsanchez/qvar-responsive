function loadFiling(element){
  var prodCode = element.value;
  var filings;



  $.ajax({
    url: '../php-ajax/product-filings.php',
    data:{prodCode: prodCode},
    type:'POST',
    dataType:'json',
    success: function(json){
      if(json == "")
        filings = "";
     for(i in json){
       filings += "<option value='"+json[i]+"'>"+json[i]+"</option>";
     }
    },
    complete: function(){
      $("#presentacion").html(filings);
    }
  });
}

//global vars to addToList function
var itemCounter = 0;
function addToList(){

  var product, filing, cant
  var newItem, table, form, requiredElements, emptyElement, msgAjax
  emptyElement = false;

  form = __("form-pedido-cliente");
  requiredElements = form.getElementsByClassName("required");
  for (var i = 0; i < requiredElements.length; i++) {
    if(requiredElements[i].value.trim() == "" || requiredElements[i].value == 0){
      emptyElement = true;
    }
  }



  if (emptyElement) {
    msgAjax = '<div class="alert alert-danger alert-dismissible" role="alert">'
    msgAjax +='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
    msgAjax +='<div id="msg-ajax">'
    msgAjax +='<strong>¡Importante!</strong> <p>Debe llenar todos los campos</p>'
    msgAjax +='</div>'
    msgAjax +='</div>';

    $("#_AJAX_").html(msgAjax);
    return false;
  }else{
    $("#_AJAX_").html("");
    itemCounter++;
    productCode = __("producto").value;
    productName = __("producto").options[__("producto").selectedIndex].text;
    filing = __("presentacion").value;
    cant = __("cantidad").value;
    table = __("order-table");
    var item = "item_"+itemCounter;
    newItem = "<tr id='"+item+"'><td>"+productCode+"</td><td>"+productName+"</td><td>"+filing+"</td><td>"+cant+"</td><td><input class='btn btn-danger btn-block' type='button' onclick='deleteItem(\""+item+"\")' value='eliminar'></td></tr>";
    table.innerHTML += newItem;
    __("no-items").innerHTML = "";
    __("producto").focus();
    __("cantidad").value = "";
    $("#enviar").removeClass("hidden");
  }


}

function deleteItem(item){
  var itemToDelete = __(item);
  var orderTable = __("order-table");
  var rowsOrderTable = orderTable.getElementsByTagName("tr");
  itemToDelete.parentNode.removeChild(itemToDelete);

  if (rowsOrderTable.length == 1){
    __("no-items").innerHTML = "<h4 class='text-muted'>No hay items</h4>";
    $("#enviar").addClass("hidden");
  }
}

function sendOrder(){
  $(".loader-container .loader").removeClass("hidden");
  var json = createOrderJson();

  $.ajax({
    url:'../php-ajax/send-order.php',
    data:{jsonData: json},
    type: 'POST',
    success: function(response){
      if (response == 1) {
        msgAjax = '<div class="alert alert-success alert-dismissible" role="alert">'
        msgAjax +='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
        msgAjax +='<div id="msg-ajax">'
        msgAjax +='<strong>¡Éxito!</strong> <p>Su pedido ha sido enviado correctamente, en el transcurso del dia su vendedor se estará comunicando con usted, Gracias.</p>'
        msgAjax +='</div>'
        msgAjax +='</div>';

        $("#_AJAX_").html(msgAjax);

        setTimeout(function(){
          window.location.href="index.php?tab=pedidos-en-linea";
        },3000);
      }else{
        msgAjax = '<div class="alert alert-danger alert-dismissible" role="alert">'
        msgAjax +='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
        msgAjax +='<div id="msg-ajax">'
        msgAjax +='<strong>¡Error!</strong> <p> '+response+' </p>'
        msgAjax +='</div>'
        msgAjax +='</div>';

        $("#_AJAX_").html(msgAjax);
      }
      $(".loader-container .loader").addClass("hidden");
    }
  })
}

function createOrderJson(){
  var table, tr, td;
  var json = [];
  table = __("order-table");
  tr = table.getElementsByTagName("tr");
  for (var i = 1; i < tr.length; i++) {
    item = {codigo:tr[i].childNodes[0].innerHTML, producto: tr[i].childNodes[1].innerHTML,
            presentacion: tr[i].childNodes[2].innerHTML, cantidad: tr[i].childNodes[3].innerHTML,
            precio: 'NULL', subtotal: 'NULL', iva: 'NULL', total: 'NULL', act:1};
    json.push(item);
  }

  return json;

}
