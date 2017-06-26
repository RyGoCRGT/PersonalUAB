<?php
include '../../model/conexion.php';
include '../../model/TipoPersonal.php';
include '../../model/TipoPersonalConsulta.php';
include '../../controller/TipoPersonalControlador.php';

$conexion = new Conexion();

//$estadoCivil = new CtrEstadoCivil($conexion);
//$listaEstadoCivil = $estadoCivil->listar();

?>

<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Tabla de Calificación de Méritos Docente </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Registro </span> /<span class="text-muted">Calificación de Méritos Docente</span></h4>
                </div>

                <div>
                    <div class="panel with-nav-tabs panel-info">
                        <div class="panel-heading" style="background:rgb(26, 74, 101)">
                            <ul class="nav nav-tabs" >
                                <li id="TablaMeritosDocenteLI"><a style="color:white" href="#HojaVida" data-toggle="tab">Tabla de Calificación de Méritos Docente</a>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-body" style="display: block;">
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="registrarMerito">
                                <div class="thumbnail">
                                    <div class="text-center">
                                      <h3>Registro de Tabla de Calificación de Méritos Docente</h3>
                                    </div>
                                    <form id="frmRegistrarMeritoDocente" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="col-sm-1 col-md-2"></div>

                                        <div class="col-sm-10 col-md-8">
                                          <div class="form-group">
                                                        <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2">
                                                          <i class="fa fa-user"></i>
                                                         </span>
                                                        <input type="file" name="archivo" id="archivo" required />
                                          </div>

                                          <div class="form-group">
                                                <input type="hidden" name="datos" value="1">
                                                <div id="mesajePersona"></div>
                                                <div class="pull-right">
                                                      <button type="submit" name="guardarMerito" id="guardarMerito" class="btn btn-primary">Grabar</button>
                                                </div>
                                                <br><br>
                                          </div>
                                          <div class="col-sm-1 col-md-2"></div>
                                        </div>
                                    </form>
                                </div><!-- end  <div class="thumbnail">-- >
                              </div> <!--<div class="tab-pane fade in active" id="General">-->
                          </div><!--END <div class="tab-content">-->
                        </div><!-- END <div class="panel-body" style="display: block;">-->
                    </div> <!--<div class="panel with-nav-tabs panel-info">-->
                </div>
    </div>
</div>

</div>



