<?php
$fecha=date("Y/m/d");

include '../../model/Fax.php';
include '../../model/FaxConsulta.php';
include '../../model/TelefonoDepartamento.php';
include '../../model/TelefonoDepartamentoConsulta.php';
include '../../model/DepartamentoContacto.php';
include '../../model/DepartamentoContactoConsulta.php';
include '../../model/Contacto.php';
include '../../model/ContactoConsulta.php';
include '../../model/TelefonoContacto.php';
include '../../model/TelefonoContactoConsulta.php';

include '../../controller/FaxControlador.php';
include '../../controller/TelefonoDepartamentoControlador.php';
include '../../controller/DepartamentoContactoControlador.php';
include '../../controller/ContactoControlador.php';
include '../../controller/TelefonoContactoControlador.php';


$conexion = new Conexion();

//Recuperar datos del departamento
$departamentoContacto = new DepartamentoContactoControlador($conexion);

//enviando el ID del Tipo Departamento Contacto UB=1
$datosDepartamento = $departamentoContacto->datosDepartamentoContacto(1);

$telefonosDepartamento = new TelefonoDepartamentoControlador($conexion);
$listaTelefonosDepartamento = $telefonosDepartamento->listaTelefonoDepartamento($datosDepartamento['idDepartamentoContacto']);

$faxDepartamento = new FaxControlador($conexion);
$listaFaxDepartamento = $faxDepartamento->listaFaxDepartamento($datosDepartamento['idDepartamentoContacto']);

// recuperar datos para el contacto
$contactoControlador = new ContactoControlador($conexion);
$listaDeContactosPorDepartamento = $contactoControlador->listaDeContactosPorDepartamento($datosDepartamento['idDepartamentoContacto']);

$telefonoContactoControlador = new TelefonoContactoControlador($conexion);

?>

<div id="contenidoAll" >

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Directorio de Contactos </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Directorio </span> /<span class="text-muted">Contactos</span></h4>
                </div>

                <div>
                    <!--Primer TAB  UB -->
                    <div class="panel with-nav-tabs panel-info">
                        <div class="panel-heading" style="background:rgb(26, 74, 101)">
                            <ul class="nav nav-tabs" >
                                <li class="active" id="ListaContactosUBLI"><a style="color:white" href="#ListaContactosUB" data-toggle="tab">UB</a></li>
                            </ul>
                        </div>

                        <div style="display: block;">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="ListaContactosUB">
                                  <div class="thumbnail">
                                    <div class="container">
                                      <div class="row">
                                        <!-- <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div> -->
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="row">
                                            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                                            <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
                                              <div class=" panel panel-primary">
                                                <div class="text-center panel-heading">
                                                  <h3><?php echo utf8_encode($datosDepartamento['nombre']);?></h3>
                                                </div>
                                                <div class="table-responsive">
                                                  <table class="table table-hover table-bordered">
                                                    <tr>
                                                      <td><label>Dirección:</label></td>
                                                      <td><?php echo utf8_encode($datosDepartamento["direccion"]);?></td>
                                                      <td><label>Web:</label></td>
                                                      <td><?php echo utf8_encode($datosDepartamento["direccionWeb"]);?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Teléfono:</label></td>
                                                      <td>
                                                          <?php
                                                            $i = 0;
                                                            foreach ($listaTelefonosDepartamento as $regTelfDpto): $i++;

                                                            ?>
                                                            <?php echo "[{$regTelfDpto->numero}] "; ?>

                                                          <?php endforeach; ?>
                                                      </td>
                                                      <td><label>Casilla Postal:</label></td>
                                                      <td><?php echo $datosDepartamento["casillaPostal"];?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Fax:</label></td>
                                                      <td>
                                                         <?php
                                                            $i = 0;
                                                            foreach ($listaFaxDepartamento as $regFaxDpto): $i++;
                                                            ?>
                                                            <?php echo "[{$regFaxDpto->numero}] "; ?>

                                                          <?php endforeach; ?>
                                                      </td>
                                                      <td><label>E-Mail</label></td>
                                                      <td><?php echo $datosDepartamento["email"];?></td>
                                                    </tr>
                                                  </table>
                                                </div>
                                              </div>

                                            </div>
                                            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
                                          </div>

                                          <div class="panel panel-primary">
                                            <div class="panel-heading">
                                              <h2 class="panel-title">Acciones Posibles</h2>
                                              <div class="pull-right">

                                                <span class="clickable filter btn btn-info efec" data-toggle="tooltip" title="Click aqui para buscar un Contacto" data-container="body">
                                                  <i class="fa fa-search"></i>
                                                </span>
                                              </div><br><br>
                                              <div class="table-responsive">
                                                <table class="table">
                                                  <thead class="desk">
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-left">NOMBRE COMPLETO</th>
                                                        <th class="text-center">RESPONSABILIDAD</th>
                                                        <th class="text-center">TELEFONO(S)</th>
                                                    </tr>
                                                    </thead>
                                                  </table>
                                                </div>

                                              </div>
                                              <div class="panel-body" style="display:none">
                                              <input type="text" class="form-control"  id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Contacto" />
                                              </div>
                                            <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                                              <table class="table table-hover table-bordered table-condensed" id="dev-table" >
                                                <tbody class="text-center">

                                                  <?php
                                                    $i = 0;
                                                    foreach ($listaDeContactosPorDepartamento as $registroContacto): $i++;
                                                  ?>

                                                <tr data-toggle="modal" data-target="#contacto<?php echo $registroContacto->idContacto ?>" style="cursor:pointer">
                                                    <td><?php echo $i ?></td>
                                                    <td>
                                                        <?php
                                                          if($registroContacto->sexo == 'M'){
                                                          echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->apellidoMaterno.' '.$registroContacto->primerNombre.' '.$registroContacto->segundoNombre) ;
                                                          }else{

                                                              echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->primerNombre) ;

                                                            }

                                                        ?>
                                                    </td>
                                                    <td ><?php echo utf8_encode($registroContacto->nombreResponsabilidad)?></td>
                                                    <?php
                                                        $listaTelefonoContacto = $telefonoContactoControlador->listarTelefonoContacto($registroContacto->idContacto);
                                                        foreach ($listaTelefonoContacto as $registroTelefono):
                                                            if($registroTelefono->tipoTelefono == 'Celular'){
                                                    ?>
                                                                <td><?php echo $registroTelefono->numero.'<BR>' ?></td>
                                                    <?php
                                                            }else{
                                                    ?>
                                                                <td><?php echo $registroTelefono->numero.'<BR>' ?></td>
                                                    <?php
                                                                  }
                                                        endforeach;
                                                    ?>
                                                </tr>

                                                <div class="modal fade" id="contacto<?php echo $registroContacto->idContacto ?>">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <div class="panel panel-info">
                                                          <div class="panel-heading">

                                                            <h3 class="modal-title text-center">Datos Contacto</h3>
                                                          </div>
                                                          <div class="panel-body">
                                                            <p><strong>Nombre Completo: </strong> <?php echo utf8_encode($registroContacto->apellidoPaterno.' '.$registroContacto->apellidoMaterno.' '.$registroContacto->primerNombre.' '.$registroContacto->segundoNombre); ?></p>
                                                            <p><strong>Tipo de Empleado: </strong> <?php echo utf8_encode($registroContacto->nombreTipoEmpleado) ?></p>
                                                            <p><strong>Cargo/Responsabilidad: </strong> <?php echo utf8_encode($registroContacto->nombreResponsabilidad) ?></p>
                                                            <p><strong>Interno: </strong> <?php echo utf8_encode($registroContacto->interno) ?> </p>
                                                            <p><strong>Voip: </strong> <?php echo utf8_encode($registroContacto->voip) ?> </p>
                                                            <p><strong>Telefonos: </strong>
                                                              <?php
                                                                  $listaTelefonoContacto = $telefonoContactoControlador->listarTelefonoContacto($registroContacto->idContacto);
                                                                  foreach ($listaTelefonoContacto as $registroTelefono):
                                                                      if($registroTelefono->tipoTelefono == 'Celular'){
                                                              ?>
                                                                          <?php echo $registroTelefono->numero.' ' ?>
                                                              <?php
                                                                      }else{
                                                              ?>
                                                                          <?php echo $registroTelefono->numero.' ' ?>
                                                              <?php
                                                                            }
                                                                  endforeach;
                                                              ?>
                                                            </p>
                                                            <p><strong>Fecha de Nacimiento: </strong><?php echo $registroContacto->fechaNacimiento ?></p>
                                                            <p><strong>Email: </strong> <?php echo $registroContacto->emailInstitucional.'  '.$registroContacto->emailPersonal ?> </p>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <div class="pull-right">
                                                          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle">Cerrar</i></button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                                <?php endforeach; ?>

                                                </tbody>
                                              </table>
                                            </div>
                                            </div>

                                        </div>
                                        <!-- <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div> -->
                                    </div>

                                  </div>
                                </div>
                              </div>
                        </div>

                    </div>

                </div> <!--DIV antes del TAB-->
            </div><!--<div class="ibox-content forum-post-container">-->
    </div><!--<div class="col-lg-12">-->
</div><!--<div class="row">-->
