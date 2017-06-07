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
          $persona->PrimerNombre = $_POST['primerNombre'];
          $persona->SegundoNombre = $_POST['segundoNombre'];
          $persona->ApellidoPaterno = $_POST['apellidoPaterno'];
          $persona->ApellidoMaterno = $_POST['apellidoMaterno'];
          $persona->CI = $_POST['ciNit'];
          $persona->LugarExpedicion = $_POST['lugarExpedicion'];
          $persona->FechaNacimiento = $_POST['fechaNac'];
          $persona->Sexo = $_POST['sexo'];
          $persona->EstadoCivil = $_POST['estadoCivil'];
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
