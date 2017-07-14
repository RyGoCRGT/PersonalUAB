<?php

class ConyuguePersonalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function datosConyugue($id)
  {
    $query = "SELECT
                cp.idConyuguePersonal,
                cp.idPersona,
                cp.idPersonal,
                cp.fechaMatrimonio,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.fechaNacimiento,
                p.idPersona
              FROM
                conyuguepersonal cp,
                persona p
              WHERE
                  p.idPersona = cp.idPersona
              AND cp.idPersonal = :idPersonal";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idPersonal', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function edit($conyuguePersonal)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "UPDATE
                  conyuguepersonal
                SET
                  idPersona = :idPersona,
                  idPersonal = :idPersonal,
                  fechaMatrimonio = :fechaMatrimonio
                WHERE
                  idConyuguePersonal = :idConyuguePersonal";

      $stmtConyuPers = $this->Conexion->prepare($query);

      $stmtConyuPers->bindValue(':idConyuguePersonal', $conyuguePersonal->IdConyuguePersonal);
      $stmtConyuPers->bindValue(':idPersona', $conyuguePersonal->IdPersona);
      $stmtConyuPers->bindValue(':idPersonal', $conyuguePersonal->IdPersonal);
      $stmtConyuPers->bindValue(':fechaMatrimonio', $conyuguePersonal->FechaMatrimonio);

      $stmtConyuPers->execute();

      $this->Conexion->commit();
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
    }

  }

}

?>
