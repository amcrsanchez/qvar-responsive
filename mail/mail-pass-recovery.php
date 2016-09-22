<?php
$razon = $userData['razon_social'];
$email = $userData['email'];
$pass = $userData['pass'];
$html = "
          <div style='font-family:sans-serif; font-size:.95em'>
          <img src='http://www.qvarvenezuela.com/images/logo.png' alt='' />
          <h3>Bienvenido Estimado(a) $razon, usted ha usado el servicio de recuperación de contraseña en www.qvarvenezuela.com</h3>
          <p>
            Con este registro tendrá la posibilidad de entrar en nuestra area de usuarios registrados,
            en donde podrá hacer pedidos, descargar información técnica de los productos y múcho mas.
          </p>
          <p>
            Su usuario para el acceso es: <b>$email</b>, y su contraseña: <b>$pass</b>
          </p>
          <p>
            <i>Con Qvar CA, tú pones la confianza, nosotros la cálidad.</i>
          </p>
          <a href='www.qvarvenezuela.com/usuarios'>Area de usuarios registrados</a>
          <em>www.qvarvenezuela.com</em>
        </div>
        ";

include 'phpmailer/class.phpmailer.php';
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "host.caracashosting55.com";
$mail->SMTPAuth = true;
$mail->Username = 'contacto@qvarvenezuela.com';
$mail->Password = 'abc123-*/';

$mail->CharSet = 'UTF-8';
$mail->SetFrom("contacto@qvarvenezuela.com","Mensaje de www.qvarvenezuela.com");
$mail->AddReplyTo("no-responder@qvarvenezuela.com","No Responder a este correo");
$mail->AddAddress($email,"Estimado ".$razon);
$mail->Subject = "Mensaje de recuperacion de contraseña de www.qvarvenezuela.com";
$mail->MsgHTML($html);



if ($mail->Send()) {
  //echo "se envio";
}else{
  //echo var_dump($mailQvar->ErrorInfo);
}


?>
