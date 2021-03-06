<?php


class CtrMenuAdmin
{

  private $Modo;

  public function __construct($modo)
  {
    $this->Modo = $modo;
  }

  public function Menu()
  {

    switch ($this->Modo) {

      case 'listaPersonal':
        include 'header.php';
        include 'bodylistPers.php';
        include 'footer.php';
        break;

      case 'puntuarMeritoPersonal':
        if (isset($_POST['idPersonal']))
        {
          include '../../model/conexion.php';
          include '../../model/EvaluacionMeritosDocenteProfesor.php';
          include '../../model/EvaluacionMeritosDocenteProfesorConsulta.php';
          include '../../controller/EvaluacionMeritosDocenteProfesorControlador.php';
          $conexion =  new Conexion();
          $evaluacionMeritos = new EvaluacionMeritosDocenteProfesorControlador($conexion);
          $evaluacionMeritos->crear();
        }
        else
        {
          echo "<p style='color:red'> Se Requere de un Personal</p>";
        }
        break;

      case 'evaluacionMeritos':
        if (isset($_POST['datos']))
        {
          include 'header.php';
          include 'bodyEvaluacionMeritos.php';
          include 'footer.php';
        }
        else
        {
          header("Location: index.php?modo=listaPersonal");
        }
        break;

      case 'listaUsuario':
        include 'header.php';
        include 'bodylistaUsuario.php';
        include 'footer.php';
          break;

      case 'regPersonal':
          include 'header.php';
          include 'bodyRegPers.php';
          include 'footer.php';
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

      case 'verPersonal':
        if (isset($_POST['datos']))
        {
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

          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonalDetalle']);
          // $idPersona = $consulta->obtenerIdPersona(7548743);
          //
          // $consul = new PersonalConsulta($conexion);
          //
          // $idPersonal = $consul->datosPersonal($idPersona['idPersona']);// COMEMTAR

          $personalManejador = new PersonalControlador($conexion);

          $personal = $personalManejador->ver($idPersona['idPersona']);

          include 'modalDetallePersonal.php';

        }
        else
        {
          echo "<p style='color:red'>Error al ver Formulario Detalle</p>";
        }
        break;

      case 'personaReferenciaInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonReferencia'].$_POST['primerNombreRef'];
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

      case 'personaHijoInsertar':
        if (isset($_POST['datos']))
        {
          $ci = $_POST['ciPersonHijo'].$_POST['primerNombreHij'];
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
                  <tr>
                    <td><?php echo "{$hijo->IdPersona->PrimerNombre} {$hijo->IdPersona->SegundoNombre}" ?></td>
                    <td><?php echo "{$hijo->IdPersona->ApellidoPaterno} {$hijo->IdPersona->ApellidoMaterno}" ?></td>
                    <td><?php echo "{$hijo->IdPersona->FechaNacimiento}" ?></td>
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
          $ci = $_POST['ciPersonConyu'].$_POST['primerNombreCon'];
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

      case 'personaInsertar':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/TelefonoControlador.php';
          $conexion = new Conexion();

          $persona = new Persona();
          $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombre']));
          $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombre']));
          $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaterno']));
          $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaterno']));
          $persona->CI = strtoupper($_POST['ciNit']);
          $persona->LugarExpedicion = ucwords(strtolower($_POST['lugarExpedicion']));
          $persona->FechaNacimiento = $_POST['fechaNac'];
          $persona->Sexo = strtoupper($_POST['sexo']);
          $persona->EstadoCivil = ucwords(strtolower($_POST['estadoCivil']));
          $personaManejador = new PersonaControlador($conexion);
          $personaManejador->crear($persona);

          $consulta = new PersonaConsulta($conexion);

          $idP = $consulta->obtenerIdPersona($persona->CI);

          $telefono = new Telefono();
          $telefono->IdPersona = $idP['idPersona'];
          $telefono->NumeroTelefono = $_POST['telefono'];
          $telefonoManejador = new TelefonoControlador($conexion);
          $telefonoManejador->crear($telefono);

          echo "<p style='color:green'>Guardado Exitoso</p>";

        }
        else
        {
          echo "<p style='color: red'> Por favor LLene el Formulario PersonalUAB/Datos Generales </p>";
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
          echo "hola";
        }
        break;

      case 'personalInsertar':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/Personal.php';
          include '../../model/PersonalConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();

          $consulta = new PersonaConsulta($conexion);

          $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/";
          $target_path = $target_path . basename("img".strtoupper($_POST['ciPersona']).".jpg");

          $a=move_uploaded_file($_FILES["fotoPersonal"]["tmp_name"], $target_path);

           //echo "Arg1: " . $_FILES["fotoPersonal"]["tmp_name"] . "<br>";
           //echo "Arg2: " . $_FILES["fotoPersonal"]["name"] . "<br>";
          // echo "Cantidad Movida: " . $a . "<br>";

          $idP = $consulta->obtenerIdPersona(strtoupper($_POST['ciPersona']));

          $personal = new Personal();
          $personal->IdPersona = $idP['idPersona'];
          $personal->IdNacion = $_POST['nacionalidad'];
          $personal->IdTipoPersonal = $_POST['tipoPersonal'];
          $personal->IdCarrera = $_POST['carrera'];
          $personal->IdCargo = $_POST['cargoPersonal'];
          $personal->Direccion = $_POST['direccion'];
          $personal->Email = $_POST['email'];
          $personal->IdCiudadNacimiento = $_POST['ciudad'];
          $personal->IdReligion = $_POST['religion'];
          $personal->FechaBautizmo = $_POST['fechaBau'];
          $personal->IdSeguro = $_POST['seguro'];
          $personal->NumeroSeguro = $_POST['numSeguro'];
          $personal->IdAfp = $_POST['afp'];
          $personal->NumeroAfp = $_POST['numSeguro'];
          $personal->NumeroLibretaMilitar = $_POST['numLibMilitar'];
          $personal->NumeroPasaporte = $_POST['numPasaporte'];
          $personal->TipoSangre = $_POST['tipoSangre'];
          $personal->Hobby = $_POST['hobby'];
          $personal->LecturaPreferencial = $_POST['lecturaP'];
          $personal->NumeroRegistroProfesional = $_POST['numeroRegProfesional'];
          $personal->FechaIngreso = $_POST['fechaIngres'];
          $personal->Ruta = $target_path;

          $personalManejador = new PersonalControlador($conexion);
          $personalManejador->crear($personal);

          $consulta = new PersonalConsulta($conexion);
          $idP = $consulta->obtenerIdPersonal($personal->IdPersona);
          $id = $idP['idPersonal'];

          if (isset($_POST['cargos']))
          {
            foreach($_POST['cargos'] as $item)
            {
              $personalManejador->agregarCargo($id, $item);
            }
          }
          if (isset($_POST['enfermedades']))
          {
            foreach($_POST['enfermedades'] as $item)
            {
              $personalManejador->agregarEnfermedad($id, $item);
            }
          }
          if (isset($_POST['deportes']))
          {
            foreach($_POST['deportes'] as $item)
            {
              $personalManejador->agregarDeporte($id, $item);
            }
          }

          echo "<p style='color:green'>Guardado Exitoso</p>";
        }
        else
        {
          echo "<p style='color:red'>Error al Guardar</p>";
        }

        break;

      case 'usuarioInsertar':
      if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/usuario.php';
          include '../../model/usuarioConsulta.php';
          include '../../controller/UsuarioControlador.php';
          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);
          $idP = $consulta->obtenerIdPersona(strtoupper($_POST['ciPersona']));

          $usuario = new Usuario($_POST['nombreUsuario'],$_POST['contrasena']);
          $usuario->IdUsuario = null;
          $usuario->TipoUsuario = $_POST['tipoUsuario'];
          $usuario->Estado = 1;
          $usuario->Borrado = 0;
          $usuario->IdPersona = $idP['idPersona'];
          $usuarioManejador = new UsuarioControlador($conexion);
          $usuarioManejador->crear($usuario);

        }
        else
      {
        echo "<p style='color: red'> Por favor LLene el Formulario PersonalUAB/Datos Generales </p>";
      }
      break;

      case 'regUsuario':
        include 'header.php';
        include 'bodyRegUsuario.php';
        include 'footer.php';
        break;

      case 'directorio':
        include 'header.php';
        include 'bodyDirectorio.php';
        include 'footer.php';
        break;


      case 'directorioExitoso':
        include 'header.php';
        ?>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
          <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><h4><i class="fa fa-check-circle"></i>¡Exito!</h4></strong> <p>Al Registrar Contacto...</p>
        </div>
        </div>
        </div>
        <?php
        include 'bodyDirectorio.php';
        include 'footer.php';
        break;

      case 'cumplePersonal':
        include 'header.php';
        include 'bodyCumple.php';
        include 'footer.php';
        break;


      case 'registrarContacto':
      if (isset($_POST['datos']))
      {
        include '../../model/conexion.php';
        include '../../model/Contacto.php';
        include '../../model/TelefonoContacto.php';
        include '../../model/TelefonoContactoConsulta.php';
        include '../../controller/ContactoControlador.php';
        include '../../controller/TelefonoContactoControlador.php';

        $conexion = new Conexion();
        $contacto = new Contacto();
        $contacto->primerNombre = ucwords(strtolower($_POST['primerNombre']));
        $contacto->segundoNombre = ucwords(strtolower($_POST['segundoNombre']));
        $contacto->apellidoPaterno = ucwords(strtolower($_POST['apellidoPaterno']));
        $contacto->apellidoMaterno = ucwords(strtolower($_POST['apellidoMaterno']));
        $contacto->apellidoCasada = ucwords(strtolower($_POST['apellidoCasada']));
        $contacto->sexo=strtoupper($_POST['sexo']);
        $contacto->fechaNacimiento=$_POST['fechaNac'];
        $contacto->interno=$_POST['interno'];
        $contacto->voip=$_POST['voip'];
        $contacto->emailInstitucional=$_POST['emailInstitucional'];
        $contacto->emailPersonal=$_POST['emailPersonal'];
        $contacto->idDepartamentoContacto=$_POST['emailPersonal'];
        $contacto->idTipoEmpleado=$_POST['tipoEmpleado'];
        $contacto->idResponsabilidad=$_POST['responsabilidad'];
        $contacto->idDepartamentoContacto=$_POST['departamentoContacto'];

        $contactoControlador = new ContactoControlador($conexion);
        $registroExitoso=$contactoControlador->crear($contacto);
        if ($registroExitoso) {
          $consultaTelContacto=new TelefonoContactoConsulta($conexion);
          $idContacto=$consultaTelContacto->idContactoMax();
          $telContactoControlador=new TelefonoContactoControlador($conexion);
          if ($_POST['numero1']!="") {
            $telefonoContacto1=new TelefonoContacto();
            $telefonoContacto1->idContacto=$idContacto['id'];
            $telefonoContacto1->tipoTelefono=$_POST['tipoTelefono1'];
            $telefonoContacto1->numero=$_POST['numero1'];
            $telContactoControlador->crear($telefonoContacto1);
          }
          if ($_POST['numero2']!="") {
            $telefonoContacto2=new TelefonoContacto();
            $telefonoContacto2->idContacto=$idContacto['id'];;
            $telefonoContacto2->tipoTelefono=$_POST['tipoTelefono2'];
            $telefonoContacto2->numero=$_POST['numero2'];
            $telContactoControlador->crear($telefonoContacto2);
          }
          if ($_POST['numero3']!="") {
            $telefonoContacto3=new TelefonoContacto();
            $telefonoContacto3->idContacto=$idContacto['id'];;
            $telefonoContacto3->tipoTelefono=$_POST['tipoTelefono3'];
            $telefonoContacto3->numero=$_POST['numero3'];
            $telContactoControlador->crear($telefonoContacto3);
          }

          header("Location: index.php?modo=directorioExitoso");
        }
        else {
          echo "<p style='color:red'>Entro al else</p>";
        }
      }
      else
      {
        echo "<p style='color:red'>Error al Enviar Formulario</p>";
      }
      break;
      //llamando el formulario de Tabla de Calificacion de Meritos

      case 'NuevaTablaMeritos':
            include 'header.php';
            include 'bodyRegistrarTablaMeritosDocenteProfesor.php';
            include 'footer.php';
      break;

      case 'RegistrarNuevaTablaMeritos':
        if (isset($_POST['datos']))
        {
          include '../../model/conexion.php';
          include '../../model/TablaMeritosDocenteProfesor.php';
          include '../../model/TablaMeritosDocenteProfesorConsulta.php';
          include '../../model/EstructuraMeritos.php';
          include '../../model/EstructuraMeritosConsulta.php';

          $conexion = new Conexion();

          $tablaMeritos = new TablaMeritosDocenteProfesor();
          $tablaMeritos->IdTablaMeritosDocenteProfesor = null;

          $tablaMeritos->Version = strtoupper($_POST['version']);

          $tablaMeritos->TipoMerito = $_POST['tipoMerito'];

          $tablaMeritos->FechaCreacion = $_POST['fechaCreacion'];

          $tablaMeritos->Activo = $_POST['activo'];

          $tablaMeritosConsulta = new  TablaMeritosDocenteProfesorConsulta($conexion);

          if($_POST['activo'] == '1'){
            //verificando si existe una tabla de Merito activa juntamente con el tipo de de merito docente/profesor
            //ya que solamente puede existir una activa y las otras no
            $resultadoSiExisteTablaMeritoActivoPorTipoMerito = $tablaMeritosConsulta->existeMeritoActivoPorTipoMerito($_POST['activo'],$_POST['tipoMerito']);

            if($resultadoSiExisteTablaMeritoActivoPorTipoMerito){
                  echo "<p style='color:red'>Existe una Tabla de Meritos Activa para el tipo: ".$_POST['tipoMerito']." </p>";
            }else{

                      $idTablaMerito = $tablaMeritosConsulta->crear($tablaMeritos);
                      //echo "$idTablaMerito" . $idTablaMerito;
                      $archivoXml = $_FILES["archivo"]["tmp_name"];
                      $xmlData = simplexml_load_file($archivoXml);//parseando el archivo XML
                      // Crear tabla merito docentes
                      $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
                      foreach ($xmlData->categoria as $categoria):
                        $nombre=$categoria->nombre;//este es del archivo XML
                        $puntaje=$categoria->puntaje;  //este es del archivo XML
                        $objCategoria = new EstructuraMeritos();
                        $objCategoria->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                        $objCategoria->IdEstructuraMeritoPrimario = null;// es la categoria
                        $objCategoria->NombreMerito = $nombre;
                        $objCategoria->PuntajeMerito = $puntaje;
                        $idCategoria = $objMeritoDocenteConsulta->crear($objCategoria);
                        //La categoria tiene "meritos" , y ahora se va a iterar sus meritos
                        foreach ($categoria->merito as $merito):
                          $nombre=$merito->nombre;
                          $puntaje=$merito->puntaje;

                          $objMerito = new EstructuraMeritos();
                          $objMerito->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                          //Aqui se tiene el id de la categoria primaria
                          $objMerito->IdEstructuraMeritoPrimario = $idCategoria;
                          $objMerito->NombreMerito = $nombre;
                          $objMerito->PuntajeMerito = $puntaje;
                          $objMeritoDocenteConsulta->crear($objMerito);
                        endforeach;
                      endforeach;
                      //Recuperando la estructura  las categorias con sus estructuras
                      //Los UL y LI se puede cambiar por tablas
                      $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritos($idTablaMerito);

                      echo "<table class='table table-hover' border = 1>";
                      $contador = 1;
                      foreach ($meritos as $categoria):
                        echo "<thead>
                              <tr>
                                  <th>".$contador.".-</th>
                                  <th colspan='2'><strong>".$categoria->NombreMerito." (".$categoria->PuntajeMerito." puntos)</strong></th>
                              </tr>
                              </thead>";
                              $subcontador = 1;
                        foreach ($categoria->SubMeritos as $merito):
                          echo "<tbody>
                                  <tr>
                                    <td>".$contador.".".$subcontador."</td>
                                    <td>".$merito->NombreMerito."</td>
                                    <td>".$merito->PuntajeMerito."</td>
                                  </tr>
                                </tbody>
                        ";
                          $subcontador++;
                          endforeach;
                        $contador++;
                      endforeach;
                      echo "</table>";

                      echo "<p style='color:green'>Guardado Exitoso</p>";
            }
          }else{

                $idTablaMerito = $tablaMeritosConsulta->crear($tablaMeritos);
                //echo "$idTablaMerito" . $idTablaMerito;
                $archivoXml = $_FILES["archivo"]["tmp_name"];
                $xmlData = simplexml_load_file($archivoXml);//parseando el archivo XML
                // Crear tabla merito docentes
                $objMeritoDocenteConsulta = new EstructuraMeritosConsulta($conexion);
                foreach ($xmlData->categoria as $categoria):
                  $nombre=$categoria->nombre;//este es del archivo XML
                  $puntaje=$categoria->puntaje;  //este es del archivo XML
                  $objCategoria = new EstructuraMeritos();
                  $objCategoria->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                  $objCategoria->IdEstructuraMeritoPrimario = null;// es la categoria
                  $objCategoria->NombreMerito = $nombre;
                  $objCategoria->PuntajeMerito = $puntaje;
                  $idCategoria = $objMeritoDocenteConsulta->crear($objCategoria);
                  //La categoria tiene "meritos" , y ahora se va a iterar sus meritos
                  foreach ($categoria->merito as $merito):
                    $nombre=$merito->nombre;
                    $puntaje=$merito->puntaje;

                    $objMerito = new EstructuraMeritos();
                    $objMerito->IdTablaMeritoDocenteProfesor = $idTablaMerito;
                    //Aqui se tiene el id de la categoria primaria
                    $objMerito->IdEstructuraMeritoPrimario = $idCategoria;
                    $objMerito->NombreMerito = $nombre;
                    $objMerito->PuntajeMerito = $puntaje;
                    $objMeritoDocenteConsulta->crear($objMerito);
                  endforeach;
                endforeach;
                //Recuperando la estructura  las categorias con sus estructuras
                //Los UL y LI se puede cambiar por tablas
                $meritos = $objMeritoDocenteConsulta->listaEstructuraMeritos($idTablaMerito);

                echo "<table class='table table-hover' border = 1>";
                $contador = 1;
                foreach ($meritos as $categoria):
                  echo "<thead>
                        <tr>
                            <th>".$contador.".-</th>
                            <th><strong>".$categoria->NombreMerito." (".$categoria->PuntajeMerito." puntos)</strong></th>
                        </tr>
                        </thead>";
                        $subcontador = 1;
                  foreach ($categoria->SubMeritos as $merito):
                    echo "<tbody>
                            <tr>
                              <td>".$contador.".".$subcontador."</td>
                              <td>".$merito->NombreMerito."</td>
                              <td>".$merito->PuntajeMerito."</td>
                            </tr>
                          </tbody>
                  ";
                    $subcontador++;
                    endforeach;
                  $contador++;
                endforeach;
                echo "</table>";

                echo "<p style='color:green'>Guardado Exitoso</p>";
          }
        }
        else
        {
          echo "<p style='color: red'> Por favor llene el Formulario Nueva Tabla de Meritos </p>";
        }


      break;

      case 'tablaCalificacionMeritosDocente':
            include 'header.php';
            //include 'bodyRegistrarTablaCalificacionMeritosDocente.php';
            include 'footer.php';
      break;

      //registro de meritos
      case 'registrarMeritoDocente':
          echo "llegue";
            if(isset($_FILES["archivo"]["type"]))
            {
                include '../../model/conexion.php';
                include '../../model/MeritosDocente.php';
                include '../../model/MeritosDocenteConsulta.php';

                $conexion = new Conexion();
                $xml = $_FILES["archivo"]["tmp_name"];
                $xmlData = simplexml_load_file($xml);
                // Crear tabla merito docentes

                $tablaMeritos = new TablaMeritosDocenteProfesor();


                foreach ($xmlData->categoria as $categoria):
                  $nombre=$categoria->nombre;
                  $puntaje=$categoria->puntaje;

                  $objMeritoDocenteConsulta = new MeritosDocenteConsulta($conexion);
                  $objCategoria = new MeritosDocente();
                  $objCategoria->IdMeritoDocente = null;
                  $objCategoria->IdMeritoDocentePrimario = null;
                  $objCategoria->NombreMerito = $nombre;
                  $objCategoria->PuntajeMerito = $puntaje;
                  $idCategoria = $objMeritoDocenteConsulta->crear($objCategoria);
                  foreach ($categoria->merito as $merito):
                    $nombre=$merito->nombre;
                    $puntaje=$merito->puntaje;

                    $objMerito = new MeritosDocente();
                    $objMerito->IdMeritoDocente = null;
                    $objMerito->IdMeritoDocentePrimario = $idCategoria;
                    $objMerito->NombreMerito = $nombre;
                    $objMerito->PuntajeMerito = $puntaje;
                  endforeach;
                endforeach;

                if($exitoRegistrarMerito){
                  echo "El merito fue registrado correctamente";
                }else{
                  echo "Error al registrar el merito";
                }


            }else{

              echo "Debe lllenar los campos";
            }
      break;

      case 'listaDirectorio':
        include 'header.php';
        include 'bodyListaDirectorio.php';
        include 'footer.php';
      break;

      case 'listaDirectorioContacto':
        include 'header.php';
        include 'bodyListaContacto.php';
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

      case 'darDeBajaPersonal':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/Personal.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/usuario.php';
          include '../../model/usuarioConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();
          $personalManejdor = new PersonalControlador($conexion);
          $personalManejdor->darBeBaja();
          header("Location: index.php?modo=listaPersonal");
        }
        else
        {
          header("Location: index.php");
        }
        break;

      case 'habilitarPersonal':
        if ($_POST)
        {
          include '../../model/conexion.php';
          include '../../model/Persona.php';
          include '../../model/Personal.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/usuario.php';
          include '../../model/usuarioConsulta.php';
          include '../../controller/PersonalControlador.php';
          $conexion = new Conexion();
          $personalManejdor = new PersonalControlador($conexion);
          $personalManejdor->habilitar();
          header("Location: index.php?modo=listaPersonal");
        }
        else
        {
          header("Location: index.php");
        }
        break;

      case 'editarPersonal':
        if ($_POST)
        {

          include 'header.php';
          include 'bodyEditarPersonal.php';
          include 'footer.php';

        }
        else
        {
          header("Location: index.php?modo=listaPersonal");
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
