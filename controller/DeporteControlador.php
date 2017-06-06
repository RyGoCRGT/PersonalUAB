<?php

class DeporteControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new DeporteConsulta($this->Conexion);
    $listaDeportes = $consulta->listaDeportes();
    $listaArrayDeportes = array();
    $i = 0;
    foreach ($listaDeportes as $listaD)
    {
      $deporte = new Deporte();
      $deporte->IdDeporte = $listaD['idDeporte'];
      $deporte->NombreDeporte = $listaD['nombreDeporte'];
      $listaArrayDeportes[$i] = $deporte;
      $i++;
    }
    return $listaArrayDeportes;
  }

}

?>
