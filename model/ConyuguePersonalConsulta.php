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

}

?>
