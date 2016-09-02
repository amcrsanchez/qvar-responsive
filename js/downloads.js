//VARIABLES GLOBALES//
var downloadServer = 'http://qvar-server1.ddns.net:8080/descargas/';
//VARIABLES GLOBALES//

function loadDownloadOptions(element){
  $("#btn-buscar-descargas").attr("disabled","disabled");
  $("#product-description .contenido").html("");
  $("#product-description").fadeOut(100);
  $("#div-downloads").html("");
  //$("#product-description").attr("hidden","hidden");
  if (element.id == "clasificacion-producto") {
    if (element.value == 5) {
      loadAutoClass('null','null');

    }else if(element.value != 5 && element.value != ""){
      loadProducts(element.value,'null');

    }else{
      $("#div-select-download-1").addClass("hidden");
      $("#div-select-download-2").addClass("hidden");
    }
  }else if(element.id == "select-download-1"){
    if (element.value == "") {
      $("#div-select-download-2").addClass("hidden");
    }else {
      loadProducts(5,element.value);
    }

  }else if(element.id == "select-download-2"){
    if (element.value != "") {
        $.ajax({
          url: '../php-ajax/product-details.php',
          data:{prodCode: element.value},
          type: 'get',
          dataType: 'json',
          success: function(response){
          $("#product-description .contenido").html(response.descripcion_corta + "<br><br><p><em>Haga clic en buscar, para obtener acceso a las descarga de hoja de seguridad y especificaciones técnicas.</em></p>");
          }
        });
        $("#product-description").fadeIn(500);
        //$("#product-description").removeAttr("hidden");
        $("#btn-buscar-descargas").removeAttr("disabled");
    }

  }


}


function loadAutoClass(classVal,classAutoVal){
  $.ajax({
    url: '../php-ajax/loadDownloadOptions.php',
    data:{classVal: classVal, classAutoVal: classAutoVal},
    type: 'post',
    dataType: 'json',
    success: function(response){
      var html = "<option value=''>Seleccione la clasificación automotríz</option>";
      for(var i in response){
        html += "<option value='"+response[i].id+"'>"+response[i].clasificacion_automotriz+"</option>";
      }
      //console.log(html);
      $("#div-select-download-1").removeClass("hidden");
      $("#div-select-download-2").addClass("hidden");

      $("#select-download-1").html(html);
    }
  });
}

function loadProducts(classVal, classAutoVal){
  $.ajax({
    url: '../php-ajax/loadDownloadOptions.php',
    data:{classVal: classVal, classAutoVal: classAutoVal},
    type: 'post',
    dataType: 'json',
    success: function(response){
      var html = "<option value=''>Seleccione el producto</option>";
      for(var i in response){
        html += "<option value='"+response[i].codigo+"'>"+response[i].nombre+"</option>";
      }
      console.log(html);
      if (classVal != 5) {
          $("#div-select-download-1").addClass("hidden");
      }

      $("#div-select-download-2").removeClass("hidden");
      $("#select-download-2").html(html);
    }
  });
}

function searchDownloads(){
var html = "";
$.ajax({
  url: '../php-ajax/search-downloads.php',
  data: {productCode: $('#select-download-2').val()},
  type: 'post',
  dataType : 'json',
  success: function(response){
    if (response == 0) {
      html = "<div class='alert alert-warning text-center'><strong>Información: </strong> No hay descargas disponibles para este producto aún.</div>";
      $('#div-downloads').html(html);
    }else{
     html = "<ul class='list-group'>";
     for(var i in response){
       html += "<li class='list-group-item'><a href='"+ downloadServer + response[i].url +"' target='_blank'>"+response[i].descripcion+"</a><span class='badge label-danger back-red'>PDF</span></li>";
     }
     html += "</ul>";
     $('#div-downloads').html(html);
    }
  }
});
}
