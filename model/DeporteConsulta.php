<?php

class DeporteConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeportes()
  {
    $query = "SELECT * FROM deporte ORDER BY nombreDeporte";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeDeporte($name)
  {
    $query = "SELECT *
              FROM deporte
              WHERE nombreDeporte = :name";
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

  public function save($deporte)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO deporte (idDeporte, nombreDeporte)
                VALUES (:idDeporte, :nombreDeporte)";

      $stmtDeporte = $this->Conexion->prepare($query);

      $stmtDeporte->bindValue(':idDeporte', $deporte->IdDeporte);
      $stmtDeporte->bindValue(':nombreDeporte', $deporte->NombreDeporte);

      $stmtDeporte->execute();

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
