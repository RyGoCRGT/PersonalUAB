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
include '../../model/EstructuraMeritos.php';
include '../../model/EstructuraMeritosConsulta.php';
include '../../model/ExperienciaLaboral.php';
include '../../model/ExperienciaLaboralConsulta.php';
include '../../model/EvaluacionMeritosDocenteProfesor.php';
include '../../model/EvaluacionMeritosDocenteProfesorConsulta.php';
include '../../controller/PersonaControlador.php';
include '../../controller/PersonalControlador.php';
include '../../controller/ReferenciaPersonalControlador.php';
include '../../controller/TelefonoControlador.php';
include '../../controller/ConyuguePersonalControlador.php';
include '../../controller/HijosPersonalControlador.php';
include '../../controller/CursoEstudiadoControlador.php';
include '../../controller/TituloProfesionalControlador.php';
include '../../controller/ExperienciaLaboralControlador.php';
include '../../controller/EvaluacionMeritosDocenteProfesorControlador.php';

$conexion = new Conexion();
$consulta = new PersonaConsulta($conexion);

$idPersona = $consulta->obtenerIdPersona($_POST['ciPersonal']);

$personalManejador = new PersonalControlador($conexion);

$personal = $personalManejador->ver($idPersona['idPersona']);

?>

<div class="container" id="contenidoAll">
  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2><strong>Hoja de Vida de: </strong><?php echo "{$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre} {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno}" ?></h2>
      </div>

  </div>
  <hr>
  <div class="row">
    <div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
      <div id="controls-left">
        <hr>
        <div style="background:white; border: 2px solid rgb(53, 92, 129); border-radius: 12px;">
          <center>
            <a data-toggle="tooltip" title="Titulos Profesionales">
              <img src="../libs/multimedia/img/design/mortarboard.png" class="click-titulos img img-responsive" alt="" width="100" height="100">
            </a>
          </center>
        </div>
        <hr>
        <div style="background:white; border: 2px solid rgb(53, 92, 129); border-radius: 12px;">
          <center>
            <a data-toggle="tooltip" title="Cursos Estudiadados">
              <img src="../libs/multimedia/img/design/passport.png" class="click-cursos img img-responsive" alt="" width="100" height="100">
            </a>
          </center>
        </div>
        <hr>
      </div>
    </div>
    <div class="col-xs-11 col-sm-11 col-md-10 col-lg-10">

      <div id="controls-center">
        <hr>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
            <div style="background:white; border: 2px solid rgb(53, 92, 129); border-radius: 12px;">
              <center>
                <a data-toggle="tooltip" title="Titulos Profesionales">
                  <img src="../libs/multimedia/img/design/mortarboard.png" class="click-titulos img img-responsive" alt="" width="250" height="250">
                </a>
              </center>
            </div>

          </div>

          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
            <div style="background:white; border: 2px solid rgb(53, 92, 129); border-radius: 12px;">
              <center>
                <a data-toggle="tooltip" title="Cursos Estudiadados">
                  <img src="../libs/multimedia/img/design/passport.png" class="click-cursos img img-responsive" alt="" width="250" height="250">
                </a>
              </center>
            </div>
          </div>
        </div>
        <hr>
      </div>

      <div class="panel panel-default" id="cursos">
        <div class="panel-heading">
          <h3 class="panel-tittle">Cursos Estudiados</h3>
        </div>
        <div class="panel-body">

          <div class="text-center">
            <a class=" btn btn-default" href="#myCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class=" btn btn-default" href="#myCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <hr>

          <div id="myCarousel" data-interval="false" class="carousel slide" data-ride="carousel" style="border-left: 6px solid rgb(36, 67, 128); background-color: lightgrey;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php $i = 0; foreach ($personal->ListaCursos as $key => $cursos):?>
                <?php if ($i == 0): ?>
                  <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" class="active"></li>
                <?php else: ?>
                  <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>"></li>
                <?php endif; ?>
              <?php $i++; endforeach; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

              <?php $i = 0; foreach ($personal->ListaCursos as $key => $cursos):
                  list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $cursos->RespaldoTituloPDF);
                ?>
                <?php if ($i == 0): ?>
                  <div class="item active" style="cursor:pointer" data-toggle="modal" data-target="#curso<?php echo $cursos->IdCursoEstudiado ?>">
                    <img src="‪<?php echo "../../../".$ruta ?>" alt="Image" class="img img-responsive img-rounded">
                    <div class="carousel-caption img-rounded">
                      <h4><?php echo $cursos->CursoEstudiado ?></h4>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="item" style="cursor:pointer" data-toggle="modal" data-target="#curso<?php echo $cursos->IdCursoEstudiado ?>">
                    <img src="‪<?php echo "../../../".$ruta ?>" alt="Image" class="img img-responsive img-rounded">
                    <div class="carousel-caption img-rounded">
                      <h4><?php echo $cursos->CursoEstudiado ?></h4>
                    </div>
                  </div>
                <?php endif; ?>

                <div class="modal fade" id="curso<?php echo $cursos->IdCursoEstudiado ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Curso Estudiado </h3>
                      </div>
                      <div class="modal-body">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3><?php echo $cursos->CursoEstudiado ?></h3>
                          </div>
                          <div class="panel-body">
                            <center>
                              <img src="‪<?php echo "../../../".$ruta ?>" alt="Image" class="img img-responsive img-rounded">
                            </center>
                            <hr>
                            <p><strong>Nombre de Curso Estudiado: </strong><?php echo $cursos->CursoEstudiado ?></p>
                            <p><strong>Nombre Institucion: </strong><?php echo $cursos->NombreInstitucion ?></p>
                            <p><strong>Año de Estudio: </strong><?php echo $cursos->AnhoEstudio ?></p>
                            <p><strong>Religion de la Institucion: </strong><?php echo $cursos->ReligionInstitucion ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                </div>

              <?php $i++; endforeach; ?>

            </div>

          </div>

        </div>
      </div>

      <div class="panel panel-default" id="titulos">
        <div class="panel-heading">
          <h3 class="panel-tittle">Titulos Profesionales</h3>
        </div>
        <div class="panel-body">

          <div class="text-center">
            <a class=" btn btn-default" href="#myCarouselTitulos" role="button" data-slide="prev">
              <span class="fa fa-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class=" btn btn-default" href="#myCarouselTitulos" role="button" data-slide="next">
              <span class="fa fa-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <hr>

          <div id="myCarouselTitulos" data-interval="false" class="carousel slide" data-ride="carousel" style="border-left: 6px solid rgb(36, 67, 128); background-color: lightgrey;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php $i = 0; foreach ($personal->ListaCursos as $key => $cursos):?>
                <?php if ($i == 0): ?>
                  <li data-target="#myCarouselTitulos" data-slide-to="<?php echo $i ?>" class="active"></li>
                <?php else: ?>
                  <li data-target="#myCarouselTitulos" data-slide-to="<?php echo $i ?>"></li>
                <?php endif; ?>
              <?php $i++; endforeach; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

              <?php $i = 0; foreach ($personal->ListaTitulos as $key => $titulos):
                  list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $titulos->RespaldoTituloPDF);
                ?>
                <?php if ($i == 0): ?>
                  <div class="item active" style="cursor:pointer" data-toggle="modal" data-target="#titulos<?php echo $titulos->IdTituloProfesional ?>">
                    <img src="‪<?php echo "../../../".$ruta ?>" alt="Image" class="img img-responsive img-rounded">
                    <div class="carousel-caption img-rounded">
                      <h4><?php echo $titulos->CursoProfesionalEstudiado ?></h4>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="item" style="cursor:pointer" data-toggle="modal" data-target="#titulos<?php echo $titulos->IdTituloProfesional ?>">
                    <img src="‪<?php echo "../../../".$ruta ?>" alt="Image" class="img img-responsive img-rounded">
                    <div class="carousel-caption img-rounded">
                      <h4><?php echo $titulos->CursoProfesionalEstudiado ?></h4>
                    </div>
                  </div>
                <?php endif; ?>

                <div class="modal fade" id="titulos<?php echo $titulos->IdTituloProfesional ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title text-center"> <i class="fa fa-user"></i> Curso Estudiado </h3>
                      </div>
                      <div class="modal-body">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3><?php echo $titulos->CursoProfesionalEstudiado ?></h3>
                          </div>
                          <div class="panel-body">
                            <center>
                              <img src="‪<?php echo "../../../".$ruta ?>" alt="Image" class="img img-responsive img-rounded">
                            </center>
                            <hr>
                            <p><strong>Tipo de Titulo Profesional: </strong><?php
                              switch ($titulos->IdTipoTituloProfesional)
                              {
                                case '1':
                                  echo "LICENCIATURA";
                                  break;
                                case '2':
                                  echo "DIPLOMADO";
                                  break;
                                case '3':
                                  echo "MAESTRIA";
                                  break;
                                case '4':
                                  echo "DOCTORADO";
                                  break;
                              }
                            ?></p>
                            <p><strong>Nombre de Titulo Profesional: </strong><?php echo $titulos->CursoProfesionalEstudiado ?></p>
                            <p><strong>Nombre Institucion: </strong><?php echo $titulos->NombreInstitucion ?></p>
                            <p><strong>Tiempo de Estudio: </strong><?php echo $titulos->TiempoEstudio ?></p>
                            <p><strong>Religion de la Institucion: </strong><?php echo $titulos->ReligionInstitucion ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                </div>

              <?php $i++; endforeach; ?>

            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>
