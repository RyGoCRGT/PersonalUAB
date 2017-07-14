<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asistente</title>

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
  <input type="hidden" id="fotoPerfil" name="foto" value="">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side nav-side-menu" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav " id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                              <img alt="avatar" class="img-circle img-responsive" height="90" width="90" src="../libs/multimedia/img/design/avatar.png" />
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
                              <img alt="avatar" class="img-circle img-responsive" height="90" width="90" src="../libs/multimedia/img/design/avatar.png" />
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
                        <a href="#"><i class="fa fa-male"></i> <span class="nav-label">Personal</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="index.php?modo=regPersonal"><i class="fa fa-plus"></i>Nuevo Personal</a></li>
                            <li ><a href="index.php?modo=listaPersonal"><i class="fa fa-list"></i>Lista</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Usuario</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="index.php?modo=regUsuario"><i class="fa fa-plus"></i>Nuevo Usuario</a></li>
                            <li ><a href="index.php?modo=listaUsuario"><i class="fa fa-list"></i>Lista</a></li>
                        </ul>
                    </li>
                    <!--Lista de Directorios-->
                    <li>

                        <a >
                        <i class="fa fa-address-book"></i> <span class="nav-label">Directorio</span><span class="fa arrow">
                        </a>
                        <!--Lista de Directorios-->
                        <ul class="nav nav-second-level">
                              <li><a href="index.php?modo=directorio">Directorio</a></li>
                             <li ><a href="index.php?modo=listaDirectorio">Lista</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Meritos</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="index.php?modo=NuevaTablaMeritos"><i class="fa fa-plus"></i>Nuevo Tabla de Méritos</a></li>
                            <li><a href="index.php?modo=tablaCalificacionMeritosDocente"><i class="fa fa-list"></i>Lista de Tablas de Méritos</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="index.php?modo=cumplePersonal"><i class="fa fa-birthday-cake"></i> <span class="nav-label">Cumpleañeros</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reportes</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">Docentes</a></li>
                            <li><a href="#">Proveedores</a></li>
                        </ul>
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
