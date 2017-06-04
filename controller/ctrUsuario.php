<?php

class ManagamentUsuario
{
  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function ingresar($usuarioObj)
  {
    $user = new UsuarioConsulta($this->Conexion);
    $dataUser = $user->dataUser($usuarioObj->Usuario);
    if ($dataUser)
    {
      if ($dataUser['contrasena'] == $usuarioObj->Contrasena)
      {
        if ($dataUser['borrado'] == 0)
        {
          if ($dataUser['estado'] == 1)
          {
            $usuarioObj->IdUsuario = $dataUser['idUsuario'];
            $usuarioObj->Estado = $dataUser['estado'];
            $usuarioObj->Borrado = $dataUser['borrado'];
            $usuarioObj->TipoUsuario = $dataUser['idTipoUsuario'];
            $usuarioObj->C_Persona = $dataUser['idPersona'];
            session_start();
            $sesion = new SesionUsuario($usuarioObj);
            $sesion->crearSession();

            echo $usuarioObj->TipoUsuario;

          }
          else
          {
            echo "Usuario Inactivo";
          }
        }
        else
        {
          echo "Usuario Inexistente";
        }
      }
      else
      {
        echo "Contraseña Incorrecta";
      }
    }
    else
    {
      echo "Usuario Inexistente";
    }
  }

}

?>
