<?php

class TipoTituloProfesionalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new TipoTituloProfesionalConsulta($this->Conexion);
    $listaTipoTituloProfesional = $consulta->listaTipoTituloProfesional();
    $listaArrayTipoTituloProfesional = array();
    $i = 0;
    foreach ($listaTipoTituloProfesional as $listaTipoTP) {
      $tipoTituloProfesional = new TipoTituloProfesional();
      $tipoTituloProfesional->IdTipoTituloProfesional = $listaTipoTP['idTipoTituloProfesional'];
      $tipoTituloProfesional->NombreTipoTitulo = $listaTipoTP['nombreTipoTitulo'];
      $listaArrayTipoTituloProfesional[$i] = $tipoTituloProfesional;
      $i++;
    }
    return $listaArrayTipoTituloProfesional;
  }

}

?>
