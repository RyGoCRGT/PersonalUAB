<?php

class DepartamentoContactoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDepartamentoContacto()
  {
    $query = "SELECT * FROM departamentocontato ORDER BY nombre";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
