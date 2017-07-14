<?php

class ArchivoConsulta
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

      $query = "INSERT INTO archivo (idArchivo, idTipoArchivo, nombreArchivo, archivo)
                VALUES (:idArchivo, :idTipoArchivo, :nombreArchivo, :archivo)";

      $stmtArchivo = $this->Conexion->prepare($query);

      $stmtArchivo->bindValue(':idArchivo', $archivo->IdArchivo);
      $stmtArchivo->bindValue(':idTipoArchivo', $archivo->C_TipoArchivo);
      $stmtArchivo->bindValue(':nombreArchivo', $archivo->NombreArchivo);
      $stmtArchivo->bindValue(':archivo', $archivo->Archivo);

      $stmtArchivo->execute();

      $this->Conexion->commit();



    } catch (PDOException $e) {

      $this->Conexion->rollBack();

    }
  }

  public function listaArchivos()
  {
    $query = "SELECT
                a.idArchivo,
                tp.nombreTipoArchivo,
                a.nombreArchivo,
                a.archivo
              FROM archivo a, tipoArchivo tp
              WHERE a.idTipoArchivo = tp.idTipoArchivo
              ORDER BY a.idArchivo desc";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function datosArchivo($id)
  {
    $query = "SELECT
                a.idArchivo,
                tp.nombreTipoArchivo,
                a.nombreArchivo,
                a.archivo
              FROM archivo a, tipoArchivo tp
              WHERE a.idTipoArchivo = tp.idTipoArchivo
              AND a.idArchivo = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

}

?>
