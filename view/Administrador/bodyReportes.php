<?php

include '../../model/conexion.php';
include '../../model/TipoPersonal.php';
include '../../model/TipoPersonalConsulta.php';
include '../../model/TipoTituloProfesional.php';
include '../../model/TipoTituloProfesionalConsulta.php';
include '../../model/Carrera.php';
include '../../model/CarreraConsulta.php';
include '../../model/Facultad.php';
include '../../model/FacultadConsulta.php';
include '../../controller/TipoPersonalControlador.php';
include '../../controller/TipoTituloProfesionalControlador.php';
include '../../controller/FacultadControlador.php';

$conexion = new Conexion();

$tipoPersonal = new TipoPersonalControlador($conexion);
$listaTipoPersonal = $tipoPersonal->listar();

$tipoTituloProfesional = new TipoTituloProfesionalControlador($conexion);
$listaTipoTituloProfesional = $tipoTituloProfesional->listar();

$faultadCarrera = new FacultadControlador($conexion);
$listaFacultadCarrera = $faultadCarrera->listar();

?>
<div class="container" id="contenidoAll">
  <div class="row  border-bottom white-bg dashboard-header">
      <div class="col-sm-12 text-center">
          <h2><strong>REPORTES</strong></h2>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content forum-post-container">  <!-- HASTA AQUI LA BASE DE FORMULARIO -->
          <div class="pull-right">
            <a id="closeCanvas" class="btn btn-danger"><i class="fa fa-times"></i></a>
          </div>
          <div class="pull-left">
            <a id="linkReportCanvas" class="btn btn-success btn-sm">Save <i class="fa fa-file-image-o"></i></a>
          </div>
          <br>
          <div class="row" id="tableReprtes">
            <div class="col-xs-12 col-sm-12 col-md-12">

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h2 class="panel-title"><strong>Los campos <span style="color:red">(*)</span> no son obligatorios</strong></h2>
                  <div class="pull-right">
                    <span class="clickable filter btn btn-info efec" data-toggle="tooltip" title="Click aqui para buscar un Reporte" data-container="body">
                      <i class="fa fa-search"></i>
                    </span>
                  </div><br><br>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="desk">
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Reporte</th>
                          <th class="text-center">Parametro 1<i style="color:red">*</i> </th>
                          <th class="text-center">Parametro 2<i style="color:red">*</i> </th>
                          <th class="text-center">Parametro 3<i style="color:red">*</i> </th>
                          <th class="text-center">Generar </th>
                        </tr>
                     </thead>
                    </table>
                  </div>

                </div>
                <div class="panel-body" style="display:none">
                  <input type="text" class="form-control"  id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Reporte" />
                </div>
                <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                  <table class="table table-hover" id="dev-table" >
                    <tbody class="text-center">

                      <tr>
                        <form id="reportePersonalListado">
                          <td>1</td>
                          <td>Lista de Personal</td>
                          <td>
                              <select class="selectpicker form-control show-tick " data-container="body" id="tipoPersonalReporte" name="tipoPersonal" data-width="100px"  title="Tipo de Personal" >
                                <option value="0" selected>Todos</option>
                              <?php foreach ($listaTipoPersonal as $listaTP): ?>
                                <option value="<?php echo $listaTP->IdTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </td>
                          <td><input type="text" class="datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Inicio" name="fechaInicio" ></td>
                          <td><input type="text" class="datepicker" data-date-format="yyyy/mm/dd" placeholder="Fecha de Fin" name="fechaFin" ></td>
                          <td><button type="submit" name="button" data-toggle="modal" data-target="#respuestaReporte" class="btn btn-primary">Generar</button></td>
                        </form>
                      </tr>

                      <tr>
                        <form id="reportePersonalCantidad">
                          <td>2</td>
                          <td>Cantidad Personal Docente </td>
                          <td>
                            <select class="selectpicker form-control show-tick" data-width="100px" name="tipoTituloProfesional" id="tipoTituloProfesionalReporte" data-container="body">
                              <option value="0">Todos</option>
                              <?php foreach ($listaTipoTituloProfesional as $listaTipoTP): ?>
                                <option value="<?php echo $listaTipoTP->IdTipoTituloProfesional; ?>"><?php echo $listaTipoTP->NombreTipoTitulo; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </td>
                          <td>
                            <select class="selectpicker form-control show-tick" data-width="100px" name="sexo" id="sexoReporte" title="Sexo" data-container="body">
                              <option value="0" selected>Ambos</option>
                              <option value="M">Masculino</option>
                              <option value="F">Femenino</option>
                            </select>
                          </td>
                          <td>

                          </td>
                          <td><button type="submit" id="reporteGrapBoton" name="button" class="btn btn-primary">Generar</button></td>
                        </form>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>

          <div id="resultadoCanvas" >
            <canvas id="graficoCanvas" style="width: 100%; height: auto;">

            </canvas>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="respuestaReporte">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center">Reporte</h3>
      </div>
      <div class="modal-body">
        <div id="reporteGenerado">
          <div class="text-center">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            <span class="sr-only">Cargando...</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
      </div>
    </div>
  </div>
</div>
