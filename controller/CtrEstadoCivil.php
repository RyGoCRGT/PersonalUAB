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
    $ListaEstadoCivil = $consulta->listaEstadoCivil();
    $listArrayEC = array();
    $i = 0;
    foreach ($ListaEstadoCivil as $ListaEC) {
      $estadoCi = new EstadoCivil();
      $estadoCi->IdEstadoCivil = $ListaEC['idEstadoCivil'];
      $estadoCi->NombreEstadoCivil = $ListaEC['nombreEstadoCivil'];
      $listArrayEC[$i] = $estadoCi;
      $i++;
    }
    return $listArrayEC;
  }

}

?>
