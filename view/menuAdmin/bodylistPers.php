<?php
include '../../model/conexion.php';
include '../../model/Persona.php';
include '../../model/Personal.php';
include '../../model/PersonalConsulta.php';
include '../../controller/PersonalControlador.php';

$conexion = new Conexion();

$personalManejador = new PersonalControlador($conexion);
$listaPersonal = $personalManejador->listar();

$i = 1;

?>
<div class="container" id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Personal-UAB </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Lista </span> /<span class="text-muted">Personal</span></h4>
                </div>
                <br><br>
                <div class="">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h2 class="panel-title">Acciones Posibles</h2>
                          <div class="pull-right">
                            <a href="index?modo=regPersonal" data-toggle="modal" class="btn btn-success efec"><i class="fa fa-plus" title="Añadir un nuevo Personal" data-toggle="tooltip"></i></a>
                            <span class="clickable filter btn btn-info efec" data-toggle="tooltip" title="Click aqui para buscar un Personal" data-container="body">
                              <i class="fa fa-search"></i>
                            </span>
                          </div><br><br>
                          <div class="table-responsive">
                            <table class="table">
                              <thead class="desk">
                                <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-center">Nombre Completo</th>
                                  <th class="text-center">CI</th>
                                  <th class="text-center">Sexo</th>
                                  <th class="text-center">Ver</th>
                                  <th class="text-center">Editar</th>
                                </tr>
                              </thead>
                            </table>
                          </div>

                        </div>
                        <div class="panel-body" style="display:none">
                          <input type="text" class="form-control"  id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Personal" />
                        </div>
                        <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                          <table class="table table-hover" id="dev-table" >
                            <tbody class="text-center">

                              <?php foreach ($listaPersonal as $personal): ?>
                                <tr>
                                  <td><?php echo $i ?></td>
                                  <td><?php echo "{$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre} {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno}"; ?></td>
                                  <td class="text-left"><?php echo $personal->IdPersona->CI ?></td>
                                  <td class="text-left"><?php echo $personal->IdPersona->Sexo ?></td>
                                  <td>
                                    <form class="detallePersonalVER">
                                      <input type="hidden" name="datos" value="1">
                                      <input type="hidden" name="ciPersonalDetalle" class="ci"  value="<?php echo $personal->IdPersona->CI ?>">
                                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modalView"><i class="fa fa-eye"></i></button>
                                    </form>
                                  </td>
                                  <td><a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                              <?php $i++; endforeach; ?>

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


<div class="modal fade" id="modalView"  aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Personal-UAB</h3>
      </div>
      <div class="modal-body">
        <div class="contenidoDetalleVER">

        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-left">
          <a class="btn btn-danger btn-sm exportarFormularioPDFVER">Exportar PDF <i class="fa fa-file-pdf-o"></i></a>
          <a class="btn btn-success btn-sm exportarFormularioEXCELVER">Exportar EXCEL <i class="fa fa-file-excel-o"></i></a>
          <a class="btn btn-primary btn-sm exportarFormularioWORDVER">Exportar WORD <i class="fa fa-file-word-o"></i></a>
        </div>
        <div class="pull-right">
          <a href="index.php?modo=listaPersonal" class="btn btn-success btn-lg">LISTO <i class="fa fa-check"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
