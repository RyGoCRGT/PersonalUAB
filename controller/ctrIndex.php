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
        include 'view/Index/header.php';
        ?>
        <div class="alert alert-warning" style="opacity:0.8; margin-top: 100px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong> Acceso Denegado.
        </div>
        <?php
        include 'view/Index/body.php';
        include 'view/Index/footer.php';
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
          include 'model/usuario.php';
          include 'model/usuarioConsulta.php';
          include 'model/sesion.php';
          include 'model/conexion.php';
          include 'controller/ctrUsuario.php';
          $usuario  = new Usuario($_POST['usuario'], $_POST['contrasena']);
          $conexion = new Conexion();
          $manageUser = new ManagamentUsuario($conexion);
          $manageUser->ingresar($usuario);
        }
        else
        {
          echo "Llene el formulario";
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
