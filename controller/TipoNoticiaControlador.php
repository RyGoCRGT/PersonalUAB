<?php

class TipoNoticiaControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new TipoNoticiaConsulta($this->Conexion);
    $lista = $consulta->listaTipoNoticia();
    $listaArray = array();
    $i = 0;
    foreach ($lista as $item)
    {
      $tipoNoticia = new TipoNoticia();
      $tipoNoticia->IdTipoNoticia = $item['idTipoNoticia'];
      $tipoNoticia->NombreTipoNoticia = $item['nombreTipoNoticia'];
      $listaArray[$i] = $tipoNoticia;
      $i++;
    }
    return $listaArray;
  }

}

?>
