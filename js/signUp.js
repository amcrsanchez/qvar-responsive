function registrarme(){
  var emptyField = false;
  var invalidField = false;
  var data = {};
  var msg = "";
  var warning = "";
  var success = "";

  var requiredElements = $("#form-registro .required");

  //empty elements validation
  for (var i = 0; i < requiredElements.length; i++) {
    if (requiredElements[i].value.trim() == "")
      emptyField = true;
      if(emptyField)
        msg = " Llene todos los campos "
  }

  if(!validEmail(__("email").value) && !emptyField){
    invalidField = true;
    msg = " Email con formato invalido ";
  }


  if(!(__("pass1").value === __("pass2").value) && !emptyField){
    invalidField = true;
    msg = " Contraseñas no coinciden ";
  }

  if (!(strLengthValidation(__("pass1").value,6,10)) && !emptyField) {
    invalidField = true;
    msg = " la contraseña debe tener de 6 a 10 caracteres";
  }

  if (!(strLengthValidation(__("pass2").value,6,10)) && !emptyField) {
    invalidField = true;
    msg = " la contraseña debe tener de 6 a 10 caracteres";
  }

  if (!(strLengthValidation(__("ci-rif").value,6,10)) && !emptyField) {
    invalidField = true;
    msg = " El campo de rif o cedula debe tener entre 6 y 10 numeros";
  }



  if (!emptyField && !invalidField) {
    $("#form-registro #_AJAX_").html("");
    var formElements = $("#form-registro .form-control");
      for (var i = 0; i < formElements.length; i++) {
        data[formElements[i].id] = formElements[i].value;
      }
      $(".loader").removeAttr("hidden");
      $(".form-control").css("border-color","#DDD");
      $(".form-control").css("color","#DDD");
      $("#img-loader").attr("src","images/loader.gif");
      $("#btn-sign-up").attr("disabled","disabled");
      $("#form-registro").css("color","#BBB");
      $.ajax({
        url: "php-ajax/signUp.php",
        type: "POST",
        cache: false,
        data: data,
        success: function(response){

          if (response != 1) {
            warning = '<div class="alert alert-dismissible alert-warning">'
            warning +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
            warning +='<h4>Advertencia</h4>'
            warning +='<p>Verifica la información suministrada, <a href="#" class="alert-link">'+ response +'</a>.</p></div>';
          $("#form-registro #_AJAX_").html(warning);
        }else if(response == 1){
            success = '<div class="alert alert-dismissible alert-success">'
            success +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
            success +='<h4>Registro Exitoso</h4>'
            success +='<p>En 5 segundos será redireccionado</p></div>';
            $("#form-registro #_AJAX_").html(success);
            window.setTimeout(function(){
              window.location.href = "area-de-usuarios-registrados/index.php";
            },5000)
            cleanForm("form-registro");

          }
        },
        error: function(){

        },
        complete: function(){
          $(".form-control").css("border-color","#CCC");
          $(".form-control").css("color","#555");
          $(".loader").attr("hidden","hidden");
          $("#img-loader").attr("src","");
          $("#btn-sign-up").removeAttr("disabled");
          $("#form-registro").css("color","#000");

        }


      });
  }else{
        warning = '<div class="alert alert-dismissible alert-warning">'
        warning +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
        warning +='<h4>Advertencia</h4>'
        warning +='<p>Verifica la información suministrada,<a href="#" class="alert-link">'+ msg +'</a>.</p></div>';
      $("#form-registro #_AJAX_").html(warning);
  }










}
