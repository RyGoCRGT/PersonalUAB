<?php

class EnfermedadConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaEnfermedades()
  {
    $query = "SELECT * FROM enfermedad ORDER BY nombreEnfermedad";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeEnfermedad($name)
  {
    $query = "SELECT *
              FROM enfermedad
              WHERE nombreEnfermedad = :name";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':name', $name);
    $consulta->execute();
    $registro = $consulta->fetch();
    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function save($enfermedad)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO enfermedad (idEnfermedad, nombreEnfermedad)
                VALUES (:idEnfermedad, :nombreEnfermedad)";

      $stmtEnfermedad = $this->Conexion->prepare($query);

      $stmtEnfermedad->bindValue(':idEnfermedad', $enfermedad->IdEnfermedad);
      $stmtEnfermedad->bindValue(':nombreEnfermedad', $enfermedad->NombreEnfermedad);

      $stmtEnfermedad->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

}

?>
