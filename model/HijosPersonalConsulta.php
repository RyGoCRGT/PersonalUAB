<?php

class HijosPersonalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function datosHijo($id)
  {
    $query = "SELECT
                hp.idHijosPersonal,
                hp.idPersona,
                hp.idPersonal,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.fechaNacimiento,
                p.idPersona
              FROM
                hijospersonal hp,
                persona p
              WHERE
                  p.idPersona = hp.idPersona
              AND hp.idPersonal = :idPersonal";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idPersonal', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
