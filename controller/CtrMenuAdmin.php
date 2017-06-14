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

      case 'regPersonal':
        include 'header.php';
        include 'bodyRegPers.php';
        include 'footer.php';
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
          $target_path = $target_path . basename( $_FILES["respaldoCursos"]["name"]);

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
            <table class="table table-hover">
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
          $target_path = $target_path . basename( $_FILES["respaldoTitulo"]["name"]);

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
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso</th>
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
          include '../../model/Personal.php';
          include '../../model/PersonaConsulta.php';
          include '../../model/PersonalConsulta.php';
          include '../../model/ReferenciaPersonal.php';
          include '../../model/ConyuguePersonal.php';
          include '../../model/HijosPersonal.php';
          include '../../model/Telefono.php';
          include '../../model/TelefonoConsulta.php';
          include '../../controller/PersonaControlador.php';
          include '../../controller/PersonalControlador.php';
          include '../../controller/ReferenciaPersonalControlador.php';
          include '../../controller/TelefonoControlador.php';

          $conexion = new Conexion();
          $consulta = new PersonaConsulta($conexion);

          $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonalDetalle']);

          $consul = new PersonalConsulta($conexion);

          $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);
          $personaManejador = new PersonalControlador($conexion);

          $persona = $personaManejador->ver($idPersonal['idPersonal']);

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

          echo "<p style='color:green'>Gurdado Exitoso</p>";

        }
        else
        {
          echo "<p style='color: red'> Por favor LLene el Formulario PersonalUAB/Datos Generales </p>";
        }
        break;

      case 'personalInsertar':

        include '../../model/conexion.php';
        include '../../model/PersonaConsulta.php';
        include '../../model/Personal.php';
        include '../../model/PersonalConsulta.php';
        include '../../controller/PersonalControlador.php';
        $conexion = new Conexion();

        $consulta = new PersonaConsulta($conexion);

        $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/";
        $target_path = $target_path . basename( $_FILES["fotoPersonal"]["name"]);

        $a=move_uploaded_file($_FILES["fotoPersonal"]["tmp_name"], $target_path);

        // echo "Arg1: " . $_FILES["fotoPersonal"]["tmp_name"] . "<br>";
        // echo "Arg2: " . $target_path . "<br>";
        // echo "Cantidad Movida: " . $a . "<br>";

        $idP = $consulta->obtenerIdPersona(strtoupper($_POST['ciPersona']));

        $personal = new Personal();
        $personal->IdPersona = $idP['idPersona'];
        $personal->IdNacion = $_POST['nacionalidad'];
        $personal->IdTipoPersonal = $_POST['tipoPersonal'];
        $personal->IdCarrera = $_POST['carrera'];
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

      case 'cumplePersonal':
        include 'header.php';
        include 'bodyCumple.php';
        include 'footer.php';
        break;

      case 'registrarContacto':
      if (isset($_POST['datos'])) {
        include '../model/conexion.php';
        include '../model/persona.php';
        $con = new Conexion();
      }else {
        echo "Campos Vacios";
      }
      break;

        break;

      case 'salir':
          session_start();
          session_destroy();
          header("Location: ../../index.php");
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
