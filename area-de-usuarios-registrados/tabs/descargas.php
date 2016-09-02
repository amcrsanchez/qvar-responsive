<?php
  include '../classes/producto.class.php';
  $product = new Product;
  $productClass = $product->productClass();
 ?>
<div class="featurette-divider"></div>
<div class="col-xs-0 col-md-2"></div>
<div class="col-xs-12 col-md-8">
  <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div id="msg-ajax">
      <strong>Descargas</strong> <p>Acá podra descargar en formato PDF las Hojas de Seguridad y los Boletines Técnicos.
        Empiece seleccionando la linea del producto.</p>
    </div>
  </div>
<div class="form-group">

  <select class="form-control" id="clasificacion-producto" onchange="loadDownloadOptions(this);">
    <option value="">Seleccione la linea del producto</option>
    <?php while($rowClass = $productClass->fetch_assoc()) :?>
      <option value="<?php echo $rowClass['id'] ?>"><?php echo $rowClass['clasificacion'] ?></option>
    <?php endwhile; ?>
  </select>
</div>
<div id="div-select-download-1" class="form-group hidden">
  <label for="select-download-1"></label>
  <select class="form-control" id="select-download-1" onchange="loadDownloadOptions(this);">

  </select>
</div>
<div id="div-select-download-2" class="form-group hidden">
  <label for="select-download-2"></label>
  <select class="form-control" id="select-download-2" onchange="loadDownloadOptions(this);">
  </select>
</div>
<div class="form-group tool-tip" id="product-description" hidden="hidden">
<div class="arrow-up"></div><div class="arrow-up-2"></div>
<div class="contenido text-center"></div>
</div>

<div class="form-group">
  <input type="button" class="btn btn-block btn-danger" id="btn-buscar-descargas" disabled="disabled" value="Buscar" onclick="searchDownloads()">
</div>
<div id="div-downloads">

</div>
</div>
<div class="col-xs-0 col-md-2"></div>
<script type="text/javascript" src="../js/downloads.js"></script>
