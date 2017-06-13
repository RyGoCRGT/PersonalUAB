<?php

class ReferenciaPersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($referenciaPersonal)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO referenciapersonal (idReferenciaPersonal, idPersona, idPersonal)
                VALUES (:idReferenciaPersonal, :idPersona, :idPersonal)";

      $stmtReferenciaPers = $this->Conexion->prepare($query);

      $stmtReferenciaPers->bindValue(':idReferenciaPersonal', $referenciaPersonal->IdReferenciaPersonal);
      $stmtReferenciaPers->bindValue(':idPersona', $referenciaPersonal->IdPersona);
      $stmtReferenciaPers->bindValue(':idPersonal', $referenciaPersonal->IdPersonal);

      $stmtReferenciaPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}

?>
