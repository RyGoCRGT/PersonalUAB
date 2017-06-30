<?php

class CarreraControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CarreraConsulta($this->Conexion);
    $listaCarreras = $consulta->listaCarrera();
    $listArrayCa = array();
    $i = 0;
    foreach ($listaCarreras as $listaC) {
      $carrera =  new Carrera();
      $carrera->IdCarrera = $listaC['idCarrera'];
      $carrera->IdFacultad = $listaC['idFacultad'];
      $carrera->NombreCarrera = $listaC['nombreCarrera'];
      $listArrayCa[$i] = array();
      $i++;
    }
    return $listArrayCa;
  }

}

?>
