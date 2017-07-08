<?php

class LugarExpedicionConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaLugarExpedicion()
  {
    $query = "SELECT * FROM lugarExpedicion ORDER BY nombreLugarExpedicion";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeLugarExpedicion($name)
  {
    $query = "SELECT *
              FROM lugarExpedicion
              WHERE nombreLugarExpedicion = :name";
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

  public function save($lugarExpedicion)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO lugarexpedicion (idLugarExpedicion, nombreLugarExpedicion)
                VALUES (:idLugarExpedicion, :nombreLugarExpedicion)";

      $stmtLugarExped = $this->Conexion->prepare($query);

      $stmtLugarExped->bindValue(':idLugarExpedicion', $lugarExpedicion->IdLugarExpedicion);
      $stmtLugarExped->bindValue(':nombreLugarExpedicion', $lugarExpedicion->NombreLugarExpedicion);

      $stmtLugarExped->execute();

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
