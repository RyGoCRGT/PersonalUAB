<?php
/**
 *
 */
class ResponsabilidadConsulta
{
  public $Conexion;

  function __construct($conexion)
  {
      $this->Conexion=$conexion;
  }

  public function listaResponsabilidad()
  {
    $query="SELECT * FROM responsabilidad";
    $consulta=$this->Conexion->prepare($query);
    $consulta->execute();
    $registro=$consulta->fetchAll();
    return $registro;
  }
}

 ?>
