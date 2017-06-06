<?php

class EnfermedadControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new EnfermedadConsulta($this->Conexion);
    $listaEnfermedades = $consulta->listaEnfermedades();
    $listaArrayEnfermedades = array();
    $i = 0;
    foreach ($listaEnfermedades as $listaE)
    {
      $enfermedad = new Enfermedad();
      $enfermedad->IdEnfermedad = $listaE['idEnfermedad'];
      $enfermedad->NombreEnfermedad = $listaE['nombreEnfermedad'];
      $listaArrayEnfermedades[$i] = $enfermedad;
      $i++;
    }
    return $listaArrayEnfermedades;
  }

}

?>
