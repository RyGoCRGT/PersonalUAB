<?php
include '../../model/conexion.php';
include '../../model/EstadoCivil.php';
include '../../model/EstadoCivilConsulta.php';
include '../../model/LugarExpedicion.php';
include '../../model/LugarExpedicionConsulta.php';
include '../../model/TipoUsuario.php';
include '../../model/TipoUsuarioConsulta.php';
include '../../controller/CtrEstadoCivil.php';
include '../../controller/TipoUsuarioControlador.php';
include '../../controller/CtrLugarExpedicion.php';
$conexion = new Conexion();

$estadoCivil = new CtrEstadoCivil($conexion);
$listaEstadoCivil = $estadoCivil->listar();

$lugarExpedicion = new CtrLugarExpedicion($conexion);
$listaLugarExpedicion = $lugarExpedicion->listar();

$tipoUsuario = new TipoUsuarioControlador($conexion);
$listaTipoUsuario = $tipoUsuario->listar();

?>
<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Usuario-UAB </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Registro </span> /<span class="text-muted">Usuario</span></h4>
                </div>
                <div>


                    <div class="panel with-nav-tabs panel-info">
                      <div class="panel-heading" style="background:rgb(26, 74, 101)">
                        <ul class="nav nav-tabs" >
                            <li class="active"class="efe"><a style="color:white" href="#Personal" data-toggle="tab" >Datos Personales</a></li>
                            <li class="efe"><a style="color:white" href="#Usuario" data-toggle="tab">Datos Usuario</a></li>
                        </ul>
                      </div>
                      <div class="panel-body" style="display: block;">
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="Personal">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Registro de Persona</h3>
                                  </div>
                                    <form id="frmPersona">

                                      <div class="row">

                                        <div class="col-sm-1 col-md-2"></div>
                                        <div class="col-sm-10 col-md-8">

                                          <div class="form-group">
                                            <label>Primer Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="primerNombre" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Segundo Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="segundoNombre" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoPaterno" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoMaterno" type="text" class="form-control" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>CI/NIT</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="ciNit" type="text" class="form-control" placeholder="CI/NIT: " aria-describedby="sizing-addon2" name="ciNit" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Lugar de Expedicion CI/NIT</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-address-card"></i></span>
                                              <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion" title="Seleccione Lugar de Expedicion CI">
                                                <?php foreach ($listaLugarExpedicion as $listaLE): ?>
                                                  <option value="<?php echo $listaLE->IdLugarExpedicion; ?>"><?php echo $listaLE->NombreLugarExpedicion; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Fecha de Nacimiento</label>
                                            <div class="input-group" >
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                              <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" required>
                                            </div>
                                          </div>

                                          <div class="form-group" data-toggle="buttons">
                                            <label class="btn btn-primary"> <i class="fa fa-venus-mars"></i> Sexo: </label>
                                            <label class="btn btn-info btn-outline">
                                                <input type="radio" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
                                            </label>
                                            <label class="btn btn-info btn-outline">
                                                <input type="radio" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
                                            </label>
                                         </div>

                                         <div class="form-group">
                                           <label>Estado Civil</label>
                                           <div class="input-group">
                                             <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                             <select class="selectpicker form-control" name="estadoCivil" id="estadoCivil" title="Seleccionar Estado Civil">
                                               <?php foreach ($listaEstadoCivil as $listaEC): ?>
                                                 <option value="<?php echo $listaEC->IdEstadoCivil; ?>"><?php echo $listaEC->NombreEstadoCivil; ?></option>
                                               <?php endforeach; ?>
                                             </select>
                                           </div>
                                         </div>

                                         <div class="form-group">
                                           <label>Telefono</label>
                                           <div class="input-group">
                                             <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                             <input id="telefono" type="text" class="form-control" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefono">
                                           </div>
                                         </div>

                                         <input type="hidden" name="datos" value="1">

                                         <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                         <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Limpiar</button>
                                         <button type="submit" name="guardar" class="btn btn-success btn-lg">Siguiente</button>

                                         <br><br>

                                        </div>
                                        <div class="col-sm-1 col-md-2"></div>

                                      </div>

                                    </form>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="Usuario">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Usuario</h3>
                                  </div>
                                  <form id="frmUsuario">

                                    <div class="row">
                                      <div class="col-sm-1 col-md-2"></div>
                                      <div class="col-sm-10 col-md-8">

                                        <div class="form-group">
                                          <label>Tipo Usuario</label>
                                          <div class="input-group selector">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="selectpicker form-control" name="tipoPersonal" id="tipoPersonal">
                                              <?php foreach ($listaTipoUsuario as $listaTU): ?>
                                                <option value="<?php echo $listaTU->IdTipoUsuario; ?>"><?php echo $listaTU->NombreTipoUsuario; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="form-control" name="tipoPersonal" id="tipoPersonal">
                                              <?php foreach ($listaTipoUsuario as $listaTU): ?>
                                                <option value="<?php echo $listaTU->IdTipoUsuario; ?>"><?php echo $listaTU->NombreTipoUsuario; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Nombre de Usuario</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                            <input id="primerNombre" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Contraseña</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                                            <input id="segundoNombre" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                                          </div>
                                        </div>

                                        <input type="hidden" name="datos" value="1">

                                        <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                        <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Editar</button>
                                        <button type="submit" name="guardar" class="btn btn-success btn-lg">Listo</button>

                                        <br><br>

                                      </div>
                                      <div class="col-sm-1 col-md-2"></div>
                                    </div>

                                  </form>

                                </div>
                              </div>

                          </div>
                      </div>
                  </div>


                </div>

            </div>
        </div>
    </div>
</div>

</div>
