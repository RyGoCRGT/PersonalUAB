<?php
include '../../model/conexion.php';
include '../../model/usuarioConsulta.php';

$conexion = new Conexion();

$usuarioManejador = new UsuarioConsulta($conexion);
$listaUsuario = $usuarioManejador->listaUsuario();

$i = 1;

?>
<div class="container" id="contenidoAll">

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
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Lista </span> /<span class="text-muted">Usuario</span></h4>
                </div>
                <br><br>
                <div class="">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h2 class="panel-title">Acciones Posibles</h2>
                          <div class="pull-right">
                            <a href="index.php?modo=regUsuario"  class="btn btn-success"><i class="fa fa-plus" title="Añadir un nuevo Usuario" data-toggle="tooltip"></i></a>
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
                                  <th class="text-center">Tipo de Usuario</th>
                                  <th class="text-center">Usuario</th>
                                  <th class="text-center">contrasena</th>
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

                              <?php foreach ($listaUsuario as $usuario): ?>
                                <tr>
                                  <td><?php echo $i ?></td>
                                  <td class="text-center"><?php echo $usuario['primerNombre']." ".$usuario['apellidoPaterno']." ".$usuario['apellidoMaterno']; ?></td>
                                  <td class="text-center"><?php echo $usuario['CI']; ?></td>
                                  <td class="text-center"><?php echo $usuario['NombreTipoUsuario']; ?></td>
                                  <td class="text-center"><?php echo $usuario['usuario']; ?></td>
                                  <td class="text-center"><?php echo $usuario['contrasena']; ?></td>


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
