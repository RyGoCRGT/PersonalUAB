<?php

class CargoPersonaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaCargos()
  {
    $query = "SELECT * FROM cargoPersona ORDER BY nombreCargoPersona";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
