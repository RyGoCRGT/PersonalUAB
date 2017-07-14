<?php
/**
 *
 */
class TipoEmpleadoControlador
{
  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion=$conexion;
  }

  public function listar()
  {
    $consulta=new TipoEmpleadoConsulta($this->Conexion);
    $listaTipoEmpleado=$consulta->listaTipoEmpleado();
    $ListaArray=array();
    $i=0;
    foreach ($listaTipoEmpleado as $listaTipoEmp) {
      $tipoEmpleado=new TipoEmpleado();
      $tipoEmpleado->idTipoEmpleado=$listaTipoEmp['idTipoEmpleado'];
      $tipoEmpleado->nombre=$listaTipoEmp['nombre'];
      $ListaArray[$i]=$tipoEmpleado;
      $i++;
    }
    return $ListaArray;
  }
}

 ?>
