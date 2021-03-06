<?php
require 'classes/producto.class.php';
$producto = new Product;
$producto->productList(3,null);
?>
<div class="container h-100">
  <div class="jumbotron">
   <img class="img img-responsive center-block" src="images/logo.png" alt="logo-qvar">
    <center><h1 class="font-OSCB color-red">Torres<span class="font-OSCI  color-black"> de Enfriamiento</span></h1>
    <p class="text-muted font-OSCI">
      Productos para torres de enfriamiento EXRO, especializados en: control de crecimiento de algas y microorganismos,
      control de depositos de incrustaciones, evitar y controlar la corrosion en sistemas
      de recirculacion de agua de enfriamiento, tanques y piscinas.
    </p></center>
  </div>

  <div class="row">
    <?php while($item = $producto->productList->fetch_assoc()): ?>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="thumbnail">
            <div class="caption">
            <div class="producto">
              <center>
                  <h1 class="font-OSCB color-red"><?php echo explode(" ",$item['nombre'])[0]; ?>
                    <span class="font-OSCI  color-black"><?php echo explode(" ",$item['nombre'])[1]; ?></span>
                  </h1>
                  <p class="">
                    <?php echo utf8_encode($item['descripcion_corta']); ?>
                  </p>

              </center>
            </div>
        <button type="button" name="button" class="btn btn-danger btn-block" onclick="productDetails('<?php echo $item['codigo']; ?>')"
        data-toggle="modal" data-target="#myModal">Ver detalles del <?php echo $item['nombre']; ?> </button>
        </div>
        </div>
      </div>

    <?php endwhile; ?>
  </div>
  <div id="push">

  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <div class="col-lg-3"><img class="img img-responsive modal-header-logo" src="images/logo.png" alt="logo-qvar"></div>
          <div class="col-lg-6 text-center"><br><h3 class="modal-title font-OSCB  color-black left" id="modal-codigo">Modal title</h3></div>
          <div class="col-lg-3"></div>
      </div>
      <h4 class="text-center font-OSCI  color-red">Descripción</h4>
      <div class="modal-body text-justify" id="modal-body">

      </div>
      <div class="modal-body">
        <h4 class="text-center font-OSCI  color-red">Propiedades Físico Químicas</h4>
        <table id="modal-propiedades" class="table table-condensed"></table>

        <h4 class="text-center font-OSCI  color-red">Distribución</h4>
        <table id="modal-distribucion" class="table">

        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!-- MODAL -->

<script src="js/productDetails.js"></script>
