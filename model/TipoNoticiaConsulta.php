<?php

class TipoNoticiaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTipoNoticia()
  {
    $query = "SELECT *
              FROM tipoNoticia";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    return $resultado;
  }

}

?>
