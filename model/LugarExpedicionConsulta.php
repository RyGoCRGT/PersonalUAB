<?php

class LugarExpedicionConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaLugarExpedicion()
  {
    $query = "SELECT * FROM lugarExpedicion ORDER BY nombreLugarExpedicion";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
