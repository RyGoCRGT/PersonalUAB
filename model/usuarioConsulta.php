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

}

?>
