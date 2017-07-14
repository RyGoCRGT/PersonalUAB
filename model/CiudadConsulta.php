<?php

class CiudadConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaCiudad()
  {
    $query = "SELECT * FROM ciudad ORDER BY nombreCiudad";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeCiudad($name)
  {
    $query = "SELECT *
              FROM ciudad
              WHERE nombreCiudad = :name";
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

  public function save($ciudad)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO ciudad (idCiudad, nombreCiudad)
                VALUES (:idCiudad, :nombreCiudad)";

      $stmtCiudad = $this->Conexion->prepare($query);

      $stmtCiudad->bindValue(':idCiudad', $ciudad->IdCiudad);
      $stmtCiudad->bindValue(':nombreCiudad', $ciudad->NombreCiudad);

      $stmtCiudad->execute();

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
