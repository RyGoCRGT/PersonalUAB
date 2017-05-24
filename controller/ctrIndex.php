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

        break;

      case 'Sesion Caducada':
        # code...
        break;

      case 'ErrUserInexitente':

        break;

      case 'ErrPass':

        break;

      case 'CampLlenos':

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
