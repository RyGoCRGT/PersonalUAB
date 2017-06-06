<?php

class CargoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CargoConsulta($this->Conexion);
    $listaCargos = $consulta->listaCargos();
    $listaArrayCargos = array();
    $i = 0;
    foreach ($listaCargos as $listaC)
    {
      $cargo = new Cargo();
      $cargo->IdCargo = $listaC['idCargo'];
      $cargo->NombreCargo = $listaC['nombreCargo'];
      $listaArrayCargos[$i] = $cargo;
      $i++;
    }
    return $listaArrayCargos;
  }

}

?>
