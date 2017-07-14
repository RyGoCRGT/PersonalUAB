<?php
include '../../model/conexion.php';
include '../../model/Persona.php';
include '../../model/Cargo.php';
include '../../model/Enfermedad.php';
include '../../model/Deporte.php';
include '../../model/Personal.php';
include '../../model/PersonaConsulta.php';
include '../../model/PersonalConsulta.php';
include '../../model/ReferenciaPersonal.php';
include '../../model/ReferenciaPersonalConsulta.php';
include '../../model/ConyuguePersonal.php';
include '../../model/ConyuguePersonalConsulta.php';
include '../../model/CursoEstudiado.php';
include '../../model/CursoEstudiadoConsulta.php';
include '../../model/HijosPersonal.php';
include '../../model/HijosPersonalConsulta.php';
include '../../model/Telefono.php';
include '../../model/TelefonoConsulta.php';
include '../../model/TituloProfesional.php';
include '../../model/TituloProfesionalConsulta.php';
include '../../model/ExperienciaLaboral.php';
include '../../model/ExperienciaLaboralConsulta.php';
include '../../controller/PersonaControlador.php';
include '../../controller/PersonalControlador.php';
include '../../controller/ReferenciaPersonalControlador.php';
include '../../controller/TelefonoControlador.php';
include '../../controller/ConyuguePersonalControlador.php';
include '../../controller/HijosPersonalControlador.php';
include '../../controller/CursoEstudiadoControlador.php';
include '../../controller/TituloProfesionalControlador.php';
include '../../controller/ExperienciaLaboralControlador.php';

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
include '../../model/CargoConsulta.php';
include '../../model/CargoPersona.php';
include '../../model/CargoPersonaConsulta.php';
include '../../model/DeporteConsulta.php';
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
$consulta = new PersonaConsulta($conexion);

$personalManejador = new PersonalControlador($conexion);

$personal = $personalManejador->ver($_SESSION['idPersona']);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Academico</title>

    <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
    <link href="../libs/css/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../libs/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../libs/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../libs/css/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../libs/css/jquery.gritter.css" rel="stylesheet">

    <link href="../libs/css/animate.css" rel="stylesheet">
    <link href="../libs/css/style.css" rel="stylesheet">

    <link href="../libs/css/estiloDatosPersonal.css" rel="stylesheet">


</head>

<body>
  <input type="hidden" id="fotoPerfil" name="foto" value="<?php echo $personal->Ruta ?>">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side nav-side-menu" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav " id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                              <img alt="avatar" class="img-circle img-responsive img-fotoPersonal" height="90" width="90" src="../libs/multimedia/img/design/avatar.png" />
                              <span class="block m-t-xs">
                                <strong class="font-bold"><?php echo ucwords($_SESSION['usuario']); ?></strong>
                              </span>
                              <span class="text-muted text-xs block">Opciones <b class="caret"></b></span>
                            </span>
                          </a>
                          <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              <li><a href="#">Perfil</a></li>
                              <li><a href="#">Editar</a></li>
                              <li class="divider"></li>
                              <li><a href="index.php?modo=salir">Salir</a></li>
                          </ul>
                        </div>
                        <div class="logo-element">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <img alt="avatar" class="img-circle img-responsive img-fotoPersonal" height="90" width="90" src="../libs/multimedia/img/design/avatar.png" />
                          </a>
                          <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              <li><a href="#">Perfil</a></li>
                              <li><a href="#">Editar</a></li>
                              <li class="divider"></li>
                              <li><a href="index.php?modo=salir">Salir</a></li>
                          </ul>
                        </div>
                    </li>
                    <li>
                        <a href="index.php?modo=editarDatos"><i class="fa fa-male"></i><span class="nav-label">Mis Datos</span></a></li>
                    </li>
                    <li>
                        <a href="index.php?modo=directorio"><i class="fa fa-address-book"></i><span class="nav-label">Directorio</span></a>
                    </li>
                    <li>
                        <a href="index.php?modo=cumplePersonal"><i class="fa fa-birthday-cake"></i> <span class="nav-label">Cumpleañeros</span></a>
                    </li>
                    <li>
                        <a href="index.php?modo=documentos"><i class="fa fa-book"></i> <span class="nav-label">Documentos</span></a>
                    </li>
                </ul>
            </div>
        </nav>


        <div id="page-wrapper" class="gray-bg dashbard-1">
          <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;">
              <div class="navbar-header">
                  <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
              </div>
              <ul class="nav navbar-top-links navbar-right">
                  <li class="label-primary" >
                    <a href="index.php" style="color: white;">
                      <i class="fa fa-home"></i>Home
                    </a>
                  </li>
              </ul>
            </nav>
          </div>
