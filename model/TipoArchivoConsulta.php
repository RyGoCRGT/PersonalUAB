<?php

class TipoArchivoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function save($archivo)
  {
    try {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO tipoArchivo (idTipoArchivo, nombreTipoArchivo)
                VALUES (:idTipoArchivo, :nombreTipoArchivo)";

      $stmtArchivo = $this->Conexion->prepare($query);

      $stmtArchivo->bindValue(':idTipoArchivo', $archivo->IdTipoArchivo);
      $stmtArchivo->bindValue(':nombreTipoArchivo', $archivo->NombreTipoArchivo);
      $stmtArchivo->execute();

      $this->Conexion->commit();



    } catch (PDOException $e) {

      $this->Conexion->rollBack();

    }
  }

  public function listaTipoArchivos()
  {
    $query = "SELECT
                *
              FROM tipoArchivo
              ORDER BY nombreTipoArchivo";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeTipoArchivo($name)
  {
    $query = "SELECT
                *
              FROM tipoArchivo
              WHERE nombreTipoArchivo = :nombreTipoArchivo";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':nombreTipoArchivo', $name);
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

}

?>
