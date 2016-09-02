<?php
$htmlUser = "
          <div style='font-family:sans-serif; font-size:.95em'>
          <img src='http://www.qvarvenezuela.com/images/logo.png' alt='' />
          <h3>Binvenido Estimado(a) $razon, gracias por registrarse en www.qvarvenezuela.com</h3>
          <p>
            Con este registro tendrá la posibilidad de entrar en nuestra area de usuarios registrados,
            en donde podrá hacer pedidos, descargar información técnica de los productos y múcho mas.
          </p>
          <p>
            Su usuario para el acceso es: <b>$email</b>, y su contraseña: <b>$pass</b>
          </p>
          <h4>Los datos de su registro son:</h4>
          <table border=1 cellpadding=8 style='border: 1px solid black; border-collapse:collapse; font-size:.95em'>
            <tr>
              <th>
                Cédula o RIF
              </th>
              <td>
                $rif
              </td>
            </tr>
            <tr>
              <th>
                Nombre o Razón Social
              </th>
              <td>
                $razon
              </td>
            </tr>
            <tr>
              <th>
                Email
              </th>
              <td>
                $email
              </td>
            </tr>
            <tr>
              <th>
                Contraseña
              </th>
              <td>
                $pass
              </td>
            </tr>
          </table>
          <p>
            <i>Con Qvar CA, tú pones la confianza, nosotros la cálidad.</i>
          </p>
          <a href='www.qvarvenezuela.com/usuarios'>Area de usuarios registrados</a>
          <em>www.qvarvenezuela.com</em>
        </div>
        ";

$htmlAdm ="
          <div style='font-family:sans-serif; font-size:.95em'>
          <img src='http://www.qvarvenezuela.com/imagenes/logo.png' alt='' />
          <h3>Se ha registrado un nuevo usuario en www.qvarvenezuela.com</h3>
          <p>
            Su usuario para el acceso es: <b>$email</b>, y su contraseña: <b>$pass</b>
          </p>
          <h4>Los datos del registro son:</h4>
          <table border=1 cellpadding=8 style='border: 1px solid black; border-collapse:collapse; font-size:.95em'>
            <tr>
              <th>
                Cédula o RIF
              </th>
              <td>
                $rif
              </td>
            </tr>
            <tr>
              <th>
                Nombre o Razón Social
              </th>
              <td>
                $razon
              </td>
            </tr>
            <tr>
              <th>
                Email
              </th>
              <td>
                $email
              </td>
            </tr>
            <tr>
              <th>
                Contraseña
              </th>
              <td>
                $pass
              </td>
            </tr>
          </table>
          <p>
            <i>Con Qvar CA, tú pones la confianza, nosotros la cálidad.</i>
          </p>
          <a href='www.qvarvenezuela.com/usuarios'>Area de usuarios registrados</a>
          <em>www.qvarvenezuela.com</em>
        </div>
        ";



include 'phpmailer/class.phpmailer.php';

$mailQvar = new PHPMailer();
$mailResponse = new PHPMailer();

$mailQvar->CharSet = 'UTF-8';
$mailResponse->CharSet = 'UTF-8';

$mailQvar->SetFrom("contacto@qvarvenezuela.com","Mensaje de www.qvarvenezuela.com");
$mailResponse->SetFrom("contacto@qvarvenezuela.com","Mensaje de www.qvarvenezuela.com");

$mailQvar->AddReplyTo("no-responder@qvarvenezuela.com","No Responder a este correo");
$mailResponse->AddReplyTo("no-responder@qvarvenezuela.com", "No Responder a este correo");

$mailQvar->AddAddress("informatica.qvarca@gmail.com","Departamento de Sistemas de QVAR CA");
$mailResponse->AddAddress($email,"Respuesta de www.qvarvenezuela.com");

$mailQvar->Subject = "Nuevo mensaje de usuario de www.qvarvenezuela.com";
$mailResponse->Subject = "Nuevo mensaje de www.qvarvenezuela.com";

$mailQvar->MsgHTML($htmlAdm);
$mailResponse->MsgHTML($htmlUser);


if ($mailQvar->Send()) {
    $mailResponse->Send();
}else{
  //echo var_dump($mailQvar->ErrorInfo);
}



?>
