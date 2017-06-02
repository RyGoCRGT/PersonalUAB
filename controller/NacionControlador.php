<?php

class NacionControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new NacionConsulta($this->Conexion);
    $listaNaciones = $consultas->listaNaciones();
    $listArrayLN = array();
    $i = 0;
    foreach ($listaNaciones as $listaN) {
      $nacion = new Nacion();
      $nacion->IdNacion = $listaN['idNacion'];
      $nacion->NombreNacion = $listaN['nombreNacion'];
      $listArrayLN[$i] = $nacion;
      $i++;
    }
    return $listArrayLN;
  }

}

?>
