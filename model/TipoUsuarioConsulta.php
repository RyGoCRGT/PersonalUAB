<?php

class TipoUsuarioConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion =  $con;
  }

  public function listaTipoUsuario()
  {
    $query = "SELECT * FROM tipoUsuario where idTipoUsuario != 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
