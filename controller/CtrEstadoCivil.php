<?php

class CtrEstadoCivil
{

  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function listar()
  {
    $consulta = new EstadoCivilConsulta($this->Conexion);
    $estadCivil = $consulta->listaEstadoCivil();
  }

}

?>
