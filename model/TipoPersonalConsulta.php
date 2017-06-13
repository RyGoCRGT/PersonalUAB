<?php

class TipoPersonalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion =  $con;
  }

  public function listaTipoPersonal()
  {
    $query = "SELECT * FROM tipoPersonal ORDER BY nombreTipoPersonal";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
