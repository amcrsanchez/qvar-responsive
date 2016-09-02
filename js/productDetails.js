function productDetails(prodCode){
  $.ajax({
    // la URL para la petición
    url : 'php-ajax/product-details.php',

    // la información a enviar
    // (también es posible utilizar una cadena de datos)
    data : { prodCode : prodCode },

    // especifica si será una petición POST o GET
    type : 'GET',

    // el tipo de información que se espera de respuesta
    dataType : 'json',

    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
      console.log(json);
      __("modal-codigo").innerHTML = json.nombre;
      __("modal-body").innerHTML = json.descripcion_larga;
      __("modal-propiedades").innerHTML = "";
      $.each(json.Propiedades,function(key, value){
        __("modal-propiedades").innerHTML += "<tr><td class='font-OSCI'><b>"+key+"</b></td><td>"+value+"</td></tr>";
      })
      var strFilling = "";
      for(i in json.Presentaciones){
        (i == (json.Presentaciones.length-1))? strFilling += json.Presentaciones[i] : strFilling += json.Presentaciones[i] + ", ";
      }
      __("modal-distribucion").innerHTML = "<tr><td>"+strFilling+"</td></tr>";

    },

    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
        alert('Disculpe, existió un problema');
    },

    // código a ejecutar sin importar si la petición falló o no
    //complete : function(xhr, status) {
    //  alert('Petición realizada');
    //}
});
}

function zoomImage(elemento){
  __("img-modal").setAttribute("src",elemento.getAttribute("src"));
}
