<?php

class AfpConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaAfp()
  {
    $query = "SELECT * FROM afp ORDER BY nombreAfp";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeAfp($name)
  {
    $query = "SELECT *
              FROM afp
              WHERE nombreAfp = :name";
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

  public function save($afp)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO afp (idAfp, nombreAfp)
                VALUES (:idAfp, :nombreAfp)";

      $stmtAfp = $this->Conexion->prepare($query);

      $stmtAfp->bindValue(':idAfp', $afp->IdAfp);
      $stmtAfp->bindValue(':nombreAfp', $afp->NombreAfp);

      $stmtAfp->execute();

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
