<?php

if(!empty($_POST['antiSpam']))
  return false;

$fechaHora = strip_tags(htmlspecialchars($_POST['fechaHora']));
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$city = strip_tags(htmlspecialchars($_POST['city']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
require 'phpmailer/class.phpmailer.php';
//CUERPO DEL MENSAJE PARA QVAR
$htmlQvar = "
          <table border=1 style='width:50%; border:1px solid gray; border-collapse:collapse; font-family:Helvetica; font-size: .95em;' cellpadding=5>
            <tr>
              <th width=15% style='text-align:left;'>Usuario:</th>
              <td>$name</td>
            </tr>
            <tr>
              <th width=15% style='text-align:left;'>Email:</th>
              <td>$email_address</td>
            </tr>
            <tr>
              <th width=15% style='text-align:left;'>Telefono:</th>
              <td>$phone</td>
            </tr>
            <tr>
              <th width=15% style='text-align:left;'>Ciudad:</th>
              <td>$city</td>
            </tr>
            <tr>
              <th width=15% style='text-align:left;'>Fecha y Hora:</th>
              <td>$fechaHora</td>
            </tr>
            <tr>
              <th width=15% style='text-align:left;'>Mensaje:</th>
              <td>$message</td>
            </tr>
          </table>
        ";
//CUERPO DEL MENSAJE AUTOMATICO DE RESPUESTA AL USUARIO
$htmlUsuario =  "
                <div style='width:50%; font-family:Helvetica; font-size: .95em; text-align:justify; border:2px solid #000; padding:20px; border-radius:8px;'>
                  <p>Estimado Usuario: <em>$name</em>, hemos recibido su mensaje de manera satisfactoria, gracias por comunicarse con nosotros,
                  en el transcurso del dia estaremos comunicandonos con usted y gustosamente atenderemos su solicitud, le agradecemos no responder a este correo.</p>
                  <br>
                  <p><i>con QVAR, tu pones la confianza, nostros la calidad</i></p>
                  <p>www.qvarvenezuela.com</p>
                  <img src='http://www.qvarvenezuela.com/imags/logo.png'>
                </div>
                ";


$mailQvar = new PHPMailer();
$mailResponse = new PHPMailer();

$mailQvar->IsSMTP();
$mailQvar->Host = "host.caracashosting55.com";
$mailQvar->SMTPAuth = true;
$mailQvar->Username = 'contacto@qvarvenezuela.com';
$mailQvar->Password = 'abc123-*/';


$mailResponse->IsSMTP();
$mailResponse->Host = "host.caracashosting55.com";
$mailResponse->SMTPAuth = true;
$mailResponse->Username = 'contacto@qvarvenezuela.com';
$mailResponse->Password = 'abc123-*/';

$mailQvar->SetFrom("contacto@qvarvenezuela.com","Mensaje de www.qvarvenezuela.com");
$mailResponse->SetFrom("contacto@qvarvenezuela.com","Mensaje de www.qvarvenezuela.com");

$mailQvar->AddReplyTo("no-responder@qvarvenezuela.com","No Responder a este correo");
$mailResponse->AddReplyTo("no-responder@qvarvenezuela.com", "No Responder a este correo");

$mailQvar->AddAddress("informatica.qvarca@gmail.com","Departamento de Sistemas de QVAR CA");
$mailResponse->AddAddress($email_address,"Respuesta de www.qvarvenezuela.com");

$mailQvar->Subject = "Nuevo mensaje de usuario de www.qvarvenezuela.com";
$mailResponse->Subject = "Nuevo mensaje de www.qvarvenezuela.com";

$mailQvar->MsgHTML($htmlQvar);
$mailResponse->MsgHTML($htmlUsuario);

if ($mailQvar->Send()) {
    $mailResponse->Send();
    echo 1;
}else{
  echo 0;
}




?>
