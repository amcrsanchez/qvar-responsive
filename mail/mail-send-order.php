<?php
//llenado del detalle del pedido en table rows, se inserta la variable abajo en el $html
$orderDetail = "";

for ($i=0; $i < sizeof($jsonData) ; $i++) {
  $orderDetail .= "<tr><td>".$jsonData[$i]['producto']."</td><td>".$jsonData[$i]['presentacion']."</td><td>".$jsonData[$i]['cantidad']."</td></tr>";
}


$html = "
          <meta charset='utf-8'>
          <div style='font-family: arial;'>
            <h3>".$_SESSION['userData']['razon_social']." ha enviado un pedido desde www.qvarvenezuela.com</h3>
            <h4>La información del mismo se refleja a continuación</h4>

            <table border=1 cellpadding='5' style='border-collapse:collapse; width:100%;'>
              <tr>
                <th colspan=6>Datos del Cliente</th>
              </tr>
              <tr>
                <td>Nombre</td><td>Rif</td><td>Email</td><td>Dirección</td><td>Telefono</td><td>Fecha del Pedido</td>
              </tr>
              <tr>
                <td>".$_SESSION['userData']['razon_social']."</td><td>".$_SESSION['userData']['rif'].
                "</td><td>".$_SESSION['userData']['email']."</td><td>".$_SESSION['userData']['direccion'].
                "</td><td>".$_SESSION['userData']['telefono']."</td><td>".date("d/m/Y")."</td>
              </tr>
            </table>
            <br>
            <table border=1 cellpadding='5' style='border-collapse:collapse; width:100%;'>
              <tr>
                <th colspan=3>Datos del Pedido</th>
              </tr>
              <tr>
                <td>Producto</td><td>Presentación</td><td>Cantidad en unidades</td>
              </tr>".$orderDetail."

            </table>

          </div>

        ";

        include 'phpmailer/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->SetFrom("pedido@qvarvenezuela.com","Pedido de ". $_SESSION['userData']['razon_social'] ." de www.qvarvenezuela.com");
        $mail->AddReplyTo("no-responder@qvarvenezuela.com","No Responder a este correo");
        $mail->AddAddress($sellerEmail,"Estimado ".$sellerName);
        $mail->AddAddress("informatica.qvarca@gmail.com","Estimado ".$sellerName);
        $mail->Subject = "Ha recibido un mensaje de pedido del cliente ".  $_SESSION['userData']['razon_social'] ." desde www.qvarvenezuela.com";
        $mail->MsgHTML($html);


        foreach ($_SESSION['userData'] as $key => $value) {
          $$key = $value;
        }


        if ($mail->Send()) {
          include '../classes/order.class.php';
          $mainInfoArray = array('rif_user' => $rif,'fecha_hora' => 'NOW()' ,'realizado_por' => 'Usuario','subtotal' => 'NULL' , 'iva' => 'NULL' ,'total' => 'NULL' ,'act' => 1);
          $order = new Order;
          $order->insert($mainInfoArray, $jsonData);
          echo 1;
        }else{
          //echo 1;
          echo "Ha ocurrido un error, intente de nuevo mas tarde.";
          echo $mail->ErrorInfo;

        }

 ?>
