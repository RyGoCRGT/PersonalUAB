<div class="modal fade" id="RegistroContacto<?php echo $listaDepCon->idDepartamentoContacto;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="index.php?modo=contactoInsertar" method="post">

        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <strong><h2 class="modal-title"><i class="fa fa-plus-square"></i> Crear Nuevo Contacto<i class="fa fa-arrow-right"><?php echo $listaDepCon->nombre ?></i></h2></strong>

        </div>
        <div class="modal-body">
          <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <h5>Datos Del Departamento</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="background: rgba(234, 237, 245, 0.69);">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <center>
                    <div class="">
                      <center><img class="img-responsive img-rounded" src="../libs/multimedia/img/design/avatar.png"></center>
                    </div>
                  </center>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><strong>Nombre: </strong></td>
                        <td><?php echo $listaDepCon->nombre ?></td>
                      </tr>
                      <tr>
                        <td><strong>Dirección: </strong></td>
                        <td><?php echo $listaDepCon->direccion ?></td>
                      </tr>
                      <tr>
                        <td><strong>E-mail: </strong></td>
                        <td><?php echo $listaDepCon->email ?></td>
                      </tr>
                      <tr>
                        <td><strong>Dirección Web: </strong></td>
                        <td><?php echo $listaDepCon->direccionWeb ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <form class="" action="index.html" method="post">
            <div class="well">
              <h4>Ingrese Datos del Contacto</h4>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Tipo Empleado</label>
                  <div class="input-group selector">
                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                    <select class="selectpicker form-control" name="tipoPersonal" id="tipoPersonal" title="Selecciona">
                      <?php foreach ($listaTipoPersonal as $listaTP): ?>
                        <option value="<?php echo $listaTP->IdTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="input-group selector-mobile">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                    <select class="form-control" name="tipoPersonal" id="tipoPersonal">
                      <option value="" disabled selected hidden>Selecciona Tipo de Personal</option>
                      <?php foreach ($listaTipoPersonal as $listaTP): ?>
                        <option value="<?php echo $listaTP->IdTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Responsabilidad</label>
                  <div class="input-group selector">
                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                    <select class="selectpicker form-control" name="tipoPersonal" id="tipoPersonal" title="Selecciona">
                      <?php foreach ($listaTipoPersonal as $listaTP): ?>
                        <option value="<?php echo $listaTP->IdTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="input-group selector-mobile">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                    <select class="form-control" name="tipoPersonal" id="tipoPersonal">
                      <option value="" disabled selected hidden>Selecciona Tipo de Personal</option>
                      <?php foreach ($listaTipoPersonal as $listaTP): ?>
                        <option value="<?php echo $listaTP->IdTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

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

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Apellido Casada</label>
                  <div class="input-group">
                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                    <input id="apellidoPaternoRef" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoRef" required>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Fecha de Nacimiento</label>
                  <div class="input-group" >
                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                    <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group" data-toggle="buttons">
              <label class="btn btn-danger"> <i class="fa fa-venus-mars"></i> Sexo: </label>
              <label class="btn btn-info btn-outline sexo">
                  <input type="radio" class="sexo" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
              </label>
              <label class="btn btn-info btn-outline sexo">
                  <input type="radio" class="sexo" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
              </label>
            </div>

            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6">
                 <div class="form-group">
                   <label>Interno</label>
                   <div class="input-group">
                     <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                     <input id="telefonoReferencia" type="text" class="form-control" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefonoReferencia">
                   </div>
                 </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6">
                 <div class="form-group">
                   <label>Voip</label>
                   <div class="input-group">
                     <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                     <input id="telefonoReferencia" type="text" class="form-control" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefonoReferencia">
                   </div>
                 </div>
               </div>
             </div>

            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6">
                 <div class="form-group">
                   <label>Correo Institucional</label>
                   <div class="input-group">
                     <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                     <input type="email" class="form-control" placeholder="E-mail: " aria-describedby="sizing-addon2" id="email" name="email" required>
                   </div>
                 </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6">
                 <div class="form-group">
                   <label>Correo Personal</label>
                   <div class="input-group">
                     <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                     <input type="email" class="form-control" placeholder="E-mail: " aria-describedby="sizing-addon2" id="email" name="email" required>
                   </div>
                 </div>
               </div>
             </div>

            <input type="hidden" name="datos" value="1">

          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar <i class="fa fa-times-circle"></i></button>
            <button type="reset" value="Reset" name="reset" class="btn btn-default">Limpiar <span class="fa fa-refresh"></span></button>
            <button type="submit" class="btn btn-success">Guardar <i class="fa fa-check-circle"></i></button>
          </div>

        </div>
          </form>

    </div>
  </div>
</div>
