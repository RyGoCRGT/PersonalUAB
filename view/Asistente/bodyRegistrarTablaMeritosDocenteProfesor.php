<?php

include '../../model/conexion.php';
include '../../model/TipoPersonal.php';
include '../../model/TipoPersonalConsulta.php';
include '../../controller/TipoPersonalControlador.php';

$conexion = new Conexion();

$tipoPersonal = new TipoPersonalControlador($conexion);
$listaTipoPersonal = $tipoPersonal->listar();

$fecha=date("Y/m/d");

?>

<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Tabla de Calificación de Méritos Docente </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Registro </span> /<span class="text-muted">Tabla de Méritos</span></h4>
                </div>

                <div>
                    <div class="panel with-nav-tabs panel-info">
                        <div class="panel-heading" style="background:rgb(26, 74, 101)">
                            <ul class="nav nav-tabs" >
                                <li id="TablaMeritosDocenteLI"><a style="color:white" href="#HojaVida" data-toggle="tab">Tabla de Calificación de Méritos</a></li>
                            </ul>
                        </div>

                        <div class="panel-body" style="display: block;">
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="registrarMerito">
                                <div class="thumbnail">
                                    <div class="text-center">
                                      <h3>Registro de Tabla de Calificación de Méritos</h3>
                                    </div>
                                    <form id="frmRegistrarNuevaTablaMerito" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="col-sm-1 col-md-2"></div>

                                        <div class="col-sm-10 col-md-8">

                                          <div class="form-group">
                                            <label>Fecha de Creacion</label>
                                            <div class="input-group" >
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                              <input id="fechaCreacion" type="text" class="form-control datepicker"  data-date-format="yyyy/mm/dd" aria-describedby="sizing-addon2" name="fechaCreacion" readonly="true" value = <?php echo $fecha; ?> placeholder="Fecha de Creacion:  AAAA/MM/DD">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Version</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="version" type="text" class="form-control" placeholder="Version de la Tabla de Meritos: " aria-describedby="sizing-addon2" name="version" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Tipo Mérito</label>
                                            <div class="input-group" >
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-tumblr-square"></i></span>
                                              <select class="selectpicker form-control" name="tipoMerito" id="tipoMerito">
                                                <?php foreach ($listaTipoPersonal as $listaTP): ?>
                                                  <option value="<?php echo $listaTP->NombreTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>

                                        <div class="form-group" data-toggle="buttons">
                                            <label class="btn btn-danger"> <i class="fa fa-dot-circle-o"></i> Estado Inicial: </label>
                                            <label class="btn btn-info btn-outline activo">
                                                <input type="radio" class="" name="activo" value="1" checked><i class="">  Activo</i>
                                            </label>
                                            <label class="btn btn-info btn-outline activo">
                                                <input type="radio" class="" name="activo" value="0"><i class="">  Inactivo</i>
                                            </label>
                                         </div>
                                         <div class="exportarArchivo">
                                            <input type="file" name="archivo" class="exportarArchivoFile" required />
                                         </div>
                                         <div class="nameFileImg"></div>

                                         <input type="hidden" name="datos" value="1">
                                         <div id="mesajePersona"></div>
                                         <div class="pull-right">
                                           <button type="submit" name="guardarTablaMerito" id="guardartablaMerito" class="btn btn-primary">Grabar</button>
                                         </div>
                                         <br><br>

                                         <div class="col-sm-1 col-md-2"></div>
                                      </div>
                                    </form>
                                </div><!-- end  <div class="thumbnail">-- >
                              </div> <!--<div class="tab-pane fade in active" id="General">-->
                          </div><!--END <div class="tab-content">-->
                        </div><!-- END <div class="panel-body" style="display: block;">-->
                    </div> <!--<div class="panel with-nav-tabs panel-info">-->
                </div>
    </div>
</div>

</div>


<div class="modal fade" id="contenidoTablaMeritosModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Tabla de Meritos</h3>
      </div>
      <div class="modal-body">
        <div class="contenidoTablaMeritos" id="contenidoTablaMeritos">
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
          <span class="sr-only">Cargando...</span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <a href="index.php?modo=NuevaTablaMeritos" class="btn btn-success btn-lg">LISTO <i class="fa fa-check"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
