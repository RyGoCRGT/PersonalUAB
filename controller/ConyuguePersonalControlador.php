<?php

class ConyuguePersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($conyuguePersonal)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO conyuguePersonal (idConyuguePersonal, idPersona, idPersonal, fechaMatrimonio)
                VALUES (:idConyuguePersonal, :idPersona, :idPersonal, :fechaMatrimonio)";

      $stmtConyuPers = $this->Conexion->prepare($query);

      $stmtConyuPers->bindValue(':idConyuguePersonal', $conyuguePersonal->IdConyuguePersonal);
      $stmtConyuPers->bindValue(':idPersona', $conyuguePersonal->IdPersona);
      $stmtConyuPers->bindValue(':idPersonal', $conyuguePersonal->IdPersonal);
      $stmtConyuPers->bindValue(':fechaMatrimonio', $conyuguePersonal->FechaMatrimonio); 

      $stmtConyuPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }

  }

}

?>
