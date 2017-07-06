<?php
$fecha=date("Y/m/d");

include '../../model/conexion.php';

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

<div id="contenidoAll">

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
                                <li id="ListaContactosUB"><a style="color:white" href="#ListaContactosUB" data-toggle="tab">UB</a></li>
                            </ul>
                        </div>

                        <div class="panel-body" style="display: block;">
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="registrarMerito">
                                <div class="thumbnail">
                                    <div class="text-center">
                                      <h3><?php echo$datosDepartamento['nombre'];?></h3>
                                    </div>
                                    <form id="frmListaContactosUB" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="col-sm-1 col-md-2"></div>

                                        <div class="col-sm-10 col-md-8">

                                          <div class="form-group">
                                            <table class="table table-hover table-bordered">
                                              <tr>
                                                <td><label>Dirección:</label></td>
                                                <td><?php echo $datosDepartamento["direccion"];?></td>
                                                <td><label>Web:</label></td>
                                                <td><?php echo $datosDepartamento["direccionWeb"];?></td>
                                              </tr>
                                              <tr>
                                                <td><label>Teléfono:</label></td>
                                                <td>
                                                    <?php
                                                      $i = 0;
                                                      foreach ($listaTelefonosDepartamento as $regTelfDpto): $i++;

                                                      ?>
                                                      <label><?php echo $regTelfDpto->numero; ?></label>
                                                          
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
                                                      <label><?php echo $regFaxDpto->numero; ?></label>
                                                          
                                                    <?php endforeach; ?>
                                                </td>
                                                <td><label>E-Mail</label></td>
                                                <td><?php echo $datosDepartamento["email"];?></td>
                                              </tr>
                                            </table>
                                          </div>

                                          <div class="form-group">
                                                <table class="table table-hover table-bordered">
                                                  <thead>
                                                    <tr>
                                                        <th>TIPO EMPLEADO</th>
                                                        <th>NOMBRE COMPLETO</th>
                                                        <th>RESPONSABILIDAD</th>
                                                        <th>INTERNO</th>
                                                        <th>VOIP</th>
                                                        <th>CELULAR</th>
                                                        <th>DOMICILIO</th>
                                                        <th>CUMPLEAÑOS</th>
                                                        <th>CORREO ELECTRÓNICO</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                        $i = 0;
                                                        foreach ($listaDeContactosPorDepartamento as $registroContacto): $i++;
                                                      ?>
                                                        
                                                    <tr>
                                                        <TD><?php echo $registroContacto->nombreTipoEmpleado?></TD>
                                                        
                                                        <td>
                                                            <?php 
                                                              if($registroContacto->sexo == 'M'){
                                                              echo $registroContacto->apellidoPaterno.' '.$registroContacto->apellidoMaterno.' '.$registroContacto->primerNombre.' '.$registroContacto->segundoNombre; 
                                                              }else{
                                                                   
                                                                  echo $registroContacto->apellidoPaterno.' '.$registroContacto->primerNombre;  

                                                                }
                                                              
                                                            ?>
                                                        </td>
                                                        <td><?php echo $registroContacto->nombreResponsabilidad?></td>
                                                        <td><?php echo $registroContacto->interno ?></td>
                                                        <td><?php echo $registroContacto->voip ?></td>
                                                        <?php 
                                                            $listaTelefonoContacto = $telefonoContactoControlador->listarTelefonoContacto($registroContacto->idContacto);
                                                            $i = 0;
                                                            foreach ($listaTelefonoContacto as $registroTelefono): $i++;
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
                                                        <td><?php echo $registroContacto->fechaNacimiento ?></td>
                                                        <td><?php echo $registroContacto->emailInstitucional.'<BR>'.$registroContacto->emailPersonal
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                                </table>
                                          </div>


                                         <div class="col-sm-1 col-md-2"></div>
                                      </div>
                                    </form>
                                </div><!-- end  <div class="thumbnail">-- >
                              </div> <!--<div class="tab-pane fade in active" id="General">-->
                          </div><!--END <div class="tab-content">-->
                        </div><!-- END <div class="panel-body" style="display: block;">-->
                    </div> <!--<div class="panel with-nav-tabs panel-info">-->
                    <!--FIN Primer TAB -->


                </div> <!--DIV antes del TAB-->      
            </div><!--<div class="ibox-content forum-post-container">-->
    </div><!--<div class="col-lg-12">-->
</div><!--<div class="row">-->






