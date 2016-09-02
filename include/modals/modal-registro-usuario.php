<div class="modal fade" id="modal-registro-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de Usuario</h4>
      </div>
      <div class="loader-container">
      <div class="loader" hidden="hidden">
          <img src="" alt=""  id="img-loader"/>
      </div>
      <div class="modal-body">

        <div class="form-horizontal" role="form" id="form-registro">
          <div id="_AJAX_" class="ajax-response"></div>
          <div class="form-group">
            <label for="ci-rif" class="col-sm-4 control-label">Cédula / RIF</label>
              <div class="col-sm-2">
                <select class="form-control" id="prefijo-rif">
                  <option value="V">V</option>
                  <option value="J">J</option>
                  <option value="G">G</option>
                  <option value="E">E</option>
                </select>
              </div>
            <div class="col-sm-6">
              <input type="number" class="form-control required" id="ci-rif" placeholder="Sin guiones" onkeypress="return onlyNumbers(event)" onkeydown="return maximumLength(event,this,8)">
            </div>
          </div>
          <div class="form-group">
            <label for="nombre-razon" class="col-sm-4 control-label">Nombre / Razón Social:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control required" id="nombre-razon" placeholder="Nombre o Razón Social">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-4 control-label">Email:</label>
            <div class="col-sm-8">
              <input class="form-control required" type="email" id="email" placeholder="Introduzca su E-mail">
            </div>
          </div>
          <div class="form-group">
            <label for="pass1" class="col-sm-4 control-label">Contraseña:</label>
            <div class="col-sm-8">
              <input class="form-control required" type="password" id="pass1" placeholder="Mínimo 6 caracteres">
            </div>
          </div>
          <div class="form-group">
            <label for="pass2" class="col-sm-4 control-label">Confirme contraseña:</label>
            <div class="col-sm-8">
              <input class="form-control required" type="password" id="pass2" placeholder="Mínimo 6 caracteres">
            </div>
          </div>
          <div class="featurette-divider"></div>
          <input class="btn btn-danger btn-default btn-block" type="submit" id="btn-sign-up" onclick="registrarme()" value="Registrarme">
        </div>

      </div>
      </div><!--loader-container-->

    </div>
  </div>
</div>
<script src="js/signUp.js"></script>
