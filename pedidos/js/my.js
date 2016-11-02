
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

function onlyNumbers(event){

  var code = event.charCode || event.keyCode;
  //console.log(code);
  var character = String.fromCharCode(code);
  if (isNaN(character) && code != 8 && code != 46) {
    return false;
  }
}