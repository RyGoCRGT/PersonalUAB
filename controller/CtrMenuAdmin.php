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

      case 'personaInsertar':
        if (isset($_POST['datos']))
        {
          include '../../model/Conexion.php';
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

          echo "Listo";

        }
        else
        {
          echo "<p style='color: red'> Por favor LLene el Formulario PersonalUAB/Datos Generales </p>";
        }
        break;

      case 'personalInsertar':

        include '../../model/Conexion.php';
        include '../../model/PersonaConsulta.php';
        include '../../model/Personal.php';
        include '../../model/PersonalConsulta.php';
        include '../../controller/PersonalControlador.php';
        $conexion = new Conexion();

        $consulta = new PersonaConsulta($conexion);

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

        $personalManejador = new PersonalControlador($conexion);
        $personalManejador->crear($personal);

        echo "aqui estoy";

        break;

      case 'regUsuario':
        include 'header.php';
        include 'bodyRegUsuario.php';
        include 'footer.php';
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
