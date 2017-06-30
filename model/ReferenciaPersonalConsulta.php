<?php

class ReferenciaPersonalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function datosReferencia($id)
  {
    $query = "SELECT
                rp.idReferenciaPersonal,
                rp.idPersona,
                rp.idPersonal,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.idPersona
              FROM
                referenciapersonal rp,
                persona p
              WHERE
                  p.idPersona = rp.idPersona
              AND rp.idPersonal = :idPersonal";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idPersonal', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

}

?>
