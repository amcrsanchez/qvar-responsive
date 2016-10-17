<?php
  include 'include/header.php';
?>
<div class="container">
  <div class="jumbotron">
   <img class="img img-responsive center-block" src="images/logo.png" alt="logo-qvar">
    <center><h1 class="font-OSCB color-red">Comunícate<span class="font-OSCI  color-black"> con Nosotros</span></h1>
    <p class="text-muted font-OSCI">
      A traves de nuestro formulario de contacto, numeros telefonicos o correos de atención; si prefieres un contacto mas personalizado
      dirigete directamente a nuestra empresa donde serás cordialmente atendido, en el mapa verás nuestra ubicación.
    </p></center>
  </div>

  <!--FORMULARIO DE CONTACTO-->

      <section id="contact">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">


                  </div>
                  <div class="col-xs-12 col-sm-offset-3 col-sm-2 col-md-offset-0 col-md-2 text-center">
                    <div class="service-box"><i class="fa fa-phone fa-3x"></i></div>
                  </div>
                  <div class="col-xs-12 col-sm-7 col-md-4">


                    <ul class="tel-correo">
                      <li><span class="font-OSCB">0243 - 5515647</span><span class="text-muted font-OSCI"> / Central</span></li>
                      <li><span class="font-OSCB">0243 - 5516127</span><span class="text-muted font-OSCI"> / Ventas</span></li>
                      <li><span class="font-OSCB">0243 - 5515229</span><span class="text-muted font-OSCI"> / Administración</span></li>
                      <li><span class="font-OSCB">0243 - 5515647</span><span class="text-muted font-OSCI"> / Compras</span></li>
                      <li><span class="font-OSCB">0243 - 5516326</span><span class="text-muted font-OSCI"> / FAX</span></li>
                    </ul>
                  </div>
                  <div class="col-xs-12 col-sm-offset-3 col-sm-2 col-md-offset-0 col-md-2 text-center">
                    <div class="service-box"><i class="fa fa-envelope fa-3x"></i></div>
                  </div>
                  <div class="col-xs-12 col-sm-7 col-md-4">


                    <ul class="tel-correo">
                      <li><span class="font-OSCB">ventas.qvarca@gmail.com</span></li>
                      <li><span class="font-OSCB">cotizaciones.qvarca@gmail.com</span></li>
                      <li><span class="font-OSCB">admitradores.qvarca@gmail.com</span></li>
                      <li><span class="font-OSCB">informatica.qvarca@gmail.com</span></li>
                      <li><span class="font-OSCB">rrhh.qvarca@gmail.com</span></li>
                    </ul>
                  </div>


                  </div>
                  <div class="featurette-divider">
                  <div class="featurette-divider">
                  <div class="col-lg-12 text-center">

                      <h3 class="section-subheading font-OSCI">ó escribenos un mensaje, nos estaremos comunicando contigo a la brevedad posible.</h3>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <form name="sentMessage" id="contactForm" novalidate>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Tu Nombre *" id="name" required data-validation-required-message="Por Favor, introduce tu nombre.">
                                      <p class="help-block text-danger"></p>
                                      <input type="text" id="last-name" name="last-name" value="" class="hidden">
                                  </div>
                                  <div class="form-group">
                                      <input type="email" class="form-control" placeholder="Tu Email *" id="emailContact" required data-validation-required-message="Por Favor, introduce tu email.">
                                      <p class="help-block text-danger"></p>
                                  </div>
                                  <div class="form-group">
                                      <input type="tel" class="form-control" placeholder="Tu Telefono *" id="phone" required data-validation-required-message="Por Favor, introduce tu telefono.">
                                      <p class="help-block text-danger"></p>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="city" class="form-control" placeholder="Ciudad de donde escribes *" id="city" required data-validation-required-message="Por Favor, introduce la ciudad.">
                                      <p class="help-block text-danger"></p>
                                  </div>
                                  <div class="form-group">
                                      <textarea class="form-control" placeholder="Tu Mensaje *" id="message" required data-validation-required-message="Por Favor, escribe tu mensaje."></textarea>
                                      <p class="help-block text-danger"></p>
                                  </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-lg-12 text-center">
                                  <div id="success"></div>
                                  <button type="submit" class="btn btn-xl btn-danger">Enviar Mensaje</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="featurette-divider"></div>
          </div>
      </section>



    <!--FIN DE FORMULARIO DE CONTACTO-->

    <div class="col-md-12 well">
      <center><h3 class="section-subheading font-OSCI">
        <b>DIRECCIÓN: </b>CALLE I CRUCE CON CALLE G, 1ERA ETAPA CONGLOMERADO
        INDUSTRIAL MANUEL OLIVARES BETANCOURT LOCAL 48 ZONA INDUST. SAN
        VICENTE II MARACAY ARAGUA
      </h3></center>
      <div class="google-maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.3964126928995!2d-67.62977901083393!3d10.229577519123156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaa4d2952f0040d3a!2sQ+VAR%2C+C.A.!5e0!3m2!1ses-419!2sve!4v1468511100559"
         frameborder="0" style="border:0"></iframe>
      </div>
    </div>




</div>
<!-- Contact Form JavaScript -->


<?php
  include 'include/footer.php';
?>
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
