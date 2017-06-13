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
