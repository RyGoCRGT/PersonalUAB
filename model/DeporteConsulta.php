<?php

class DeporteConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeportes()
  {
    $query = "SELECT * FROM deporte ORDER BY nombreDeporte";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
