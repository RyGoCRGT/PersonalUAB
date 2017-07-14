<?php
/**
 *
 */
class ResponsabilidadControlador
{
  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion=$conexion;
  }

  public function listar()
  {
    $consulta=new ResponsabilidadConsulta($this->Conexion);
    $listaResponsabilidad=$consulta->listaResponsabilidad();
    $ListaArray=array();
    $i=0;
    foreach ($listaResponsabilidad as $listaResp) {
      $Responsabilidad=new Responsabilidad();
      $Responsabilidad->idResponsabilidad=$listaResp['idResponsabilidad'];
      $Responsabilidad->nombre=$listaResp['nombre'];
      $ListaArray[$i]=$Responsabilidad;
      $i++;
    }
    return $ListaArray;
  }
}

 ?>
