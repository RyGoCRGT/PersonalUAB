<?php

class ReligionConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaReligion()
  {
    $query = "SELECT * FROM religion ORDER BY nombreReligion";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
