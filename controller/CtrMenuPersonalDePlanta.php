<?php


class CtrMenuPersonalDePlanta
{

  private $Modo;

  public function __construct($modo)
  {
    $this->Modo = $modo;
  }

  public function Menu()
  {

    switch ($this->Modo) {

      case 'verArchivo':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Archivo.php';
          include '../../model/ArchivoConsulta.php';
          include '../../controller/ArchivoControlador.php';

          $conexion = new Conexion();

          $archivoManejador = new ArchivoControlador($conexion);
          $archivo = $archivoManejador->ver($_POST['id']);
          include 'vistaDocumento.php';
        }
        else
        {
          echo "<h2><strong>Ah Ocurrido un ERROR al GUARDAR</strong></h2>";
        }
        break;

      case 'documentos':
        include 'header.php';
        include 'bodyDocumentos.php';
        include 'footer.php';
        break;

        case 'autoEvaluarMerito':

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

          $idPersona = $consulta->obtenerIdPersona($_POST['ciNit']);

          $personalManejador = new PersonalControlador($conexion);

          $personal = $personalManejador->ver($idPersona['idPersona']);

          $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
          $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritosSegunPersonal($_POST['tipoPersonal']);

          if ($meritos)
          {
            $evaluacionManejador = new EvaluacionMeritosDocenteProfesorControlador($conexion);
            $evaluacion = $evaluacionManejador->listaAutoEvalucionPersonal($personal->IdPersonal);

            ?>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Tabla de Meritos</h3>
                  </div>
                  <div class="panel-body">
                    <form id="guardarAutoCalificacion">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered">

                          <?php $contador = 1; foreach ($meritos as $categoria): ?>

                            <thead>
                              <tr>
                                <th><?php echo $contador ?></th>
                                <th style="max-width:300px"><?php echo "{$categoria->NombreMerito} ({$categoria->PuntajeMerito} puntos)" ?></th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>

                            <?php $subcontador = 1; foreach ($categoria->SubMeritos as $merito):
                               $encontrado = false; ?>
                              <tbody>
                                <tr>
                                  <td><?php echo "{$contador}.{$subcontador}" ?></td>
                                  <td><?php echo $merito->NombreMerito ?></td>
                                  <td><?php echo $merito->PuntajeMerito ?></td>
                                  <input type="hidden" class="idMerito" name="idMerito[]" value="<?php echo $merito->IdEstructuraMerito ?>">
                                  <?php foreach ($evaluacion as $eval): ?>
                                    <?php if ($eval->IdEstructuraMerito == $merito->IdEstructuraMerito): ?>
                                      <td><input type="text" class="form-control puntaje" name="puntajeMerito[]" value="<?php echo $eval->PuntajeMerito ?>"></td>
                                      <?php $encontrado = true;
                                      break;
                                     endif; ?>
                                  <?php endforeach;
                                  if ($encontrado == false) {
                                    ?>
                                    <td><input type="text" class="form-control puntaje" name="puntajeMerito[]" value="0"></td>
                                    <?php
                                  }
                                  ?>

                                </tr>
                              </tbody>

                            <?php $subcontador++; endforeach; ?>

                          <?php $contador++; endforeach; ?>
                        </table>
                        <div class="pull-right">
                          <strong>Total Puntos Meritos: </strong> <input type="text" class="form-control puntajeTotal" id="puntajeTotal" name="puntajeTotal" value="0" readonly>
                        </div>
                        <input type="hidden" name="idPersonal" value="<?php echo $personal->IdPersonal ?>">
                        <br><br><br><br>
                        <div class="pull-right">
                          <button type="submit" class="btn btn-success btn-lg" name="guardar">Guardar Evaluacion <i class="fa fa-paper-plane"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Hoja de Vida Personal</h3>
                  </div>
                  <div class="panel-body">
                    <?php $i = 1; ?>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover table-bordered table-center">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>#</th>
                                  <th>Nombre Curso</th>
                                  <th>Institucion</th>
                                  <th>Religion Institucion</th>
                                  <th>Año de Estudio</th>
                                </tr>
                              </thead>
                              <tbody>
                                <div class="text-center"><strong>CURSOS ESTUDIADOS</strong></div><br>
                                <?php foreach ($personal->ListaCursos as $cursos): ?>
                                  <tr class="action">
                                    <td><input type="checkbox" class="control"  name="control[]" value="1"></td>
                                    <td><?php echo $i ?></td>
                                    <td class="text-center"><?php echo $cursos->CursoEstudiado ?></td>
                                    <td class="text-center"><?php echo $cursos->NombreInstitucion ?></td>
                                    <td class="text-center"><?php echo $cursos->ReligionInstitucion ?></td>
                                    <td class="text-center"><?php echo $cursos->AnhoEstudio ?></td>
                                  </tr>
                                <?php $i++; endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <?php $i = 1; ?>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover table-bordered table-center">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>#</th>
                                  <th>Nombre Titulo</th>
                                  <th>Institucion</th>
                                  <th>Religion Institucion</th>
                                  <th>Tiempo de Estudio(Años)</th>
                                </tr>
                              </thead>
                              <tbody>
                                <div class="text-center"><strong>TITULOS QUE POSEE</strong></div><br>
                                <?php foreach ($personal->ListaTitulos as $titulos): ?>
                                  <tr class="action">
                                    <td><input type="checkbox" class="control"  name="control[]" value="1"></td>
                                    <td><?php echo $i ?></td>
                                    <td class="text-center"><?php echo $titulos->CursoProfesionalEstudiado ?></td>
                                    <td class="text-center"><?php echo $titulos->NombreInstitucion ?></td>
                                    <td class="text-center"><?php echo $titulos->ReligionInstitucion ?></td>
                                    <td class="text-center"><?php echo $titulos->TiempoEstudio ?></td>
                                  </tr>
                                <?php $i++; endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <?php $i = 1; ?>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered">
                            <thead>
                              <tr>
                                <th></th>
                                <th>#</th>
                                <th>Cargo/Responsabilidad</th>
                                <th>Institucion</th>
                              </tr>
                            </thead>
                            <tbody>
                              <div class="text-center"><strong>Experiencia Laboral</strong></div><br>
                              <?php foreach ($personal->ListaExperinciaLaboral as $listaE): ?>
                                <tr class="action">
                                  <td><input type="checkbox" class="control" name="control[]" value="1"></td>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $listaE->CargoResponsabilidad; ?></td>
                                  <td><?php echo $listaE->NombreInstitucion; ?></td>
                                </tr>
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
            <div class="mensajeCalificacion" id="mensajeCalificacion">

            </div>
            <script src="../libs/js/controlMeritos.js"></script>
            <script src="../libs/js/guardarCalificacion.js"></script>
            <script src="../libs/js/autosuma.js"></script>
            <?php
          }
          else
          {
            echo "<div class='text-center' style='color:red'><h2><strong>No existe Evaluacíon Asignada</strong></h2></div>";
          }
          break;

      case 'editarDatos':
        include 'header.php';
        include 'bodyEditarPersonal.php';
        include 'footer.php';
        break;

      case 'directorio':
        include 'header.php';
        include 'bodyDirectorio.php';
        include 'footer.php';
        break;

      case 'cumplePersonal':
        include 'header.php';
        include 'bodyCumple.php';
        include 'footer.php';
        break;

      case 'salir':
          session_start();
          session_destroy();
          header("Location: ../../index.php");
          break;

      case 'addNewLugarExpedicion':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/LugarExpedicion.php';
          include '../../model/LugarExpedicionConsulta.php';
          include '../../controller/CtrLugarExpedicion.php';
          $conexion = new Conexion();
          $lugarExpedicion = new CtrLugarExpedicion($conexion);
          $lugarExpedicion->crear();
        }
        break;

      case 'addNewNacionalidad':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Nacion.php';
          include '../../model/NacionConsulta.php';
          include '../../controller/NacionControlador.php';
          $conexion = new Conexion();
          $lugarExpedicion = new NacionControlador($conexion);
          $lugarExpedicion->crear();
        }
        break;

      case 'addNewCiudad':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Ciudad.php';
          include '../../model/CiudadConsulta.php';
          include '../../controller/CiudadControlador.php';
          $conexion = new Conexion();
          $ciudad = new CiudadControlador($conexion);
          $ciudad->crear();
        }
        break;

      case 'addNewReligion':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Religion.php';
          include '../../model/ReligionConsulta.php';
          include '../../controller/ReligionControlador.php';
          $conexion = new Conexion();
          $religion = new ReligionControlador($conexion);
          $religion->crear();
        }
        break;

      case 'addNewSeguro':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Seguro.php';
          include '../../model/SeguroConsulta.php';
          include '../../controller/SeguroControlador.php';
          $conexion = new Conexion();
          $seguro = new SeguroControlador($conexion);
          $seguro->crear();
        }
        break;

      case 'addNewAfp':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Afp.php';
          include '../../model/AfpConsulta.php';
          include '../../controller/AfpControlador.php';
          $conexion = new Conexion();
          $afp = new AfpControlador($conexion);
          $afp->crear();
        }
        break;

      case 'addNewEnfermedad':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Enfermedad.php';
          include '../../model/EnfermedadConsulta.php';
          include '../../controller/EnfermedadControlador.php';
          $conexion = new Conexion();
          $enfermedad = new EnfermedadControlador($conexion);
          $enfermedad->crear();
        }
        break;

      case 'addNewDeporte':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Deporte.php';
          include '../../model/DeporteConsulta.php';
          include '../../controller/DeporteControlador.php';
          $conexion = new Conexion();
          $deporte = new DeporteControlador($conexion);
          $deporte->crear();
        }
        break;

      case 'personalEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Personal.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();

          $personalManejador = new PersonalControlador($conexion);
          $respuesta = $personalManejador->editar();
          echo $respuesta;
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaConyugueEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ConyuguePersonal.php';
          include '../../model/ConyuguePersonalConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/ConyuguePersonalControlador.php';
          $conexion = new Conexion();

          $conyugueManajador = new ConyuguePersonalControlador($conexion);
          $conyugueManajador->editar();
          echo "<p style='color:green'>Cambio Exitoso</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'telefonoAdd':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->crearT();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'telefonoDelete':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->borrar();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personalELab':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ExperienciaLaboral.php';
          include '../../model/ExperienciaLaboralConsulta.php';
          include '../../controller/ExperienciaLaboralControlador.php';
          $conexion = new Conexion();

          $manejadorExperencia = new ExperienciaLaboralControlador($conexion);
          $manejadorExperencia->crear();
        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario</p>";
        }
        break;

      case 'personalCursos':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/CursoEstudiado.php';
          include '../../model/CursoEstudiadoConsulta.php';
          include '../../controller/CursoEstudiadoControlador.php';
          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonaCurso']);

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/";
          $target_path = $target_path . basename( "curso-".$_POST['cursoEstudiado']."-{$_POST['anhoEstudioCuso']}-".$_POST['nombreInstitucionCursos']."-".strtoupper($_POST['ciPersonaCurso']).".jpg");


          $a=move_uploaded_file($_FILES["respaldoCursos"]["tmp_name"], $target_path);

          $cursoEstudiado = new CursoEstudiado();

          $cursoEstudiado->IdPersonal = $idPersonal['idPersonal'];
          $cursoEstudiado->NombreInstitucion = $_POST['nombreInstitucionCursos'];
          $cursoEstudiado->CursoEstudiado = $_POST['cursoEstudiado'];
          $cursoEstudiado->AnhoEstudio = $_POST['anhoEstudioCuso'];
          $cursoEstudiado->ReligionInstitucion = $_POST['religionInstCurso'];
          $cursoEstudiado->RespaldoTituloPDF = $target_path;

          $cursoEstudiadoManejador = new CursoEstudiadoControlador($conexion);
          $cursoEstudiadoManejador->crear($cursoEstudiado);

          $listaCursoEstudiado = $cursoEstudiadoManejador->listarPer($cursoEstudiado->IdPersonal);
          $i = 0;
          ?>
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso</th>
                  <th>Institucion</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaCursoEstudiado as $listaCE): $i++;?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $listaCE->CursoEstudiado; ?></td>
                    <td><?php echo $listaCE->NombreInstitucion; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php

        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario</p>";
        }
        break;

      case 'personalTitulos':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/TituloProfesional.php';
          include '../../model/TituloProfesionalConsulta.php';
          include '../../controller/TituloProfesionalControlador.php';
          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonaTitulo']);

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/respaldoPersonal/";
          $target_path = $target_path . basename( "titulo-".$_POST['cursoProfesionalEstudiado']."-{$_POST['nombreInstitucionTitulos']}-".$_POST['tipoTituloProfesional']."-".strtoupper($_POST['ciPersonaTitulo']).".jpg");

          $a=move_uploaded_file($_FILES["respaldoTitulo"]["tmp_name"], $target_path);

          $tituloProfesional = new TituloProfesional();

          $tituloProfesional->IdTipoTituloProfesional = $_POST['tipoTituloProfesional'];
          $tituloProfesional->IdPersonal = $idPersonal['idPersonal'];
          $tituloProfesional->NombreInstitucion = $_POST['nombreInstitucionTitulos'];
          $tituloProfesional->CursoProfesionalEstudiado = $_POST['cursoProfesionalEstudiado'];
          $tituloProfesional->TiempoEstudio = $_POST['anhoEstudioTitulo'];
          $tituloProfesional->ReligionInstitucion = $_POST['religionInstTitulo'];
          $tituloProfesional->RespaldoTituloPDF = $target_path;

          $tituloProfesionalManejador = new TituloProfesionalControlador($conexion);
          $tituloProfesionalManejador->crear($tituloProfesional);

          $listaTituloProfesional = $tituloProfesionalManejador->listarPer($tituloProfesional->IdPersonal);
          $i = 0;
          ?>
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso Profesional</th>
                  <th>Institucion</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaTituloProfesional as $listaTP): $i++;?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $listaTP->CursoProfesionalEstudiado; ?></td>
                    <td><?php echo $listaTP->NombreInstitucion; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php

        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario</p>";
        }
        break;

        case 'personaReferenciaEditar':
          if ($_POST)
          {
            include '../../model/conexion.php';
            include '../../model/Persona.php';
            include '../../model/PersonaConsulta.php';
            include '../../model/PersonalConsulta.php';
            include '../../model/ReferenciaPersonal.php';
            include '../../model/Telefono.php';
            include '../../model/TelefonoConsulta.php';
            include '../../controller/PersonaControlador.php';
            include '../../controller/ReferenciaPersonalControlador.php';
            include '../../controller/TelefonoControlador.php';

            $conexion = new Conexion();

            $personaManejador = new ReferenciaPersonalControlador($conexion);
            $personaManejador->editar();

            echo "<p style='color:green'>Guardado</p>";
          }
          else
          {
            echo "<p style='color:red'>Error al Enviar Formulario</p>";
          }
          break;

      case 'personaReferenciaInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonReferencia'].$_POST['primerNombreRef'].$_POST['segundoNombreRef'];
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ReferenciaPersonal.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/ReferenciaPersonalControlador.php';
          include '../../controller/TelefonoControlador.php';

          $conexion = new Conexion();
          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreRef']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreRef']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoRef']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoRef']));
          $persona->CI = strtoupper($ci);

          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idReferenciaPersona = $consulta->obtenerIdPersona($persona->CI);//obteniendo id de persona referencia de personal

          // telefono
          $telefono = new Telefono();
          $telefono->IdPersona = $idReferenciaPersona['idPersona'];
          $telefono->NumeroTelefono = $_POST['telefonoReferencia'];
          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->crear($telefono);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonReferencia']);//obteniendo id de persona personal

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $referenciaPersonal = new ReferenciaPersonal();
          $referenciaPersonal->IdPersona = $idReferenciaPersona['idPersona'];
          $referenciaPersonal->IdPersonal = $idPersonal['idPersonal'];

          $referenciaPersonalManejador = new ReferenciaPersonalControlador($conexion);
          $referenciaPersonalManejador->crear($referenciaPersonal);

          echo "<p style='color:green'>Guardado</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaHijoEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/HijosPersonal.php';
          include '../../model/HijosPersonalConsulta.php';
          include '../../controller/HijosPersonalControlador.php';

          $conexion = new Conexion();
          $hijoManejador = new HijosPersonalControlador($conexion);
          $hijoManejador->editar();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaHijoInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonHijo'].$_POST['primerNombreHij'].$_POST['segundoNombreHij'];
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/HijosPersonal.php';
          include '../../model/HijosPersonalConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/HijosPersonalControlador.php';

          $conexion = new Conexion();
          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreHij']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreHij']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoHij']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoHij']));
          $persona->CI = strtoupper($ci);
          $persona->FechaNacimiento = $_POST['fechaNacimientoHij'];

          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idHijoPersona = $consulta->obtenerIdPersona($persona->CI);//obteniendo id de persona hijo de personal

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonHijo']);//obteniendo id de persona personal

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

          $hijoPersonal = new HijosPersonal();
          $hijoPersonal->IdPersona = $idHijoPersona['idPersona'];
          $hijoPersonal->IdPersonal = $idPersonal['idPersonal'];

          $hijoPersonalManejador = new HijosPersonalControlador($conexion);
          $hijoPersonalManejador->crear($hijoPersonal);

          $listaHijos = $hijoPersonalManejador->verHijos($idPersonal['idPersonal']);

          ?>
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <td>Nombres</td>
                  <td>Apellidos</td>
                  <td>Fecha Nacimiento</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaHijos as $hijo): ?>
                  <tr style="cursor:pointer" class="dataHijo" data-toggle="modal" data-target="#editarHijo">
                    <td><?php echo "{$hijo->IdPersona->PrimerNombre} {$hijo->IdPersona->SegundoNombre}" ?></td>
                    <td><?php echo "{$hijo->IdPersona->ApellidoPaterno} {$hijo->IdPersona->ApellidoMaterno}" ?></td>
                    <td><?php echo "{$hijo->IdPersona->FechaNacimiento}" ?></td>
                    <input class="idPersona" type="hidden" name="idPersona" value="<?php echo $hijo->IdPersona->IdPersona ?>">
                    <input class="idPersona" type="hidden" name="primerNombre" value="<?php echo $hijo->IdPersona->PrimerNombre ?>">
                    <input class="idPersona" type="hidden" name="segundoNombre" value="<?php echo $hijo->IdPersona->SegundoNombre ?>">
                    <input class="idPersona" type="hidden" name="apellidoPaterno" value="<?php echo $hijo->IdPersona->ApellidoPaterno ?>">
                    <input class="idPersona" type="hidden" name="apellidoMaterno" value="<?php echo $hijo->IdPersona->ApellidoMaterno ?>">
                    <input class="idPersona" type="hidden" name="fechaNacimiento" value="<?php echo $hijo->IdPersona->FechaNacimiento ?>">
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php

          echo "<p style='color:green'>Guardado</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

      case 'personaConyugueInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonConyu'].$_POST['primerNombreCon'].$_POST['segundoNombreCon'];
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ConyuguePersonal.php';
          include '../../model/ConyuguePersonalConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/ConyuguePersonalControlador.php';
          $conexion = new Conexion();
          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreCon']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreCon']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoCon']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoCon']));
          $persona->CI = strtoupper($ci);
          $persona->FechaNacimiento = $_POST['fechaNacimientoCon'];
          $persona->EstadoCivil = 2;

          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idConyuPersona = $consulta->obtenerIdPersona($persona->CI);//obteniendo id de persona pareja de personal

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonConyu']);//obteniendo id de persona personal

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);//obteniendo id personal mediante id persona

          $conyuguePersonal = new ConyuguePersonal();
          $conyuguePersonal->IdPersona = $idConyuPersona['idPersona'];
          $conyuguePersonal->IdPersonal = $idPersonal['idPersonal'];
          $conyuguePersonal->FechaMatrimonio = $_POST['fechaBautizmoCon'];

          $personalConyugueManajedor = new ConyuguePersonalControlador($conexion);
          $personalConyugueManajedor->crear($conyuguePersonal);

          echo "<p style='color:green'>Guardado Conyugue</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar Formulario</p>";
        }
        break;

        case 'autoEvaluarMerito':

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

          $idPersona = $consulta->obtenerIdPersona($_POST['ciNit']);

          $personalManejador = new PersonalControlador($conexion);

          $personal = $personalManejador->ver($idPersona['idPersona']);

          $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
          $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritosSegunPersonal($_POST['tipoPersonal']);

          if ($meritos)
          {
            $evaluacionManejador = new EvaluacionMeritosDocenteProfesorControlador($conexion);
            $evaluacion = $evaluacionManejador->listaAutoEvalucionPersonal($personal->IdPersonal);

            ?>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Tabla de Meritos</h3>
                  </div>
                  <div class="panel-body">
                    <form id="guardarAutoCalificacion">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered">

                          <?php $contador = 1; foreach ($meritos as $categoria): ?>

                            <thead>
                              <tr>
                                <th><?php echo $contador ?></th>
                                <th style="max-width:300px"><?php echo "{$categoria->NombreMerito} ({$categoria->PuntajeMerito} puntos)" ?></th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>

                            <?php $subcontador = 1; foreach ($categoria->SubMeritos as $merito):
                               $encontrado = false; ?>
                              <tbody>
                                <tr>
                                  <td><?php echo "{$contador}.{$subcontador}" ?></td>
                                  <td><?php echo $merito->NombreMerito ?></td>
                                  <td><?php echo $merito->PuntajeMerito ?></td>
                                  <input type="hidden" class="idMerito" name="idMerito[]" value="<?php echo $merito->IdEstructuraMerito ?>">
                                  <?php foreach ($evaluacion as $eval): ?>
                                    <?php if ($eval->IdEstructuraMerito == $merito->IdEstructuraMerito): ?>
                                      <td><input type="text" class="form-control puntaje" name="puntajeMerito[]" value="<?php echo $eval->PuntajeMerito ?>"></td>
                                      <?php $encontrado = true;
                                      break;
                                     endif; ?>
                                  <?php endforeach;
                                  if ($encontrado == false) {
                                    ?>
                                    <td><input type="text" class="form-control puntaje" name="puntajeMerito[]" value="0"></td>
                                    <?php
                                  }
                                  ?>

                                </tr>
                              </tbody>

                            <?php $subcontador++; endforeach; ?>

                          <?php $contador++; endforeach; ?>
                        </table>
                        <div class="pull-right">
                          <strong>Total Puntos Meritos: </strong> <input type="text" class="form-control puntajeTotal" id="puntajeTotal" name="puntajeTotal" value="0" readonly>
                        </div>
                        <input type="hidden" name="idPersonal" value="<?php echo $personal->IdPersonal ?>">
                        <br><br><br><br>
                        <div class="pull-right">
                          <button type="submit" class="btn btn-success btn-lg" name="guardar">Guardar Evaluacion <i class="fa fa-paper-plane"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Hoja de Vida Personal</h3>
                  </div>
                  <div class="panel-body">
                    <?php $i = 1; ?>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover table-bordered table-center">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>#</th>
                                  <th>Nombre Curso</th>
                                  <th>Institucion</th>
                                  <th>Religion Institucion</th>
                                  <th>Año de Estudio</th>
                                </tr>
                              </thead>
                              <tbody>
                                <div class="text-center"><strong>CURSOS ESTUDIADOS</strong></div><br>
                                <?php foreach ($personal->ListaCursos as $cursos): ?>
                                  <tr class="action">
                                    <td><input type="checkbox" class="control"  name="control[]" value="1"></td>
                                    <td><?php echo $i ?></td>
                                    <td class="text-center"><?php echo $cursos->CursoEstudiado ?></td>
                                    <td class="text-center"><?php echo $cursos->NombreInstitucion ?></td>
                                    <td class="text-center"><?php echo $cursos->ReligionInstitucion ?></td>
                                    <td class="text-center"><?php echo $cursos->AnhoEstudio ?></td>
                                  </tr>
                                <?php $i++; endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <?php $i = 1; ?>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover table-bordered table-center">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>#</th>
                                  <th>Nombre Titulo</th>
                                  <th>Institucion</th>
                                  <th>Religion Institucion</th>
                                  <th>Tiempo de Estudio(Años)</th>
                                </tr>
                              </thead>
                              <tbody>
                                <div class="text-center"><strong>TITULOS QUE POSEE</strong></div><br>
                                <?php foreach ($personal->ListaTitulos as $titulos): ?>
                                  <tr class="action">
                                    <td><input type="checkbox" class="control"  name="control[]" value="1"></td>
                                    <td><?php echo $i ?></td>
                                    <td class="text-center"><?php echo $titulos->CursoProfesionalEstudiado ?></td>
                                    <td class="text-center"><?php echo $titulos->NombreInstitucion ?></td>
                                    <td class="text-center"><?php echo $titulos->ReligionInstitucion ?></td>
                                    <td class="text-center"><?php echo $titulos->TiempoEstudio ?></td>
                                  </tr>
                                <?php $i++; endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <?php $i = 1; ?>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered">
                            <thead>
                              <tr>
                                <th></th>
                                <th>#</th>
                                <th>Cargo/Responsabilidad</th>
                                <th>Institucion</th>
                              </tr>
                            </thead>
                            <tbody>
                              <div class="text-center"><strong>Experiencia Laboral</strong></div><br>
                              <?php foreach ($personal->ListaExperinciaLaboral as $listaE): ?>
                                <tr class="action">
                                  <td><input type="checkbox" class="control" name="control[]" value="1"></td>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $listaE->CargoResponsabilidad; ?></td>
                                  <td><?php echo $listaE->NombreInstitucion; ?></td>
                                </tr>
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
            <div class="mensajeCalificacion" id="mensajeCalificacion">

            </div>
            <script src="../libs/js/controlMeritos.js"></script>
            <script src="../libs/js/guardarCalificacion.js"></script>
            <script src="../libs/js/autosuma.js"></script>
            <?php
          }
          else
          {
            echo "<div class='text-center' style='color:red'><h2><strong>No existe Evaluacíon Asignada</strong></h2></div>";
          }

          break;

      case 'puntuarAutoMeritoPersonal':
        if (isset($_POST['idPersonal']))
        {
          include '../../model/conexion.php';
          include '../../model/EvaluacionMeritosDocenteProfesor.php';
          include '../../model/EvaluacionMeritosDocenteProfesorConsulta.php';
          include '../../controller/EvaluacionMeritosDocenteProfesorControlador.php';
          $conexion =  new Conexion();
          $evaluacionMeritos = new EvaluacionMeritosDocenteProfesorControlador($conexion);
          $evaluacionMeritos->crearAuto();
        }
        else
        {
          echo "<p style='color:red'>Error al Enviar</p>";
        }
        break;

      case 'personaEditar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $personaManejador = new PersonaControlador($conexion);
          $respuesta = $personaManejador->editar();
          /*
          1. Sin Modificacion
          2. Existe Persona
          3. Guardado Exitoso
          4. Error Guardar
          */
          echo $respuesta;

        }
        else
        {
          echo "<p style='color:red'>Error al enviar datos</p>";
        }
        break;

      default:

        include 'header.php';
        include 'body.php';
        include 'footer.php';

        break;
    }


  }


}


?>
