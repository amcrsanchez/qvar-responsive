<?php
	$page_active;
	$base = basename($_SERVER['REQUEST_URI']);
	switch ($base) {
		case '':
			$page_active = "inicio";
			break;

		case 'nosotros.php';
			$page_active = "nosotros";
			break;

/* LO QUE TENGA QUE VER CON PRODUCTOS*/
				case 'productos.php';
					$page_active = "productos";
					break;
				case 'productos.php?tipo=polimeros-para-tratamiento-de-agua';
					$page_active = "productos";
					break;
				case 'productos.php?tipo=linea-automotriz';
					$page_active = "productos";
					break;
				case 'productos.php?tipo=limpiadores-y-desengrasantes';
					$page_active = "productos";
					break;
				case 'productos.php?tipo=productos-para-calderas';
					$page_active = "productos";
					break;
				case 'productos.php?tipo=productos-para-torres-de-enfriamiento';
					$page_active = "productos";
				break;
/* LO QUE TENGA QUE VER CON PRODUCTOS*/

		case 'servicios.php';
			$page_active = "servicios";
			break;
		case 'contacto.php';
			$page_active = "contacto";
			break;
		default:
			$page_active = "inicio";
			break;
	}


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fábrica de productos químicos, automotriz y tratamiento de aguas, refrigerantes de motor, jabón para carros, limpiaparabrisas. Certificada ISO, conocidos en toda Venezuela, Refritaxi, Refrigerante Universal, Ford, Mitsubishi, Toyota, Fiat. Ubicación: Zona Industrial San Vicente II Aragua
	">
	<title>Fabrica de Refrigerante Automotriz en Aragua | QVAR C.A.</title>
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">


</head>
<body>
	<!--include modals-->
	<?php
	include 'include/modals/modal-registro-usuario.php';
	include 'include/modals/modal-inicio-sesion.html';
	 ?>
		<!--NAVIGATION-->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-qvar">
						<span class="sr-only ">Desplegar / Ocultar</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo qvar" class="img-responsive"></a>
				</div>
				<!--INICIA MENU-->
				<div class="collapse navbar-collapse" id="navigation-qvar">
					<ul class="nav navbar-nav navbar-right">
						<li class="<?php echo $page_active=="inicio" ? "active" : "";?>"><a href="index.php">Inicio</a></li>
						<li class="<?php echo $page_active=="nosotros" ? "active" : "";?>"><a href="nosotros.php">Nosotros</a></li>
						<li class="dropdown  <?php echo $page_active=="productos" ? "active" : "";?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Productos <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class=""><a href="productos.php?tipo=limpiadores-y-desengrasantes">Limpiadores y Desengrasantes</a></li>
								<li class="divider"></li>
								<li class=""><a href="productos.php?tipo=polimeros-para-tratamiento-de-agua">Polimeros para Tratamiento de Agua</a></li>
								<li class="divider"></li>
								<li class=""><a href="productos.php?tipo=productos-para-torres-de-enfriamiento">Productos para Torres de Enfriamiento</a></li>
								<li class="divider"></li>
								<li class=""><a href="productos.php?tipo=productos-para-calderas">Productos para Calderas</a></li>
								<li class="divider"></li>
								<li class=""><a href="productos.php?tipo=linea-automotriz">Línea Automotriz</a></li>
							</ul>
						</li>
						<li class="<?php echo $page_active=="servicios" ? "active" : "";?>"><a href="servicios.php">Servicios</a></li>
						<li class="<?php echo $page_active=="contacto" ? "active" : "";?>"><a href="contacto.php">Contacto</a></li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-user"></i><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="" data-toggle="modal" data-target="#modal-registro-usuario" onclick="cleanForm('form-registro'), cleanAjaxResponse('form-registro')">Registro de usuario</a></li>
								<li class="divider"></li>
								<li><a href="" data-toggle="modal" data-target="#modal-inicio-sesion" onclick="cleanForm('form-inicio-sesion'), cleanAjaxResponse('form-inicio-sesion')">Iniciar Sesión</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!--END NAVIGATION-->
