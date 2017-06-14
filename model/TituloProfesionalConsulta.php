<?php

class TituloProfesionalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTitulosPersona($id)
  {
    $query = "SELECT *
              FROM tituloprofesional
              WHERE idPersonal = :idPersonal
              ORDER BY cursoProfesionalEstudiado";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
