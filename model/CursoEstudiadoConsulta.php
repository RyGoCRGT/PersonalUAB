<?php

class CursoEstudiadoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaCursosPersonal($idPersonal)
  {
    $query = "SELECT *
              FROM cursoestudiado
              WHERE idPersonal = :idPersonal
              ORDER BY cursoEstudiado";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
