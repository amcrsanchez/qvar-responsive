<?php 
	include '../classes/seller.class.php';
	include '../../mail/phpmailer/class.phpmailer.php';
	$seller = new Seller;
	$seller->setName($_POST['sellerName']);

	$html = "
          <div style='font-family:sans-serif; font-size:.95em'>
          <img src='http://www.qvarvenezuela.com/images/logo.png' alt='' />
          <h3>Bienvenido Estimado(a) ".$seller->name.", usted ha usado el servicio de recuperación de contraseña en www.qvarvenezuela.com</h3>
          <p>
            Con esta contraseña tendrá la posibilidad de entrar en nuestra area de pedidos en línea.
            en donde podrá hacer pedidos, y en un futuro múcho mas.
          </p>
          <p>
            Su contraseña: <b>".$seller->pass."</b>
          </p>
          <p>
            <i>Con Qvar CA, tú pones la confianza, nosotros la cálidad.</i>
          </p>
          <a href='www.qvarvenezuela.com/pedidos'>Aplicación de Pedidos en Línea</a>
          <em>www.qvarvenezuela.com</em>
        </div>
        ";

        $mail = new PHPMailer();

		$mail->IsSMTP();
		$mail->Host = "host.caracashosting55.com";
		$mail->SMTPAuth = true;
		$mail->Username = 'contacto@qvarvenezuela.com';
		$mail->Password = 'abc123-*/';

		$mail->CharSet = 'UTF-8';
		$mail->SetFrom("contacto@qvarvenezuela.com","Mensaje de www.qvarvenezuela.com");
		$mail->AddReplyTo("no-responder@qvarvenezuela.com","No Responder a este correo");
		$mail->AddAddress($seller->email,"Estimado ".$seller->name);
		$mail->Subject = "Mensaje de recuperacion de contraseña de www.qvarvenezuela.com";
		$mail->MsgHTML($html);



		if ($mail->Send()) {
		  echo 1;
		}else{
		  echo 0;
		}

 ?>