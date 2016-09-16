<?php
require 'classes/producto.class.php';
$producto = new Product;

$producto->autoClasses();
?>
<div class="container h-100">
  <div class="jumbotron">
    <center><h1 class="font-OSCB color-red">Linea<span class="font-OSCI  color-black"> Automotríz</span></h1>
    <p class="text-muted font-OSCI">
      Shampoo para carros, desengrasantes, limpiaparabrisas, refrigerantes para motor (anticorrosivos y elevadores del punto de ebullicion),
      para todo tipo de vehiculos. Todo para la refrigeracion de motores de Gasolina, Diesel o Gasoil, con inhibidores de corrosion e incrustacion.
    </p></center>
  </div>
  <?php while($row_class = $producto->autoClasses->fetch_assoc()): ?>
  <?php $producto->productList(5,$row_class['id']); ?>
  <h1 class="font-OSCI titulo-class-auto"><?php echo $row_class['clasificacion_automotriz'] ?></h1>
    <div class="row">
      <?php while($item = $producto->productList->fetch_assoc()): ?>

          <div class=" col-sm-6 col-md-6 col-lg-4">
            <div class="thumbnail">

                <div class="caption">
                  <div class="producto-automotriz">
                    <h1 class="font-OSCB color-red text-center"><?php echo explode(" ",$item['nombre'])[0]; ?><span class="font-OSCI  color-black"><?php echo explode(" ",$item['nombre'])[1]; ?></span>
                    </h1>
                    <center>
                        <img data-toggle="modal" data-target="#myModalImg" class="img-automotriz"  onclick="zoomImage(this);" width="" src="<?php echo $item['imagen']; ?>" alt="<?php echo $item['imagen']; ?>">
                        <p class="">
                          <?php echo utf8_encode($item['descripcion_corta']); ?>
                        </p>
                  </center>
                  </div>
                  <button type="button" name="button" class="btn btn-danger btn-block" onclick="productDetails('<?php echo $item['codigo']; ?>')"
                  data-toggle="modal" data-target="#myModal">Ver detalles</button>
                </div>

            </div>
          </div>

      <?php endwhile; ?>
    </div>
  <?php endwhile; ?>

  <div id="push"></div>
</div>

<!-- MODAL -->
<!--modal de ver mas-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title font-OSCB  color-black" id="modal-codigo">Modal title</h3>
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

<!--modal de zoom de imagen-->
<div class="modal fade" id="myModalImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

        <div class="modal-body text-center" id="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <img id="img-modal" src="" alt="" />
        </div>

    </div>
  </div>
</div>

<!-- MODAL -->

<script src="js/productDetails.js"></script>
