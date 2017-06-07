<?php

class FacultadConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaFacultad()
  {
    $query = "SELECT * FROM facultad ORDER BY nombreFacultad";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
