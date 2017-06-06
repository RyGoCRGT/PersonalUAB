<?php

class SeguroControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new SeguroConsulta($this->Conexion);
    $listaSeguros = $consulta->listaSeguro();
    $listArraySeguro = array();
    $i = 0;
    foreach ($listaSeguros as $listaS) {
      $seguro =  new Seguro();
      $seguro->IdSeguro = $listaS['idSeguro'];
      $seguro->NombreSeguro = $listaS['nombreSeguro'];
      $listArraySeguro[$i] = $seguro;
      $i++;
    }
    return $listArraySeguro;
  }

}

?>
