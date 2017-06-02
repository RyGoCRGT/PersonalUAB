<?php

class CiudadControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CiudadConsulta($this->Conexion);
    $listaCiudad = $consulta->listaCiudad();

    $listArrayCity = array();
    $i = 0;

    foreach ($listaCiudad as $listaC) {
      $ciudad = new Ciudad($listaC['nombreCiudad']);
      $ciudad->IdCiudad = $listaC['idCiudad'];
      $listArrayCity[$i] = $ciudad;
      $i++;
    }

    return $listArrayCity;

  }

}

?>
