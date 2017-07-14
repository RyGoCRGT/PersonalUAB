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
$trash = 0;
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
                            <a class="btn btn-danger" data-toggle="modal" data-target="#listaEliminados" ><i class="fa fa-trash" title="Personal(es) Dado(s) de Baja" data-toggle="tooltip"></i></a>
                            <a href="index?modo=regPersonal" class="btn btn-success"><i class="fa fa-plus" title="Añadir un nuevo Personal" data-toggle="tooltip"></i></a>
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
                                  <th class="text-left">CI</th>
                                  <th class="text-left">Tipo Personal</th>
                                  <th class="text-right">Ver</th>
                                  <th class="text-center"> Mas Opciones</th>
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
                                <?php if ($personal->Estado == 1)
                                { ?>
                                  <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo "{$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre} {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno}"; ?></td>
                                    <td class="text-left"><?php echo $personal->IdPersona->CI ?></td>
                                    <td class="text-left"><?php echo $personal->IdTipoPersonal ?></td>
                                    <td class="text-left">
                                      <form class="detallePersonalVER">
                                        <input type="hidden" name="datos" value="1">
                                        <input type="hidden" name="ciPersonalDetalle" class="ci"  value="<?php echo $personal->IdPersona->CI ?>">
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modalView"><i class="fa fa-eye"></i></button>
                                      </form>
                                    </td>
                                    <td class="text-left">      <!--<a href="index.php?modo=evaluarMeritos" class="btn btn-gear"></a> -->
                                      <div class="btn-group pull-xs-right">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                          <li class="disabled"><a href="#">Opciones</a></li>
                                          <li role="separator" class="divider"></li>
                                          <li>
                                            <form class="evaluarPersonal" action="index.php?modo=evaluacionMeritos" method="post">
                                              <input type="hidden" name="datos" value="1">
                                              <input type="hidden" name="tipoPersonal" value="<?php echo $personal->IdTipoPersonal ?>">
                                              <input type="hidden" name="ciPersonalMeritos" class="ciMeritos"  value="<?php echo $personal->IdPersona->CI ?>">
                                              &nbsp;&nbsp;&nbsp;<button type="submit" class="dropdown-item btn btn-info"><i class="fa fa-check-square-o"></i>&nbsp;Evaluar Meritos</button>
                                            </form>
                                          </li>
                                          <br>
                                          <li>
                                            <form action="index.php?modo=editarPersonal" method="post">
                                              <input type="hidden" name="ciPersonal" value="<?php echo $personal->IdPersona->CI ?>">
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="dropdown-item btn btn-primary"><i class="fa fa-pencil"></i>&nbsp;Editar Datos</button>
                                            </form>
                                          </li>
                                          <br>
                                          <li>
                                            <form action="index.php?modo=verHojaDeVida" method="post">
                                              <input type="hidden" name="ciPersonal" value="<?php echo $personal->IdPersona->CI ?>">
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="dropdown-item btn btn-warning"><i class="fa fa-book"></i>&nbsp;Hoja de Vida</button>
                                            </form>
                                          </li>
                                          <br>
                                          <li>
                                            <form class="darDeBajaPersonal" action="index.php?modo=darDeBajaPersonal" method="post">
                                              <input type="hidden" name="ciPersonalDBAja" class="ciDBAja"  value="<?php echo $personal->IdPersona->CI ?>">
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="dropdown-item btn btn-success"><i class="fa fa-toggle-on"></i>&nbsp;Dar de Baja</button>
                                            </form>
                                          </li>
                                          <br>
                                        </ul>
                                      </div>
                                    </td>
                                  </tr>
                                <?php }
                                else {
                                  $trash++;
                                }?>
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
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
          <span class="sr-only">Cargando...</span>
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

<div class="modal fade" id="listaEliminados">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center">Lista de Personal(es) Dado(s) de Baja</h3>
      </div>
      <div class="modal-body">
        <?php if ($trash == 0): ?>
          <div class="text-center">
            <h1 style="color:red"><strong>No Existen Personas Inhabilitadas</strong></h1>
          </div>
        <?php else: ?>
          <div class="table-responsive panel panel-danger">
            <table class="table table-hover panel panel-danger">
              <thead class="panel-heading">
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Nombre Completo</th>
                  <th class="text-left">CI</th>
                  <th class="text-left">Tipo Personal</th>
                  <th class="text-right">Habilitar</th>
                </tr>
              </thead>
              <tbody class="panel-body">
                  <?php $i = 1; foreach ($listaPersonal as $personal): ?>
                    <?php if ($personal->Estado == 0): ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo "{$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre} {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno}"; ?></td>
                        <td class="text-left"><?php echo $personal->IdPersona->CI ?></td>
                        <td class="text-left"><?php echo $personal->IdTipoPersonal ?></td>
                        <td class="text-left">      <!--<a href="index.php?modo=evaluarMeritos" class="btn btn-gear"></a> -->
                          <form class="darDeBajaPersonal" action="index.php?modo=habilitarPersonal" method="post">
                            <input type="hidden" name="ciPersonalDBAja" class="ciDBAja"  value="<?php echo $personal->IdPersona->CI ?>">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="dropdown-item btn btn-danger"><i class="fa fa-toggle-off"></i></button>
                          </form>
                        </td>
                      </tr>
                    <?php endif; ?>
                  <?php $i++; endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>

      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <a  class="btn btn-danger" data-dismiss="modal" >Cerrar <i class="fa fa-times-circle"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
