<?php

class TelefonoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function existeTelefono($num)
  {
    $query = "SELECT * FROM telefono where numeroTelefono = :num";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':num', $num);
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
  public function listaNumeroPersona($id)
  {
    $query="SELECT * FROM telefono WHERE idPersona=:idPer";
    $consulta=$this->Conexion->prepare($query);
    $consulta->bindParam(':idPer',$id);
    $consulta->execute();
    $registro=$consulta->fetchAll();
    return $registro;
  }

  public function save($telefono)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO telefono (idTelefono, idPersona, numeroTelefono)
                VALUES (:idTelefono, :idPersona, :numeroTelefono)";

      $stmtTelefono = $this->Conexion->prepare($query);

      $stmtTelefono->bindValue(":idTelefono", $telefono->IdTelefono);
      $stmtTelefono->bindValue(":idPersona", $telefono->IdPersona);
      $stmtTelefono->bindValue(":numeroTelefono", $telefono->NumeroTelefono);

      $stmtTelefono->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function delete($telefono)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "DELETE FROM telefono WHERE numeroTelefono = :numeroTelefono";

      $stmtTelefono = $this->Conexion->prepare($query);

      $stmtTelefono->bindValue(":numeroTelefono", $telefono->NumeroTelefono);

      $stmtTelefono->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function edit($telefono)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "UPDATE telefono SET numeroTelefono = :numeroTelefono WHERE numeroTelefono = :numeroTelefonoAntiguo";

      $stmtTelefono = $this->Conexion->prepare($query);

      $stmtTelefono->bindValue(":numeroTelefono", $telefono->NumeroTelefono);
      $stmtTelefono->bindValue(":numeroTelefonoAntiguo", $telefono->IdTelefono);

      $stmtTelefono->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

}

?>
