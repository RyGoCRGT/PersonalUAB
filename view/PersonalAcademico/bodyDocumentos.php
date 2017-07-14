<?php

include '../../model/TipoArchivo.php';
include '../../model/TipoArchivoConsulta.php';
include '../../model/Archivo.php';
include '../../model/ArchivoConsulta.php';
include '../../controller/ArchivoControlador.php';
include '../../controller/TipoArchivoControlador.php';
$conexion = new Conexion();
$tipoArchivoManejador = new TipoArchivoControlador($conexion);
$listaTipoArchivo = $tipoArchivoManejador->listar();

$archivoManejador = new ArchivoControlador($conexion);
$listaArchivos = $archivoManejador->listar();
?>
<div class="container" id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Documentos-UAB </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Lista </span> /<span class="text-muted">Documentos</span></h4>
                </div>
                <br><br>
                <div class="">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <div class="pull-right">

                            <span class="clickable filter btn btn-info efec" data-toggle="tooltip" title="Click aqui para buscar un Documento" data-container="body">
                              <i class="fa fa-search"></i>
                            </span>
                          </div><br><br>
                          <div class="table-responsive">
                            <table class="table">
                              <thead class="desk">
                                <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-center">Nombre Archivo</th>
                                  <th class="text-center">Tipo de Archivo</th>
                                  <th class="text-center">Ver</th>
                                </tr>
                              </thead>
                            </table>
                          </div>

                        </div>
                        <div class="panel-body" style="display:none">
                          <input type="text" class="form-control"  id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Documento" />
                        </div>
                        <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                          <table class="table table-hover" id="dev-table" >
                            <tbody class="text-center" id="tableRespuestaDocumento">

                            <?php $i = 0; foreach ($listaArchivos as $key => $value):  $i++;?>
                              <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $value->NombreArchivo ?></td>
                                <td><?php echo $value->C_TipoArchivo ?></td>
                                <td>
                                  <form class="frmDataArchiv">
                                    <input type="hidden" name="id" value="<?php echo $value->IdArchivo ?>">
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#verArchivo" name="button"><i class="fa fa-eye"></i></button>
                                  </form>
                                </td>
                              </tr>
                            <?php endforeach; ?>

                            </tbody>
                          </table>
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

<div class="modal fade" id="modalArchivo">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="documentoAdd">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Documento</h3>
        </div>
        <div class="modal-body">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Datos Documento</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>Nombre Archivo</label>
                <div class="input-group">
                  <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-file-pdf-o"></i></span>
                  <input type="text" class="form-control " name="nombreArchivo" required>
                </div>
              </div>
              <div class="form-group">
                <label>Tipo de Archivo</label>
                <div class="input-group">
                  <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
                  <select class="selectpicker form-control show-tick" name="tipoArchivo" title="Tipo de Archivo" required>
                  <?php foreach ($listaTipoArchivo as $key => $item): ?>
                    <option value="<?php echo $item->IdTipoArchivo ?>"><?php echo $item->NombreTipoArchivo ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label>Documento ( *pdf ) Maximo 1.5 Mb</label>
                <div class="input-group exportarArchivo">
                  <input type="file" class="form-control exportarArchivoFile" accept="application/pdf" name="documento" required>
                </div>
                <div class="nameFileImg"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger " data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default ">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success ">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="verArchivo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center">Documento</h3>
      </div>

      <div class="modal-body" id="respuestaVistaDocumento">

      </div>

      <div class="modal-footer">
        <div class="pull-right">
          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
        </div>
      </div>

    </div>
  </div>
</div>
