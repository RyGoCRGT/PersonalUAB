<?php

class TipoPersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
      $consulta = new TipoPersonalConsulta($this->Conexion);
      $listaTipoPersonal = $consulta->listaTipoPersonal();
      $listArrayTP = array();
      $i = 0;
      foreach ($listaTipoPersonal as $listaTP) {
        $tipoPersonal = new TipoPersonal();
        $tipoPersonal->IdTipoPersonal = $listaTP['idTipoPersonal'];
        $tipoPersonal->NombreTipoPersonal = $listaTP['nombreTipoPersonal'];
        $listArrayTP[$i] = $tipoPersonal;
        $i++;
      }
      return $listArrayTP;
  }

}

?>
