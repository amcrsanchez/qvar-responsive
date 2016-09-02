<?php include '../classes/sellers.php';
  $seller = new Seller;
  $sellerList = $seller->sellerList();

?>
<div class="featurette-divider"></div>
<div class="col-xs-0 col-md-2"></div>
  <div class="col-xs-12 col-md-8">
    <div class="loader-container">
      <div class="loader" hidden="hidden">
          <img src="" alt=""  id="img-loader"/>
      </div>
      <div class="form-horizontal" role="form" id="form-mis-datos">
        <div id="_AJAX_" class="ajax-response"></div>
          <div class="form-group">
            <label class="col-sm-3" for="rif">Cédula ó Rif:</label>
            <div class="col-sm-9"><input class="form-control required" type="text" id="rif" value="<?php echo $_SESSION['userData']['rif']; ?>" ></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="email">Email:</label>
            <div class="col-sm-9"><input class="form-control required" type="text" id="email" value="<?php echo $_SESSION['userData']['email']; ?>" ></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="razon-social">Nombre ó Razón Social:</label>
            <div class="col-sm-9"><input class="form-control required" type="text" id="razon-social" value="<?php echo $_SESSION['userData']['razon_social']; ?>" ></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="pass">Contraseña:</label>
            <div class="col-sm-9"><input class="form-control required" type="text" id="pass" value="<?php echo $_SESSION['userData']['pass']; ?>" ></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="direccion">Dirección:</label>
            <div class="col-sm-9"><textarea class="form-control required" id="direccion" rows="3"><?php echo $_SESSION['userData']['direccion']; ?></textarea></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="telefono">Telefono:</label>
            <div class="col-sm-9"><input class="form-control required" type="text" id="telefono" value="<?php echo $_SESSION['userData']['telefono']; ?>" onkeypress="return onlyNumbers(event)" ></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for="slct_vendedor">Vendedor:</label>
            <div class="col-sm-5">
              <select class="form-control" id="slct_vendedor" onchange="cambiarVendedor(this);">
                  <option value="">Seleccione</option>
                <?php while($row = $sellerList->fetch_assoc()) : ?>
                  <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="col-sm-4">
              <input class="form-control required" readonly="readonly" type="text" id="vendedor" value="<?php echo $_SESSION['userData']['vendedor']; ?>">
            </div>
          </div>
          <input class="btn btn-danger btn-block" type="button" id="btn-actualizar" value="Actualizar Datos" onclick="updateUserData()">
      </div>
    </div>
  </div>
<div class="col-xs-0 col-md-2"></div>
<script type="text/javascript" src="../js/updateUserData.js"></script>
<script type="text/javascript">
  function cambiarVendedor(element){
    __("vendedor").value = element.value;
  }
</script>
