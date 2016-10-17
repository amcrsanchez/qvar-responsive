<?php
include 'include/header.php';
?>


		<div class="container myContainer">
		<img id="afiche" src="images/afiche.jpg" class="img img-responsive" alt="">
		<img id="afiche-movil" src="images/afiche-movil.jpg" class="img img-responsive" alt="">
		</div>
		<div class="container myContainer">
		<!--START CAROUSEL-->

			<div id="carousel-example-generic" class="carousel slide"  data-ride="carousel" onmouseover="activeIconAnimation()">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<a href="nosotros.php"><img src="images/carousel-calidad.jpg" alt="calidad qvar"></a>
								<div class="carousel-caption">
									...
								</div>
							</div>
							<div class="item">
								<a href="productos.php"><img src="images/carousel-productos.jpg" alt="productos qvar"></a>
								<div class="carousel-caption">
									...
								</div>
							</div>
							<div class="item">
								<a href="contacto.php"><img src="images/carousel-atencion.jpg" alt="atecion qvar"></a>
								<div class="carousel-caption">
									...
								</div>
							</div>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
			</div>
		<!--END CAROUSEL-->
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-4">

			</div>
		</div>

		<hr class="featurette-divider">
		<div class="row menu-wrapper">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
				<div class="service-box">
					<a href="productos.php"><i class="fa fa-reorder fa-3x"></i></a>
					<h3>Productos</h3>
					<p class="">Productos refrigerantes de motor, limpiaparabrisas, productos químicos para tratamientos de calderas y sistemas de enfriamiento.</p>

				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
				<div class="service-box">
					<a href="servicios.php"><i class="fa fa-flask fa-3x"></i></a>
					<h3>Servicios</h3>
					<p class="">Tratamientos químicos, Osmosis Inversa Tratamiento químico preventivo de aguas industriales, Químicos para procesos industriales</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
				<div class="service-box">
					<a href="contacto.php"><i class="fa fa-bullhorn fa-3x"></i></a>
					<h3>Contactenos</h3>
					<p class="">Formulario de contacto, telefonos, y mapa de nuestra ubicación, les aseguramos que lo atenderemos a la brevedad posible.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
				<div class="service-box">
					<a data-toggle="modal" data-target="#modal-inicio-sesion"><i class="fa fa-sign-in fa-3x"></i></a>
					<h3>Usuarios Registrados</h3>
					<p class="">Disfrute de los privilegios de ser un usuario QVAR, descargue hojas de seguridad y especificaciones tecnicas en PDF.</p>
				</div>
			</div>
		</div>


	</div>
	<script type="text/javascript">
	function activeIconAnimation(){
	  iconAnimation();
	}

	function iconAnimation(){
	window.setTimeout(function(){
	  document.getElementsByClassName('fa')[1].style.transition = 'ease 0.3s';
	  document.getElementsByClassName('fa')[1].style.transform = 'rotateY(360deg)';
	},100);
	window.setTimeout(function(){
	  document.getElementsByClassName('fa')[2].style.transition = 'ease 0.3s';
	  document.getElementsByClassName('fa')[2].style.transform = 'rotateY(360deg)';
	},400);
	window.setTimeout(function(){
	  document.getElementsByClassName('fa')[3].style.transition = 'ease 0.3s';
	  document.getElementsByClassName('fa')[3].style.transform = 'rotateY(360deg)';
	},700);
	window.setTimeout(function(){
	  document.getElementsByClassName('fa')[4].style.transition = 'ease 0.3s';
	  document.getElementsByClassName('fa')[4].style.transform = 'rotateY(360deg)';
	},1000);
	}


	</script>
<?php
 include 'include/footer.php';
?>
