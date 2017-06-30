

<?php

class CumpleConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeCumples($mes)
  {
    $query = "SELECT pl.rutaFoto,pl.email,p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.fechaNacimiento
              FROM personal pl, persona p
              WHERE pl.idPersona=p.idPersona
              AND  MONTH(p.fechaNacimiento)=:mes";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':mes',$mes);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
