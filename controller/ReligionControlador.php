<?php

class ReligionControlador
{
  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new ReligionConsulta($this->Conexion);
    $listaReligion = $consulta->listaReligion();
    $listArrayReligion = array();
    $i = 0;
    foreach ($listaReligion as $listaR) {
      $religion = new Religion($listaR['nombreReligion']);
      $religion->IdReligion = $listaR['idReligion'];
      $listArrayReligion[$i] = $religion;
      $i++;
    }
    return $listArrayReligion;
  }

}

?>
