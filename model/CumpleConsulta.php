

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

    $query = "SELECT pl.rutaFoto,pl.email,p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.fechaNacimiento,tp.nombreTipoPersonal
              FROM personal pl, persona p, tipoPersonal tp
              WHERE pl.idPersona=p.idPersona
              AND pl.idTipoPersonal=tp.idTipoPersonal
              AND  MONTH(p.fechaNacimiento)=:mes";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':mes',$mes);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
