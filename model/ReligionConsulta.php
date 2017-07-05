<?php

class ReligionConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaReligion()
  {
    $query = "SELECT * FROM religion ORDER BY nombreReligion";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeReligion($name)
  {
    $query = "SELECT *
              FROM religion
              WHERE nombreReligion = :name";
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

  public function save($religion)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO religion (idReligion, nombreReligion)
                VALUES (:idReligion, :nombreReligion)";

      $stmtReligion = $this->Conexion->prepare($query);

      $stmtReligion->bindValue(':idReligion', $religion->IdReligion);
      $stmtReligion->bindValue(':nombreReligion', $religion->NombreReligion);

      $stmtReligion->execute();

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
