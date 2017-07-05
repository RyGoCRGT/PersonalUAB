<?php

class NacionConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaNaciones()
  {
    $query = "SELECT * FROM nacion ORDER BY nombreNacion";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeNacion($name)
  {
    $query = "SELECT *
              FROM nacion
              WHERE nombreNacion = :name";
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

  public function save($nacion)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO nacion (idNacion, nombreNacion)
                VALUES (:idNacion, :nombreNacion)";

      $stmtNacion = $this->Conexion->prepare($query);

      $stmtNacion->bindValue(':idNacion', $nacion->IdNacion);
      $stmtNacion->bindValue(':nombreNacion', $nacion->NombreNacion);

      $stmtNacion->execute();

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
