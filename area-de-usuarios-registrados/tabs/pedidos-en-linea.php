<?php
include '../classes/producto.class.php';
$product = new Product;
$product->productList(null,null);
//var_dump($_SESSION['userData']);
if (is_null($_SESSION['userData']['direccion']) || is_null($_SESSION['userData']['telefono']) || ($_SESSION['userData']['direccion']) == '') :
?>
<div class="featurette-divider"></div>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <div id="msg-ajax">
    <strong>¡Aviso Importante!</strong> <p>Debe completar todos los datos de su registro en la ficha "Mis Datos" antes de poder realizar un pedido en linea.</p>
  </div>
</div>
<?php
return false;
endif;
?>
<div class="featurette-divider"></div>
<div class="container">


<div class="col-xs-12"> <!--div1-->


    <div class="row form" role="form" id="form-pedido-cliente">
    <div id="_AJAX_" class="ajax-response">
      <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div id="msg-ajax">
          <strong>¡Aviso Importante!</strong> <p>La solicitud realizada mediante este formulario de pedido llegará directamente a su vendedor,
          quién despues de verificar la disponibilidad del producto se estará comunicando con usted para informarle los precios de venta.</p>
          <p>Se procederá a realizar la facturación correspondiente, <b>unicamente despues de que el vendedor se haya comunicado con usted y haya confirmado su pedido.</b></p>
        </div>
      </div>
    </div>

    <div class="row loader-container">
      <div class="loader hidden">
          <img src="../images/loader.gif" alt=""  id="img-loader"/>
      </div>

    <div class="form-group col-lg-4 col-md-6 col-sm-6">
      <label for="producto">1 - Selecciona el producto</label>
      <select class="form-control required" id="producto" onchange="loadFiling(this);">
          <option value="">Seleccione</option>
          <?php while($productRow = $product->productList->fetch_assoc()): ?>
            <option value="<?php echo $productRow['codigo']; ?>"><?php echo $productRow['nombre']; ?></option>
          <?php endwhile; ?>
      </select>
    </div>
    <div class="form-group col-lg-3 col-md-6 col-sm-6">
      <label for="presentacion">2 - Escoge la presentación</label>
      <select class="form-control required" id="presentacion">
          <option value="">Seleccione</option>
      </select>
    </div>
    <div class="form-group col-lg-3 col-md-6 col-sm-6">
      <label for="cantidad">3 - Indicanos la cantidad</label>
      <input class="form-control required" type="text" id="cantidad" onkeypress="return onlyNumbers(event);" placeholder="en unidades">
    </div>

    <div class="col-lg-2 col-md-6 col-sm-6">
      <label>4 - Añadelo a la lista</label>
      <button class="btn btn-success btn-block" onclick="addToList()">Añadir a la lista</button>
    </div>
    <div class="featurette-divider"></div>
    <div class="col-xs-12 col-md-12 order-container well">
      <table class="table table-striped" id="order-table">
        <tr class="info">
          <th>Cod</th><th>Producto</th><th>Presentación</th><th>Cantidad</th><th>Acciones</th>
        </tr>
      </table>
    <div id="no-items" class="text-center"><h4 class="text-muted">No hay items</h4></div>


    </div>
    <div class="col-md-12 text-right">
      <input class="btn btn-primary btn-block hidden" id="enviar" type="button" name="name" value="Enviar mi pedido" onclick="sendOrder()">
    </div>
    </div> <!-- .loader-container -->
    <div class="featurette-divider"></div>

    </div> <!-- #form-pedido-cliente -->



</div> <!--div1-->

</div>
<script src="../js/productOrder.js" type="text/javascript"></script>
