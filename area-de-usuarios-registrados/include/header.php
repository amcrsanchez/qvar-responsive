<?php
  session_start();
  if(!(isset($_SESSION['userData']))){
    header("location: ../index.php");
  }
  $tab = "";
  if (isset($_GET['tab'])) {
    $tab = $_GET['tab'];
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="Fabrica de productos quimicos, automotriz y tratamiento de aguas, refrigerantes de motor, jabon para carros, limpiaparabrisas. Certificada ISO, conocidos en toda Venezuela, Refritaxi, Refrigerante Universal, Ford, Mitsubishi, Toyota, Fiat. Ubicacion: Zona Industrial San Vicente II Aragua
  	">
    <title>QVAR | Usuarios Registrados</title>
    <link rel="shortcut icon" href="../images/favicon.ico">
  	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="../css/mycss.css">
  	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
  </head>

  <div class="container">
    <div class="row text-center alert alert-info">
      <div class="col-xs-12">
        <img class="img" width="60" src="../images/logo.png" alt="logo qvar" />
      </div>
      <div class="col-xs-12">
          <br>
          <h4>Area de Usuarios Registrados</h4>
      </div>
    </div>

    <ul class="nav nav-tabs">
      <li role="presentation" class="<?php echo ($tab=='mis-datos' || $tab=='') ? 'active' : ''; ?>"><a href="?tab=mis-datos">Mis Datos</a></li>
      <li role="presentation" class="<?php echo ($tab=='pedidos-en-linea') ? 'active' : ''; ?>"><a href="?tab=pedidos-en-linea">Pedidos En Línea</a></li>
      <li role="presentation" class="<?php echo ($tab=='descargas') ? 'active' : ''; ?>"><a href="?tab=descargas">Descargas</a></li>
      <li role="presentation" class="<?php echo ($tab=='salir') ? 'active' : ''; ?>"><a href="?tab=salir">Salir</a></li>

    </ul>
  </div>

  <body>
