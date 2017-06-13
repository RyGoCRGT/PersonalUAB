<?php

class EnfermedadConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaEnfermedades()
  {
    $query = "SELECT * FROM enfermedad ORDER BY nombreEnfermedad";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
