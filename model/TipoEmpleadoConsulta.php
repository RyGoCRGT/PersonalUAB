<?php
/**
 *
 */
class TipoEmpleadoConsulta
{
  public $Conexion;

  function __construct($conexion)
  {
      $this->Conexion=$conexion;
  }

  public function listaTipoEmpleado()
  {
    $query="SELECT * FROM tipoEmpleado";
    $consulta=$this->Conexion->prepare($query);
    $consulta->execute();
    $registro=$consulta->fetchAll();
    return $registro;
  }
}

 ?>
