<?php

class SesionUsuario
{

  private $Usuario;

  function __construct($usuario)
  {
      $this->Usuario = $usuario;
  }

  public function crearSession()
  {
    $_SESSION['idUsuario'] = $this->Usuario->IdUsuario;
    $_SESSION['usuario'] = $this->Usuario->Usuario;
    $_SESSION['contrasena'] = $this->Usuario->Contrasena;
    $_SESSION['estado'] = $this->Usuario->Estado;
    $_SESSION['borrado'] = $this->Usuario->Borrado;
    $_SESSION['idPersona'] = $this->Usuario->C_Persona;
    $_SESSION['idTipoUsuario'] = $this->Usuario->TipoUsuario;
  }


}


?>
