<?php
include '../../model/conexion.php';
include '../../model/EstadoCivil.php';
include '../../model/EstadoCivilConsulta.php';
include '../../model/LugarExpedicion.php';
include '../../model/LugarExpedicionConsulta.php';
include '../../model/Nacion.php';
include '../../model/NacionConsulta.php';
include '../../model/TipoPersonal.php';
include '../../model/TipoPersonalConsulta.php';
include '../../model/Carrera.php';
include '../../model/CarreraConsulta.php';
include '../../model/Ciudad.php';
include '../../model/CiudadConsulta.php';
include '../../model/Facultad.php';
include '../../model/FacultadConsulta.php';
include '../../model/Religion.php';
include '../../model/ReligionConsulta.php';
include '../../model/Seguro.php';
include '../../model/SeguroConsulta.php';
include '../../model/Afp.php';
include '../../model/AfpConsulta.php';
include '../../model/Cargo.php';
include '../../model/CargoConsulta.php';
include '../../model/CargoPersona.php';
include '../../model/CargoPersonaConsulta.php';
include '../../model/Deporte.php';
include '../../model/DeporteConsulta.php';
include '../../model/Enfermedad.php';
include '../../model/EnfermedadConsulta.php';
include '../../model/TipoTituloProfesional.php';
include '../../model/TipoTituloProfesionalConsulta.php';
include '../../controller/NacionControlador.php';
include '../../controller/CtrEstadoCivil.php';
include '../../controller/CtrLugarExpedicion.php';
include '../../controller/TipoPersonalControlador.php';
include '../../controller/FacultadControlador.php';
include '../../controller/CiudadControlador.php';
include '../../controller/ReligionControlador.php';
include '../../controller/SeguroControlador.php';
include '../../controller/AfpControlador.php';
include '../../controller/CargoControlador.php';
include '../../controller/CargoPersonaControlador.php';
include '../../controller/DeporteControlador.php';
include '../../controller/EnfermedadControlador.php';
include '../../controller/TipoTituloProfesionalControlador.php';

$conexion = new Conexion();

$estadoCivil = new CtrEstadoCivil($conexion);
$listaEstadoCivil = $estadoCivil->listar();

$lugarExpedicion = new CtrLugarExpedicion($conexion);
$listaLugarExpedicion = $lugarExpedicion->listar();

$nacionalidad = new NacionControlador($conexion);
$listaNaciones = $nacionalidad->listar();

$tipoPersonal = new TipoPersonalControlador($conexion);
$listaTipoPersonal = $tipoPersonal->listar();

$faultadCarrera = new FacultadControlador($conexion);
$listaFacultadCarrera = $faultadCarrera->listar();

$ciudad = new CiudadControlador($conexion);
$listaCiudades = $ciudad->listar();

$religion = new ReligionControlador($conexion);
$listaReligion = $religion->listar();

$seguro = new SeguroControlador($conexion);
$listaSeguros = $seguro->listar();

$afp = new AfpControlador($conexion);
$listaAfps = $afp->listar();

$cargo = new CargoControlador($conexion);
$listaCargos = $cargo->listar();

$cargoPersona = new CargoPersonaControlador($conexion);
$listaCargosPersona = $cargoPersona->listar();

$deporte = new DeporteControlador($conexion);
$listaDeportes = $deporte->listar();

$enfermedad = new EnfermedadControlador($conexion);
$listaEnfermedades = $enfermedad->listar();

$tipoTituloProfesional = new TipoTituloProfesionalControlador($conexion);
$listaTipoTituloProfesional = $tipoTituloProfesional->listar();

?>
<div id="contenidoAll">

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
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Registro </span> /<span class="text-muted">Personal</span></h4>
                    <div class="pull-right" id="listoAll">
                      <form id="detallePersonal">
                        <input type="hidden" name="datos" value="1">
                        <input type="hidden" name="ciPersonalDetalle" id="ciPersonalDetalle" value="1">
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-send">LISTO</i></button>
                      </form>
                    </div>
                </div>

                <div>

                    <div class="panel with-nav-tabs panel-info">
                      <div class="panel-heading" style="background:rgb(26, 74, 101)">
                        <ul class="nav nav-tabs" >
                            <li class="active" id="GeneralLI"><a style="color:white" href="#General" data-toggle="tab" >Generales</a></li>
                            <li id="PersonalLI"><a style="color:white" href="#Personal" data-toggle="tab">Personal-UAB</a></li>
                            <li id="FamiliaresLI"><a style="color:white" href="#Familiares" data-toggle="tab">Familiares</a></li>
                            <li id="HojaVidaLI"><a style="color:white" href="#HojaVida" data-toggle="tab">Hoja de Vida</a></li>
                            <li id="AutoEvaluacionLI"><a id="autoEvMeritos" style="color:white" href="#AutoEvaluacion" data-toggle="tab">Auto Evaluacion de Meritos</a></li>
                        </ul>
                      </div>
                      <div class="panel-body" style="display: block;">
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="General">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Registro de Personal</h3>
                                  </div>
                                    <form id="frmPersona">

                                      <div class="row">

                                        <div class="col-sm-1 col-md-2"></div>
                                        <div class="col-sm-10 col-md-8">

                                          <div class="form-group">
                                            <label>Primer Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="primerNombre" type="text" class="form-control solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Segundo Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="segundoNombre" type="text" class="form-control solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoPaterno" type="text" class="form-control solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoMaterno" type="text" class="form-control solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>CI/NIT</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="ciNit" type="text" class="form-control" placeholder="CI/NIT: " aria-describedby="sizing-addon2" name="ciNit" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Lugar de Expedicion CI/NIT</label>
                                            <div class="input-group selector lugarExpedicionNew">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><a class="btn btn-xs btn-default lugarExpedicionAdd" data-toggle="modal" data-target="#addNewLugExpedi"><i class="fa fa-address-card"></i></a></span>
                                              <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion" title="Seleccione Lugar de Expedicion CI" required>
                                                <?php foreach ($listaLugarExpedicion as $listaLE): ?>
                                                  <option value="<?php echo $listaLE->IdLugarExpedicion; ?>"><?php echo $listaLE->NombreLugarExpedicion; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                            <div class="input-group selector-mobile lugarExpedicionNew">
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><a class="btn btn-xs btn-default lugarExpedicionAdd" data-toggle="modal" data-target="#addNewLugExpedi"><i class="fa fa-address-card"></i></a></span>
                                              <select class="form-control" name="lugarExpedicion" id="lugarExpedicion" title="Seleccione Lugar de Expedicion CI" required>
                                                <option value="" disabled selected hidden>Seleccione Lugar de Expedicion CI</option>
                                                <?php foreach ($listaLugarExpedicion as $listaLE): ?>
                                                  <option value="<?php echo $listaLE->IdLugarExpedicion; ?>"><?php echo $listaLE->NombreLugarExpedicion; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Fecha de Nacimiento</label>
                                            <div class="input-group" >
                                              <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                              <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" required>
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

                                         <div class="form-group">
                                           <label>Estado Civil</label>
                                           <div class="input-group selector">
                                             <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                             <select class="selectpicker form-control" name="estadoCivil" id="estadoCivil" title="Seleccionar Estado Civil" required>
                                               <?php foreach ($listaEstadoCivil as $listaEC): ?>
                                                 <option value="<?php echo $listaEC->IdEstadoCivil; ?>"><?php echo $listaEC->NombreEstadoCivil; ?></option>
                                               <?php endforeach; ?>
                                             </select>
                                           </div>
                                           <div class="input-group selector-mobile">
                                             <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                             <select class="form-control" name="estadoCivil" id="estadoCivil" title="Seleccionar Estado Civil" required>
                                               <option value="" disabled selected hidden>Seleccionar Estado Civil</option>
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
                                             <input id="telefono" type="text" class="form-control solo-numero" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefono">
                                           </div>
                                         </div>

                                         <input type="hidden" name="datos" value="1">

                                         <div id="mesajePersona"></div>

                                         <div class="pull-right">
                                           <button type="submit" name="guardarPersona" id="guardarPersona" class="btn btn-primary">Siguiente</button>
                                         </div>

                                         <br><br>

                                        </div>
                                        <div class="col-sm-1 col-md-2"></div>

                                      </div>

                                    </form>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="Personal">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Registro de Personal</h3>
                                  </div>
                                  <form id="frmPersonal">

                                    <div class="row">
                                      <div class="col-sm-1 col-md-2"></div>
                                      <div class="col-sm-10 col-md-8">

                                        <div class="row">

                                          <div class="col-sm-6 col-md-6 ">
                                            <center>
                                              <div class="imgFoto">
                                                <input id="fotoPersonal" type="file" style="opacity:0" class="form-control personalInputCtr" name="fotoPersonal">
                                              </div>
                                            </center>
                                            <h3 class="text-center"> Examinar Imagen</h3>
                                          </div>
                                          <div class="col-sm-6 col-md-6">
                                            <center>
                                              <div class="repuesta" id="repuesta">
                                                <center><img id="repuestaFoto" class="img-responsive img-rounded" width="200" height="150"></center>
                                              </div>
                                            </center>
                                          </div>

                                        </div>
                                        <div class="form-group">
                                          <label>Nacionalidad</label>
                                          <div class="input-group selector nacionalidadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewNacionalidad"><i class="fa fa-building"></i></a></span>
                                            <select class="selectpicker form-control personalInputCtr" name="nacionalidad" id="nacionalidad" title="Seleccione Nacionalidad" required>
                                              <?php foreach ($listaNaciones as $listaN): ?>
                                                <option value="<?php echo $listaN->IdNacion; ?>"><?php echo $listaN->NombreNacion; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile nacionalidadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewNacionalidad"><i class="fa fa-building"></i></a></span>
                                            <select class="form-control personalInputCtr" name="nacionalidad" id="nacionalidad" required>
                                              <option value="" disabled selected hidden>Seleccione Nacionalidad</option>
                                              <?php foreach ($listaNaciones as $listaN): ?>
                                                <option value="<?php echo $listaN->IdNacion; ?>"><?php echo $listaN->NombreNacion; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Tipo Personal</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="selectpicker form-control personalInputCtr" name="tipoPersonal" id="tipoPersonal" title="Tipo de Personal" required>
                                              <?php foreach ($listaTipoPersonal as $listaTP): ?>
                                                <option value="<?php echo $listaTP->IdTipoPersonal; ?>"><?php echo $listaTP->NombreTipoPersonal; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group" id="cargoPersonalSelect">
                                          <label>Cargo</label>
                                          <div class="input-group selector">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-briefcase"></i></span>
                                            <select class="selectpicker form-control personalInputCtr" name="cargoPersonal" id="cargoPersonal" title="Seleccione Cargo">
                                              <?php foreach ($listaCargosPersona as $listaC): ?>
                                                <option value="<?php echo $listaC->IdCargoPersona; ?>"><?php echo $listaC->NombreCargoPersona; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-briefcase"></i></span>
                                            <select class="form-control personalInputCtr" name="cargoPersonal" id="cargoPersonal">
                                              <option value="" disabled selected hidden>Seleccione Cargo</option>
                                              <?php foreach ($listaCargosPersona as $listaC): ?>
                                                <option value="<?php echo $listaC->IdCargoPersona; ?>"><?php echo $listaC->NombreCargoPersona; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group" id="carreraPersonalSelect">
                                          <label>Facultad Carrera</label>
                                          <div class="input-group selector">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="selectpicker form-control personalInputCtr show-tick" name="carrera" id="carrera" title="Seleccione Carrera" data-container="body">
                                              <?php foreach ($listaFacultadCarrera as $listaFC): ?>
                                                <optgroup label="<?php echo $listaFC->NombreFacultad ?>">
                                                <?php foreach ($listaFC->getListaCarreras() as $listaCa): ?>
                                                  <option value="<?php echo $listaCa->IdCarrera; ?>"><?php echo $listaCa->NombreCarrera; ?></option>
                                                <?php endforeach; ?>
                                                </optgroup>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="form-control personalInputCtr" name="carrera" id="carrera">
                                              <option value="" disabled selected hidden>Seleccione Carrera</option>
                                              <?php foreach ($listaFacultadCarrera as $listaFC): ?>
                                                <optgroup label="<?php echo $listaFC->NombreFacultad ?>">
                                                <?php foreach ($listaFC->getListaCarreras() as $listaCa): ?>
                                                  <option value="<?php echo $listaCa->IdCarrera; ?>"><?php echo $listaCa->NombreCarrera; ?></option>
                                                <?php endforeach; ?>
                                                </optgroup>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Direccion</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control personalInputCtr" placeholder="Direccion: " aria-describedby="sizing-addon2" id="direccion" name="direccion" required>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Correo Electronico</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control personalInputCtr" placeholder="E-mail: " aria-describedby="sizing-addon2" id="email" name="email">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Ciudad Nacimiento </label>
                                          <div class="input-group selector ciudadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewCiudad" ><i class="fa fa-building"></i></a> </span>
                                            <select class="selectpicker form-control personalInputCtr" name="ciudad" id="ciudad" title="Seleccione Ciudad de Nacimiento" required>
                                              <?php foreach ($listaCiudades as $listaC): ?>
                                                <option value="<?php echo $listaC->IdCiudad; ?>"><?php echo $listaC->NombreCiudad; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile ciudadNew">
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewCiudad" ><i class="fa fa-building"></i></a> </span>
                                            <select class="form-control personalInputCtr" name="ciudad" id="ciudad" required>
                                              <option value="" disabled selected hidden>Seleccione Ciudad de Nacimiento</option>
                                              <?php foreach ($listaCiudades as $listaC): ?>
                                                <option value="<?php echo $listaC->IdCiudad; ?>"><?php echo $listaC->NombreCiudad; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Religion</label>
                                          <div class="input-group selector religionNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewReligion"><i class="fa fa-cube"></i></a></span>
                                            <select class="selectpicker form-control personalInputCtr" name="religion" id="religion" title="Seleccione Religion">
                                              <?php foreach ($listaReligion as $listaR): ?>
                                                <option value="<?php echo $listaR->IdReligion; ?>"><?php echo $listaR->NombreReligion; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile religionNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewReligion"><i class="fa fa-cube"></i></a></span>
                                            <select class="form-control personalInputCtr" name="religion" id="religion">
                                              <option value="" disabled selected hidden>Seleccione Religion</option>
                                              <?php foreach ($listaReligion as $listaR): ?>
                                                <option value="<?php echo $listaR->IdReligion; ?>"><?php echo $listaR->NombreReligion; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Fecha de Bautizmo</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                            <input id="fechaBau" type="text" class="form-control personalInputCtr datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Bautizmo:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaBau" required>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Seguro: Empresa Aseguradora de Salud</label>
                                          <div class="input-group selector seguroNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewSeguro"><i class="fa fa-cube"></i></a> </span>
                                            <select class="selectpicker form-control personalInputCtr" name="seguro" id="seguro" title="Seleccione Empresa Aseguradora">
                                              <?php foreach ($listaSeguros as $listaS): ?>
                                                <option value="<?php echo $listaS->IdSeguro; ?>"><?php echo $listaS->NombreSeguro; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile seguroNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewSeguro"><i class="fa fa-cube"></i></a> </span>
                                            <select class="form-control personalInputCtr" name="seguro" id="seguro">
                                              <option value="" disabled selected hidden>Seleccione Empresa Aseguradora</option>
                                              <?php foreach ($listaSeguros as $listaS): ?>
                                                <option value="<?php echo $listaS->IdSeguro; ?>"><?php echo $listaS->NombreSeguro; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de Seguro</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numSeguro" type="text" class="form-control personalInputCtr solo-numero" placeholder="Numero de Seguro" name="numSeguro">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>AFP</label>
                                          <div class="input-group selector afpNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewAfp"><i class="fa fa-cube"></i></a> </span>
                                            <select class="selectpicker form-control personalInputCtr" name="afp" id="afp" title="Seleccione AFP">
                                              <?php foreach ($listaAfps as $listaA): ?>
                                                <option value="<?php echo $listaA->IdAfp; ?>"><?php echo $listaA->NombreAfp; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="input-group selector-mobile afpNew">
                                            <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewAfp"><i class="fa fa-cube"></i></a> </span>
                                            <select class="form-control personalInputCtr" name="afp" id="afp">
                                              <option value="" disabled selected hidden>Seleccione AFP</option>
                                              <?php foreach ($listaAfps as $listaA): ?>
                                                <option value="<?php echo $listaA->IdAfp; ?>"><?php echo $listaA->NombreAfp; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de AFP</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numAfp" type="text" class="form-control personalInputCtr solo-numero" placeholder="Numero de AFP" name="numAfp">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de Libreta Militar</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numLibMilitar" type="text" class="form-control personalInputCtr solo-numero" placeholder="Numero de Libreta Familiar" name="numLibMilitar">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de Pasaporte</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numPasaporte" type="text" class="form-control personalInputCtr" placeholder="Numero de Pasaporte" name="numPasaporte">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Tipo Sangre</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-tumblr-square"></i></span>
                                            <select class="selectpicker form-control personalInputCtr" name="tipoSangre" id="tipoSangre" title="Tipo de Sangre" required>
                                              <option value="ORH+">ORH+</option>
                                              <option value="ORH-">ORH-</option>
                                              <option value="AB+">AB+</option>
                                              <option value="AB-">AB-</option>
                                              <option value="A+">A+</option>
                                              <option value="A-">A-</option>
                                              <option value="B+">B+</option>
                                              <option value="B-">B-</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Hobby</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <input id="hobby" type="text" class="form-control personalInputCtr" placeholder="Hobby:" name="hobby">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de Registro Profesional</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numeroRegProfesional" type="text" class="form-control personalInputCtr" placeholder="Numero de Registro Profesional:" name="numeroRegProfesional">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Lectura Preferencial</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <textarea name="lecturaP" style="resize:none;" id="lecturaP" class="form-control personalInputCtr" placeholder="Lectura Preferencial:" rows="3" cols="100"></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Fecha de Ingreso UAB</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                            <input id="fechaIngres" type="text" class="form-control personalInputCtr datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Ingreso UAB:  AAAA/MM/DD" name="fechaIngres" required>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                              <label>Cargos/Roles</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-briefcase"></i></span>
                                                <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="cargos[]" id="cargos">
                                                  <?php foreach ($listaCargos as $listaC): ?>
                                                    <option value="<?php echo $listaC->IdCargo; ?>"><?php echo $listaC->NombreCargo; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                              <label>Alergias / Enfermedades</label>
                                              <div class="input-group enfermedadNew">
                                                <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewEnfermedad" ><i class="fa fa-medkit"></i></a> </span>
                                                <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="enfermedades[]" id="enfermedades">
                                                  <?php foreach ($listaEnfermedades as $listaE): ?>
                                                    <option value="<?php echo $listaE->IdEnfermedad; ?>"><?php echo $listaE->NombreEnfermedad; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                              <label>Deportes</label>
                                              <div class="input-group deporteNew">
                                                <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewDeporte" ><i class="fa fa-star"></i></a></span>
                                                <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="deportes[]" id="deportes">
                                                  <?php foreach ($listaDeportes as $listaD): ?>
                                                    <option value="<?php echo $listaD->IdDeporte; ?>"><?php echo $listaD->NombreDeporte; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <input type="hidden" name="datos" value="1">
                                        <input type="hidden" name="ciPersona" id="ciPerson" value="1">

                                        <div id="mensajePersonal"></div>

                                        <div class="pull-right">
                                          <button type="submit" name="guardar" class="btn btn-primary">Siguiente</button>
                                        </div>

                                        <br><br>

                                      </div>
                                      <div class="col-sm-1 col-md-2"></div>
                                    </div>

                                  </form>

                                </div>
                              </div>
                              <div class="tab-pane fade" id="Familiares">
                                <div class="thumbnail">

                                  <div class="row">
                                    <div class="col-sm-1 col-md-2"></div>
                                    <div class="col-sm-10 col-md-8">

                                      <form id="frmPersonalConyugue">

                                        <div class="ibox float-e-margins" >
                                          <div class="ibox-title" id="conyugueTittle">
                                              <h5>Conyugue</h5>
                                              <div class="ibox-tools">
                                                  <a class="collapse-link" id="conyugueContent">
                                                      <i class="fa fa-chevron-up"></i>
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="ibox-content into-panel">

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Primer Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="primerNombreCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreCon" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Segundo Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="segundoNombreCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreCon">
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
                                                    <input id="apellidoPaternoCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoCon" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Apellido Materno</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="apellidoMaternoCon" type="text" class="form-control personaConyugueBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoCon">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Fecha de Nacimiento</label>
                                                  <div class="input-group" >
                                                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                    <input id="fechaNacimientoCon" type="text" class="form-control personaConyugueBk datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" name="fechaNacimientoCon" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Fecha de Matrimanio</label>
                                                  <div class="input-group" >
                                                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                    <input id="fechaBautizmoCon" type="text" class="form-control personaConyugueBk datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Matrimonio:  AAAA/MM/DD" name="fechaBautizmoCon" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                           <div id="mensajeFrmCon"></div><br><br>

                                           <input type="hidden" name="datos" value="1">
                                           <input type="hidden" name="ciPersonConyu" id="ciPersonConyu" value="1">

                                           <div class="pull-right">
                                             <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                           </div>

                                           <br><br>

                                          </div>
                                        </div>


                                      </form>

                                      <form id="frmPersonalHijos">

                                        <div class="ibox float-e-margins" >
                                          <div class="ibox-title" id="hijosTittle">
                                              <h5>Hijos</h5>
                                              <div class="ibox-tools">
                                                  <a class="collapse-link" id="hijosContent">
                                                      <i class="fa fa-chevron-up"></i>
                                                  </a>
                                              </div>

                                          </div>
                                          <div class="ibox-content into-panel">

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Primer Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="primerNombreHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreHij" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Segundo Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="segundoNombreHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreHij">
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
                                                    <input id="apellidoPaternoHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoHij" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Apellido Materno</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="apellidoMaternoHij" type="text" class="form-control inputHijoBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoHij">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Fecha de Nacimiento</label>
                                              <div class="input-group" >
                                                <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                <input id="fechaNacimientoHij" type="text" class="form-control inputHijoBk datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNacimientoHij" required>
                                              </div>
                                            </div>

                                            <div id="mensajeFrmHijo"></div><br><br>

                                            <input type="hidden" name="datos" value="1">
                                            <input type="hidden" name="ciPersonHijo" id="ciPersonHijo" value="1">

                                           <div class="pull-right">
                                             <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                           </div>
                                           <a class="btn btn-warning" id="nuevoHijoPers">Nuevo Hijo (a)</a>

                                           <a class="btn btn-success" id="allhijos">Listo</a>

                                          </div>
                                        </div>


                                      </form>

                                      <form id="frmPersonalReferencia">

                                        <div class="ibox float-e-margins" >
                                          <div class="ibox-title" id="referenciaTittle">
                                              <h5>Referencia en caso de Emergencia</h5>
                                              <div class="ibox-tools">
                                                  <a class="collapse-link" id="referenciaContent">
                                                      <i class="fa fa-chevron-up"></i>
                                                  </a>
                                              </div>

                                          </div>
                                          <div class="ibox-content into-panel">

                                            <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Primer Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="primerNombreRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombreRef" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Segundo Nombre</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="segundoNombreRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombreRef">
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
                                                    <input id="apellidoPaternoRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaternoRef" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                  <label>Apellido Materno</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                    <input id="apellidoMaternoRef" type="text" class="form-control inputReferBk solo-letra" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaternoRef">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                           <div class="form-group">
                                             <label>Telefono</label>
                                             <div class="input-group">
                                               <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                               <input id="telefonoReferencia" type="text" class="form-control inputReferBk solo-numero" placeholder="Telefono: " aria-describedby="sizing-addon2" name="telefonoReferencia" required>
                                             </div>
                                           </div>

                                           <div id="mensajeFrmReferencia"></div><br><br>

                                           <input type="hidden" name="datos" value="1">
                                           <input type="hidden" name="ciPersonReferencia" id="ciPersonReferencia" value="1">

                                           <div class="pull-right">
                                             <button type="submit" name="guardar" class="btn btn-primary">Grabar</button>
                                           </div>

                                           <br><br>

                                          </div>
                                        </div>


                                      </form>


                                    </div>
                                    <div class="col-sm-1 col-md-2"></div>
                                  </div>

                                </div>
                              </div>
                              <div class="tab-pane fade" id="HojaVida">
                                <div class="thumbnail"  style="background: rgb(222, 224, 226)">

                                  <div class="panel with-nav-tabs panel-primary">
                                    <div class="panel-heading" >
                                      <ul class="nav nav-tabs" >
                                          <li class="active" id="CursosLI"><a style="color:white" href="#Cursos" data-toggle="tab" >Cursos</a></li>
                                          <li id="TitulosLI"><a style="color:white" href="#Titulos" data-toggle="tab">Titulos</a></li>
                                          <li id="ExperienciaLaboralLI"><a style="color:white" href="#ExperienciaLaboral" data-toggle="tab">Experincia Laboral</a></li>
                                    </div>
                                  </div>
                                  <div class="panel-body" style="display: block; background:white">
                                    <div class="tab-content">
                                      <div class="tab-pane fade in active" id="Cursos">
                                        <form id="CursosFrm">
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Nombre Institucion</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputCursoBk" name="nombreInstitucionCursos" id="nombreInstitucionCursos" required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Curso Estudiado</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputCursoBk" name="cursoEstudiado" id="cursoEstudiado" required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Año de Estudio</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control inputCursoBk solo-numero" name="anhoEstudioCuso" id="anhoEstudioCuso" required>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="form-group">
                                                <label>Religion Institucion</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span>
                                                  <input type="text" class="form-control inputCursoBk solo-letra" name="religionInstCurso" id="religionInstCurso">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="form-group ">
                                                <label>Respaldo Curso (IMAGEN *jpg *png)</label>
                                                <div class="input-group exportarArchivo">
                                                  <input type="file" class="form-control exportarArchivoFile" name="respaldoCursos" id="respaldoCursos">
                                                </div>
                                                <div class="nameFileImg"></div>
                                              </div>
                                            </div>
                                          </div>
                                          <input type="hidden" name="datos" value="1">
                                          <input type="hidden" name="ciPersonaCurso" id="ciPersonaCurso" value="1">
                                          <div class="pull-right">
                                            <a class="btn btn-warning" id="newCurso"><i class="fa fa-plus"></i>Nuevo</a>
                                            <button type="submit" class="btn btn-success" name="guardar"><i class="fa fa-send"></i>Añadir</button>
                                          </div>
                                        </form>
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensajeCursosPersonal"></div>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="Titulos">
                                        <form id="TiulosFrm">
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Nombre Institucion</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputTitulosBk" name="nombreInstitucionTitulos" id="nombreInstitucionTitulos">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Curso Profesional Estudiado</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputTitulosBk" name="cursoProfesionalEstudiado" id="cursoProfesionalEstudiado">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Tipo de Tiulo</label>
                                                <div class="input-group selector">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <select class="selectpicker form-control inputTitulosBk" name="tipoTituloProfesional" id="tipoTituloProfesional">
                                                    <?php foreach ($listaTipoTituloProfesional as $listaTipoTP): ?>
                                                      <option value="<?php echo $listaTipoTP->IdTipoTituloProfesional; ?>"><?php echo $listaTipoTP->NombreTipoTitulo; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                                <div class="input-group selector-mobile">
                                                  <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <select class="form-control inputTitulosBk" name="tipoTituloProfesional" id="tipoTituloProfesional">
                                                    <?php foreach ($listaTipoTituloProfesional as $listaTipoTP): ?>
                                                      <option value="<?php echo $listaTipoTP->IdTipoTituloProfesional; ?>"><?php echo $listaTipoTP->NombreTipoTitulo; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Religion Institucion</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span>
                                                  <input type="text" class="form-control inputTitulosBk" name="religionInstTitulo" id="religionInstTitulo">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Tiempo de Estudio</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control inputTitulosBk solo-numero-float" name="anhoEstudioTitulo" id="anhoEstudioTitulo">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Respaldo Titulo Profesional (IMAGEN *jpg *png)</label>
                                                <div class="input-group exportarArchivo">
                                                  <input type="file" class="form-control exportarArchivoFile" name="respaldoTitulo" id="respaldoTitulo">
                                                </div>
                                                <div class="nameFileImg"></div>
                                              </div>
                                            </div>
                                          </div>
                                          <input type="hidden" name="datos" value="1">
                                          <input type="hidden" name="ciPersonaTitulo" id="ciPersonaTitulo" value="1">
                                          <div class="pull-right">
                                            <a class="btn btn-warning" id="newTitulo"><i class="fa fa-plus"></i>Nuevo</a>
                                            <button type="submit" class="btn btn-success" name="guardar"><i class="fa fa-send"></i>Añadir</button>
                                          </div>
                                        </form>
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensajeTitulosPersonal"></div>
                                        </div>
                                      </div>

                                      <div class="tab-pane fade" id="ExperienciaLaboral">
                                        <form id="ExperienciaLaboralFrm">
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Nombre Institucion</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="nombreInstitucionEL" id="nombreInstitucionEL">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Cargo/Responsabilidad</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="cargoResponsabilidadEL" id="cargoResponsabilidadEL">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                              <div class="form-group">
                                                <label>Años de Servicio</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" class="form-control inputELabBk solo-numero-float" name="anhoServicioEL" id="anhoServicioEL">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="form-group">
                                                <label>Religion Institucion</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="religionInstEL" id="religionInstEL">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                              <div class="form-group">
                                                <label>Motivo de Retiro</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon"id="sizing-addon2"><i class="fa fa-universal-access"></i></span>
                                                  <input type="text" class="form-control inputELabBk" name="motivoRetiroEL" id="motivoRetiroEL">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <input type="hidden" name="datos" value="1">
                                          <input type="hidden" name="ciPersonEL" id="ciPersonEL" value="1">
                                          <div class="pull-right">
                                            <a class="btn btn-warning" id="newExpeLabor"><i class="fa fa-plus"></i>Nuevo</a>
                                            <button type="submit" class="btn btn-success" name="guardar"><i class="fa fa-send"></i>Añadir</button>
                                          </div>
                                        </form>
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensajeELaboralPersonal"></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="AutoEvaluacion">
                                <div class="thumbnail" id="mensajeAutoEvaluacion">
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

<div class="modal fade bs-example-modal-lg in"  aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Personal-UAB</h3>
      </div>
      <div class="modal-body">
        <div class="contenidoDetalle" id="contenidoDetalle">
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
          <span class="sr-only">Cargando...</span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-left">
          <a id="exportarFormularioPDF" class="btn btn-danger btn-sm">Exportar PDF <i class="fa fa-file-pdf-o"></i></a>
          <a id="exportarFormularioEXCEL" class="btn btn-success btn-sm">Exportar EXCEL <i class="fa fa-file-excel-o"></i></a>
          <a id="exportarFormularioWORD" class="btn btn-primary btn-sm">Exportar WORD <i class="fa fa-file-word-o"></i></a>
        </div>
        <div class="pull-right">
          <a href="index.php?modo=listaPersonal" class="btn btn-success btn-lg">LISTO <i class="fa fa-check"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewLugExpedi">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewLugExpediForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Lugar de Expedicion</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Lugar de Expedicion CI/NIT</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-address-card"></i></span>
              <input type="text" name="expedicionNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddLugEx"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewNacionalidad">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewNacionalidadForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Nacionalidad</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nacionalidad</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-building"></i></span>
              <input type="text" name="nacionalidadNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddNacionalidad"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewCiudad">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewCiudadForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Ciudad de Nacimiento</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Ciudad de Nacimiento</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-building"></i></span>
              <input type="text" name="ciudadNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddCiudad"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewReligion">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewReligionForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Religion</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Religion</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="religionNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddReligion"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewSeguro">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewSeguroForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Seguro</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Seguro</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="seguroNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddSeguro"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewAfp">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewAfpForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar AFP</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>AFP</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="afpNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddAfp"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewEnfermedad">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewEnfermedadForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Enfermedad/Alergia</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Enfermedad/Alergia</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="enfermedadNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddEnfermedad"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNewDeporte">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="addNewDeporteForm">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title text-center">Agregar Deporte</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Deporte</label>
            <div class="input-group">
              <span class="input-group-addon" style="background: red; color:white" ><i class="fa fa-cube"></i></span>
              <input type="text" name="deporteNew" class="form-control" required>
            </div>
          </div>
          <div id="respuestaAddDeporte"></div>
        </div>
        <div class="modal-footer">
          <div class="pull-right">
            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cerrar <i class="fa fa-times-circle"></i></button>
            <button type="reset" class="btn btn-default btn-sm">Limpiar <i class="fa fa-refresh"></i></button>
            <button type="submit" class="btn btn-success btn-sm">Guardar <i class="fa fa-check"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
