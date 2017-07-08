<?php

class SeguroConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaSeguro()
  {
    $query = "SELECT * FROM seguro ORDER BY nombreSeguro";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeSeguro($name)
  {
    $query = "SELECT *
              FROM seguro
              WHERE nombreSeguro = :name";
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

  public function save($seguro)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO seguro (idSeguro, nombreSeguro)
                VALUES (:idSeguro, :nombreSeguro)";

      $stmtSeguro = $this->Conexion->prepare($query);

      $stmtSeguro->bindValue(':idSeguro', $seguro->IdSeguro);
      $stmtSeguro->bindValue(':nombreSeguro', $seguro->NombreSeguro);

      $stmtSeguro->execute();

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
