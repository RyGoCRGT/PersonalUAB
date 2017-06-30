<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profesor</title>

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
    <div id="wrapper">

      <nav class="navbar-default navbar-static-side" role="navigation">
          <div class="sidebar-collapse">
              <ul class="nav" id="side-menu">
                  <li class="nav-header">
                      <div class="dropdown profile-element"> <span>
                          <img alt="avatar" class="img-circle img-responsive" height="90" width="90" src="../libs/multimedia/img/design/avatar.png" />
                           </span>
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo ucwords($_SESSION['usuario']); ?></strong>
                          </span> <span class="text-muted text-xs block">Opciones <b class="caret"></b></span> </span> </a>
                          <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              <li><a href="#">Perfil</a></li>
                              <li><a href="#">Editar</a></li>
                              <li class="divider"></li>
                              <li><a href="index.php?modo=salir">Salir</a></li>
                          </ul>
                      </div>
                      <div class="logo-element">
                        <img class="img-responsive img-circle" src="../libs/multimedia/img/design/uab.png" alt="uab" width="80" height="80">
                      </div>
                  </li>
                  <li>
                      <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Personal</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li class="active"><a href="index.php?modo=regPersonal">Nuevo</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Otros</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li class="active"><a href="index.php?modo=cumplePersonal">Cumpleañeros</a></li>
                          <li ><a href="#">Calendario</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reportes</span><span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li><a href="#">Curriculum</a></li>
                      </ul>
                  </li>

              </ul>

          </div>
      </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!-- <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> -->
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Personal UAB APP.</span>
                </li>

                <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>Home
                  </a>
                </li>
                <li>
                    <a href="index.php?modo=salir">
                        <i class="fa fa-sign-out"></i> Cerrar Sesion
                    </a>
                </li>

            </ul>

        </nav>
        </div>
