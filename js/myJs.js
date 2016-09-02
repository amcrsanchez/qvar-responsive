function __(elemento){
  return document.getElementById(elemento);
}

function onlyNumbers(event){
  var code = event.charCode || event.keyCode;
  var character = String.fromCharCode(code);
  if (isNaN(character) && code != 8) {
    return false;
  }
}

function maximumLength(event, element, size){
  var code = event.charCode || event.keyCode;

  if(code == 8 || code == 9)
    return true;

  if(element.value.length > size)
    return false;

}

//recibe un string y calcula la cantidad de caracteres que posee y valida si cumple con el minimo y el maximo
function strLengthValidation(string, min, max){
  if (string.length >= min && string.length <= max) {
    return true
  }else {
    return false
  }
}
function validEmail(email){
  patt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+/;
  return patt.test(email);
}

function cleanForm(form){

  var inputs = __(form).getElementsByTagName("input");

  for (var i = 0; i < inputs.length; i++) {
    if(inputs[i].type != "button" && inputs[i].type != "submit")
    inputs[i].value = "";
  }


}

function cleanAjaxResponse(parent){
  var ajaxResponseDiv = __(parent).getElementsByClassName("ajax-response");
  if (ajaxResponseDiv.length > 0) {
    for (var i in ajaxResponseDiv) {
      ajaxResponseDiv[i].innerHTML = "";
    }
  }
}
