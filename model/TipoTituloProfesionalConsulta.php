<?php

class TipoTituloProfesionalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTipoTituloProfesional()
  {
    $query = "SELECT * FROM tipotituloprofesional ORDER BY nombreTipoTitulo";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
