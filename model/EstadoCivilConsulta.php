<?php

class EstadoCivilConsulta
{

  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function listaEstadoCivil()
  {
    $query = "SELECT * FROM estadoCivil";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
