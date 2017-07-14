<?php

class TablaMeritosDocenteProfesorControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new TablaMeritosDocenteProfesorConsulta($this->Conexion);
    $listaTablaMeritos = $consulta->listaTablaMeritosDocenteProfesor();
    $listaArray = array();
    $i = 0;
    foreach ($listaTablaMeritos as $key => $value)
    {
      $tablaMeritos = new Tablameritosdocenteprofesor();
      $tablaMeritos->IdTablaMeritosDocenteProfesor = $value['idTablaMeritoDocenteProfesor'];
      $tablaMeritos->Version = $value['version'];
      $tablaMeritos->TipoMerito = $value['tipoMerito'];
      $tablaMeritos->FechaCreacion = $value['fechaCreacion'];
      $tablaMeritos->Activo = $value['activo'];
      $listaArray[$i] = $tablaMeritos;
      $i++;
    }
    return $listaArray;
  }

}

?>
