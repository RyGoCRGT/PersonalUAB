<div class="modal fade" id="RegistroContacto">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="index.php?modo=contactoInsertar" method="post">

        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <strong><h2 class="modal-title"><i class="fa fa-plus-square"></i> CREAR NUEVO <i class="fa fa-arrow-right"></i> Contacto</h2></strong>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Primer Nombre</label>
                <div class="input-group">
                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                  <input id="primerNombreRef" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreRef" required>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Segundo Nombre</label>
                <div class="input-group">
                  <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                  <input id="segundoNombreRef" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreRef">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Apellido Paterno</label>
                <div class="input-group">
                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                  <input id="apellidoPaternoRef" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoRef" required>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label>Apellido Materno</label>
                <div class="input-group">
                  <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                  <input id="apellidoMaternoRef" type="text" class="form-control" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoRef">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Telefono</label>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
              <input id="telefonoReferencia" type="text" class="form-control" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefonoReferencia">
            </div>
          </div>

          <input type="hidden" name="datos" value="1">

        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar <i class="fa fa-times-circle"></i></button>
          <button type="reset" value="Reset" name="reset" class="btn btn-default">Limpiar <span class="fa fa-refresh"></span></button>
          <button type="submit" class="btn btn-success">Guardar <i class="fa fa-check-circle"></i></button>
        </div>

      </form>

    </div>
  </div>
</div>
