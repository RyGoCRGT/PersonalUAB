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
    $query = "SELECT * FROM tipoUsuario";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
