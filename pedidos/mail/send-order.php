<?php 
	session_start();
	// var_dump($_SESSION['seller']);
	// var_dump($_SESSION['client']);
	// var_dump($_SESSION['orderDetails']);
	// var_dump($_SESSION['aditionalInfo']);

	$seller = $_SESSION['seller'];
	$client = $_SESSION['client'];
	$orderDetails = $_SESSION['orderDetails'];
	$aditionalInfo = $_SESSION['aditionalInfo'];
	
	$htmlHead = "
				<meta charset='utf-8'>
				<div style='font-family: arial; font-size: .95em;'>
				<img src='http://www.qvarvenezuela.com/images/logo.png' width=100>
				<h3>Pedido en linea (".$aditionalInfo['date']." a las ".$aditionalInfo['hour'].")</h3>
				<h4>Vendedor: ".$seller['Name']."</h4>
				<h4>Cliente: ".$client['rif']." - ".$client['nombre']."</h4>

			";

	$htmlOrderTable = "
						<table border=1 cellpadding=7 style='border: solid 1px #777; border-collapse: collapse; font-size:0.9em'>
						<tr>
							<td>Producto</td><td>Presentación</td><td>Cantidad</td><td>Precio</td><td>Total</td>
						</tr>
					  ";

					 for ($i=0; $i < sizeof($orderDetails['Detalle']); $i++) { 
					 	$htmlOrderTable .= "<tr>";
					 		$htmlOrderTable .= "<td>".$orderDetails['Detalle'][$i]['Producto']."</td><td>".$orderDetails['Detalle'][$i]['Presentacion']."</td><td>".$orderDetails['Detalle'][$i]['Cantidad']."</td><td>".$orderDetails['Detalle'][$i]['Precio']."</td><td>".$orderDetails['Detalle'][$i]['Total']."</td>";
					 	$htmlOrderTable .= "</tr>";
					 }

	$htmlOrderTable .= "
						<tr>
							<td colspan='4'>Sub Total</td><td>".$orderDetails['SubTotal']."</td>
						</tr>
						<tr>
							<td colspan='4'>IVA</td><td>".$orderDetails['MontoIva']."</td>
						</tr>
						<tr>
							<td colspan='4'>Total</td><td>".$orderDetails['Total']."</td>
						</tr>
					  ";

	$htmlFoot = "
					<p><b>Forma de Pago:</b> ".$aditionalInfo['paymentWay']."</p>
					<p><b>Observaciones:</b> ".$aditionalInfo['observations']."</p>
					</div>
				";


	$htmlOrderTable .= "</table>";

	$html  = $htmlHead;
	$html .= $htmlOrderTable;
	$html .= $htmlFoot;

	include '../classes/seller.class.php';
	include '../../mail/phpmailer/class.phpmailer.php';

	$mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->Host = "host.caracashosting55.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'pedido@qvarvenezuela.com';
        $mail->Password = 'abc123-*/';

        $mail->CharSet = 'UTF-8';

        $mail->SetFrom("pedido@qvarvenezuela.com","Pedido de ". $client['nombre'] ." Vendedor: ". $seller['Name']); //whom sends the mail

        $mail->AddReplyTo("no-responder@qvarvenezuela.com","No Responder a este correo");//add response
        
        //send mails to

	        if ($seller['Name'] == 'Prueba') {
	        	$mail->AddAddress("informatica.qvarca@gmail.com","Pedido Online"); //send email to ICTD (information and comunication technologies department)
	        	if (sizeof($aditionalInfo['emails']) > 0) {
		        	for ($i=0; $i < sizeof($aditionalInfo['emails']) ; $i++) { 
		        		$mail->AddAddress($aditionalInfo['emails'][$i],"Pedido Online"); //send aditional emails
		        	}
		        }
	        }else{
	        	$mail->AddAddress($client['email'],"Estimado ".$client['nombre'].", estos son los datos de su pedido.");//send email to client
	        	$mail->AddAddress("informatica.qvarca@gmail.com","Pedido Online"); //send email to ICTD (information and comunication technologies department)
	        	$mail->AddAddress("cotizaciones.qvarca@gmail.com","Pedido Online"); //send email to Naivit
	        	$mail->AddAddress($seller['Email'],"Pedido Online"); //send email to Seller
	        	if (sizeof($aditionalInfo['emails']) > 0) {
		        	for ($i=0; $i < sizeof($aditionalInfo['emails']) ; $i++) { 
		        		$mail->AddAddress($aditionalInfo['emails'][$i],"Pedido Online"); //send aditional emails
		        	}
		        }
        }
        
        
        //send mails to
        
        $mail->Subject = "Pedido de ".   $client['nombre'] ." Vendedor: ". $seller['Name'];
        $mail->MsgHTML($html);


       
        if ($mail->Send()) {
          include '../include/insert-order.php';
          
        }else{
          //echo 1;
          //echo "Ha ocurrido un error, intente de nuevo mas tarde.";
          $error = $mail->ErrorInfo;
          header("Location: ../main.php?tab=error&error-details=".$error);

        }
 
 ?>

