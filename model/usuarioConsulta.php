<?php

class UsuarioConsulta
{

  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function dataUser($nameUser)
  {
    $query = "SELECT * FROM usuario WHERE usuario = :nameUser";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':nameUser', $nameUser);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function existeUsuarioVinculado($id)
  {
    $query = "SELECT * FROM usuario WHERE idPersona = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

}

?>
