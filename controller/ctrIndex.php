<?php


class ManagePage
{

  private $Modo;

  public function __construct($modo)
  {
    $this->Modo = $modo;
  }

  public function MenuIndex()
  {

    switch ($this->Modo) {

      case 'AccesDenied':
        echo "acceso denegado";
        break;

      case 'Sesion Caducada':
        echo "sesion caducada";
        break;

      case 'ErrUserInexitente':
        echo "usuario inexistente";
        break;

      case 'ErrPass':
        echo "error en contrasena";
        break;

      case 'CampLlenos':
        if (isset($_POST['datos']))
        {
          include 'model/';
        }
        else
        {
          echo "llene el formulario";
        }
        break;

      case 'salir':
          session_start();
          session_destroy();
          header("Location: index.php");
          break;

      default:

        include 'view/Index/header.php';
        include 'view/Index/body.php';
        include 'view/Index/footer.php';

        break;
    }

  }


}


?>
