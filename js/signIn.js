function iniciarSesion(){
  var emptyField = false;
  var invalidField = false;
  var data = {};
  var msg = "";
  var warning = "";
  var success = "";

  var requiredElements = $("#form-inicio-sesion .required");

  //empty elements validation
  for (var i = 0; i < requiredElements.length; i++) {
    if (requiredElements[i].value.trim() == "")
      emptyField = true;
      if(emptyField)
        msg = " Llene todos los campos "
  }

  if(!validEmail(__("email-login").value) && !emptyField){
    invalidField = true;
    msg = " Email con formato invalido ";
  }

  if (!(strLengthValidation(__("pass-login").value,6,10)) && !emptyField) {
    invalidField = true;
    msg = " la contraseña debe tener de 6 a 10 caracteres";
  }


  if (!emptyField && !invalidField) {
    $("#form-inicio-sesion #_AJAX_").html("");
    var formElements = $("#form-inicio-sesion .form-control");
      for (var i = 0; i < formElements.length; i++) {
        data[formElements[i].id] = formElements[i].value;
      }
      $("#modal-inicio-sesion .loader").removeAttr("hidden");
      $("#modal-inicio-sesion .form-control").css("border-color","#DDD");
      $("#modal-inicio-sesion .form-control").css("color","#DDD");
      $("#modal-inicio-sesion #img-loader").attr("src","images/loader.gif");
      $("#modal-inicio-sesion #btn-sign-in").attr("disabled","disabled");
      $("#modal-inicio-sesion #form-inicio-sesion").css("color","#BBB");
      $.ajax({
        url: "php-ajax/signIn.php",
        type: "POST",
        cache: false,
        data: data,
        success: function(response){

          if (response != 1) {
            warning = '<div class="alert alert-dismissible alert-warning">'
            warning +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
            warning +='<h4>Advertencia</h4>'
            warning +='<p>Verifica la información suministrada, <a href="#" class="alert-link">'+ response +'</a>.</p></div>';
          $("#form-inicio-sesion #_AJAX_").html(warning);
        }else if(response == 1){
            success = '<div class="alert alert-dismissible alert-success">'
            success +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
            success +='<h4>Inicio Exitoso</h4>'
            success +='<p>En 5 segundos será redireccionado</p></div>';
            $("#form-inicio-sesion #_AJAX_").html(success);
            window.setTimeout(function(){
              window.location.href = "area-de-usuarios-registrados/index.php";
            },5000)
            cleanForm("form-inicio-sesion");

          }
        },
        error: function(){

        },
        complete: function(){
          $("#modal-inicio-sesion .form-control").css("border-color","#CCC");
          $("#modal-inicio-sesion .form-control").css("color","#555");
          $("#modal-inicio-sesion .loader").attr("hidden","hidden");
          $("#modal-inicio-sesion #img-loader").attr("src","");
          $("#modal-inicio-sesion #btn-sign-in").removeAttr("disabled");
          $("#modal-inicio-sesion #form-inicio-sesion").css("color","#000");

        }


      });
  }else{
        warning = '<div class="alert alert-dismissible alert-warning">'
        warning +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
        warning +='<h4>Advertencia</h4>'
        warning +='<p>Verifica la información suministrada,<a href="#" class="alert-link">'+ msg +'</a>.</p></div>';
      $("#form-inicio-sesion #_AJAX_").html(warning);
  }

}

function forgotPassword(){
  if(__("email-login").value.trim()==""){
    msg = '<div class="alert alert-dismissible alert-warning">'
    msg +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
    msg +='<h4>Advertencia</h4>'
    msg +='<p>Verifica la información suministrada,<a href="#" class="alert-link"> Introduzca su Email</a>.</p></div>';
    $("#form-inicio-sesion #_AJAX_").html(msg);
  }else if(!validEmail(__("email-login").value)) {
    msg = '<div class="alert alert-dismissible alert-warning">'
    msg +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
    msg +='<h4>Advertencia</h4>'
    msg +='<p>Verifica la información suministrada,<a href="#" class="alert-link"> Email con Formato Inválido</a>.</p></div>';
    $("#form-inicio-sesion #_AJAX_").html(msg);
  }else{
    $.ajax({
      url: 'php-ajax/password-recovery.php',
      type: 'POST',
      data:{
        email: __("email-login").value
      },
      success(response){
        if(response == 0){
          msg = '<div class="alert alert-dismissible alert-warning">'
          msg +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
          msg +='<h4>Advertencia</h4>'
          msg +='<p>Verifica la información suministrada,<a href="#" class="alert-link"> El Email ingresado no está registrado en la Base de Datos</a>.</p></div>';
          $("#form-inicio-sesion #_AJAX_").html(msg);
        }else if(response == 1) {
          msg = '<div class="alert alert-dismissible alert-success">'
          msg +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
          msg +='<h4>Contraseña Enviada</h4>'
          msg +='<p>Solicitud Procesada,<a href="#" class="alert-link"> Se ha enviado la información solicitada a su correo.</a>.</p></div>';
          $("#form-inicio-sesion #_AJAX_").html(msg);
        }else{
          msg = '<div class="alert alert-dismissible alert-danger">'
          msg +='<button type="button" class="close" data-dismiss="alert">&times;</button>'
          msg +='<h4>Error</h4>'
          msg +='<p>Verifica la información suministrada,<a href="#" class="alert-link"> ha ocurrido un error, intente de nuevo mas tarde.</a>.</p></div>';
          $("#form-inicio-sesion #_AJAX_").html(msg);
        }
      }
    })
  }
}
