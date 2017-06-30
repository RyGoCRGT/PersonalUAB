<?php

class CtrLugarExpedicion
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new LugarExpedicionConsulta($this->Conexion);
    $ListaLugarExpedicion = $consulta->listaLugarExpedicion();
    $listArrayLE = array();
    $i = 0;
    foreach ($ListaLugarExpedicion as $ListaLE) {
      $lugExp = new LugarExpedicion($ListaLE['nombreLugarExpedicion']);
      $lugExp->IdLugarExpedicion = $ListaLE['idLugarExpedicion'];
      $listArrayLE[$i] = $lugExp;
      $i++;
    }
    return $listArrayLE;
  }

}

?>
