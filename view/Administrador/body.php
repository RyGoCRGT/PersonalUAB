<?php
$fecha=date( "d/m/Y");
include '../../model/conexion.php';
include '../../model/TipoNoticia.php';
include '../../model/TipoNoticiaConsulta.php';
include '../../model/TipoUsuario.php';
include '../../model/TipoUsuarioConsulta.php';
include '../../model/Noticia.php';
include '../../model/NoticiaConsulta.php';
include '../../controller/TipoUsuarioControlador.php';
include '../../controller/TipoNoticiaControlador.php';
include '../../controller/NoticiaControlador.php';

$conexion = new Conexion();

$tipoNoticiaManejador = new TipoNoticiaControlador($conexion);
$listaTipoNoticia = $tipoNoticiaManejador->listar();

$tipoUsuario = new TipoUsuarioControlador($conexion);
$listaTipoUsuario = $tipoUsuario->listar();

$noticias = new NoticiaControlador($conexion);
$listaNoticias = $noticias->listar();

?>
<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3 col-md-9">
          <h2>Bienvenido </h2>
          <small>Al sistema de control de Personal UAB.</small>

      </div>
        <!-- <button type="button" class="btn btn-primary btn-lg btn3d"> -->
          <div class="col-sm-3 col-md-3" style="background:#d5dce4" >

        <div class="text-center">
          <h2><?php echo $fecha; ?> </h2>
          <h3> FECHA <i class="fa fa-calendar"></i></h3>
        </div>
      </div>
      <!-- </button> -->

  </div>


  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"><hr>
      <a id="verFrmPublicacion" class="btn btn-success btn-lg" style="width: 50px;height: 50px;padding: 10px 16px;font-size: 18px;line-height: 1.33;border-radius: 25px;" data-toggle="tooltip" title="Publicar"><i class="fa fa-newspaper-o"></i></a>
      <a id="cerrarFrmPublicacion" class="btn btn-danger btn-lg" style="width: 50px;height: 50px;padding: 10px 16px;font-size: 18px;line-height: 1.33;border-radius: 25px;" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></a>
      <div id="publicarNoticia" class="wrapper wrapper-content animated fadeInRight">
        <form id="frmNuevaNoticia" class="ibox-content forum-post-container">
          <div class="row">
            <div class="col-sm-12 col-md-12">

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Tipo de Publicacion</label>
                    <select class="selectpicker form-control show-tick" name="tipoNoticia" title="Tipo de Noticia" required>
                      <?php foreach ($listaTipoNoticia as $key => $tipoNoticia): ?>
                        <option value="<?php echo $tipoNoticia->IdTipoNoticia ?>"><?php echo $tipoNoticia->NombreTipoNoticia ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Especificacion Usuario</label>
                    <select  class="selectpicker form-control show-tick" name="especificacionUsuario" title="Especificacion de Usuario" required>
                      <option value="0">Todos</option>
                      <?php foreach ($listaTipoUsuario as $listaTU): ?>
                        <option value="<?php echo $listaTU->IdTipoUsuario; ?>"><?php echo $listaTU->NombreTipoUsuario; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-sm-6 col-md-6 ">
                  <center>
                    <div class="imgFoto" style="cursor:pointer">
                      <input id="fotoPersonal" type="file" style="opacity:0" class="form-control" name="rutaImagen" >
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

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" name="titulo" style="border-radius:8px" required>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Contenido</label>
                    <textarea class="form-control" style="resize:none; border-radius:8px" name="contenido" rows="8" cols="80" required></textarea>
                  </div>
                </div>
              </div>
               <div class="pull-right">
                 <button type="submit" name="duardar" class="btn btn-primary">PUBLICAR</button>
               </div>
            </div>
          </div>
        </form>
      </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Publicaiones </span> /<span class="text-muted">Semana</span></h4>
                </div>
                <div  id="respuestaPublicacionesSemana">

                    <?php foreach ($listaNoticias as $key => $noticia): ?>
                      <?php
                      list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $noticia->RutaImagen);
                      ?>
                      <div class="thumbnail">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="text-center">
                              <h4><i><?php echo $noticia->C_TipoNoticia ?></i></h4>
                            </div>
                            <center><img src="‪<?php echo "../../../".$ruta ?>" class="img img-responsive img-rounded" alt="imagen" height="100%" width="100%"></center>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="text-center">
                                  <h3><strong><?php echo $noticia->Titulo ?></strong></h3>
                            </div>
                            <div class="contenidoNoticia" style="height:150px;overflow-y:scroll;">
                              <?php echo "<p>{$noticia->Contenido}</p>" ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-birthday-cake"></i> Cumpleañeros </span> /<span class="text-muted">Mes</span></h4>
                </div>
                <link href="../libs/css/font-awesome/css/miestilo.css" rel="stylesheet">
                            <div class="card hovercard">
                                <div class="cardheader" >

                                </div>
                                <div class="avatar">
                                    <img src="../libs/multimedia/img/design/PastelHB.png">
                                </div>
                                <div class="info text-center">
                                    <a href="index.php?modo=cumplePersonal" class="btn btn-primary"><span class="fa fa-birthday-cake"></span> VER</a><br>
                                </div>

                              </div>
            </div>
        </div>
    </div>





</div>

</div>

<!-- <div class="container">
  <h2>Responsive Embed</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="../libs/comercial.pdf"></iframe>
  </div>
</div> -->
