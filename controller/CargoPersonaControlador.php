<?php

class CargoPersonaControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CargoPersonaConsulta($this->Conexion);
    $listaCargos = $consulta->listaCargos();
    $listaArrayCargos = array();
    $i = 0;
    foreach ($listaCargos as $listaC)
    {
      $cargo = new CargoPersona();
      $cargo->IdCargoPersona = $listaC['idCargoPersona'];
      $cargo->NombreCargoPersona = $listaC['nombreCargoPersona'];
      $listaArrayCargos[$i] = $cargo;
      $i++;
    }
    return $listaArrayCargos;
  }

}

?>
