<?php

class FacultadControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consultaF = new FacultadConsulta($this->Conexion);
    $consultaC = new CarreraConsulta($this->Conexion);
    $listaFacultades = $consultaF->listaFacultad();
    $listaCarreras = $consultaC->listaCarrera();
    $listArrayFacuCarr = array();
    $i = 0;
    foreach ($listaFacultades as $listaF)
    {
      $facultad = new Facultad();
      $facultad->IdFacultad = $listaF['idFacultad'];
      $facultad->NombreFacultad = $listaF['nombreFacultad'];
      foreach ($listaCarreras as $listaC)
      {
        if ($facultad->IdFacultad == $listaC['idFacultad'])
        {
          $carrera = new Carrera();
          $carrera->IdCarrera = $listaC['idCarrera'];
          $carrera->IdFacultad = $listaC['idFacultad'];
          $carrera->NombreCarrera = $listaC['nombreCarrera'];
          $facultad->setListaCarreras($carrera);
        }
      }
      $listArrayFacuCarr[$i] = $facultad;
      $i++;
    }
    return $listArrayFacuCarr;
  }

}

?>
