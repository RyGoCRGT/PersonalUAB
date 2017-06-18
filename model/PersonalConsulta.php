<?php

class PersonalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function obtenerIdPersonal($id)
  {
    $query = "SELECT  *
              FROM personal
              where idPersona=:id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function datosPersonal($id)
  {
    $query = "SELECT
              pl.idPersonal,

              n.nombreNacion,

              tp.nombreTipoPersonal,

              c.nombreCarrera,

              pl.direccion,
              pl.email,

              ci.nombreCiudad,

              r.nombreReligion,

              pl.fechaBautizmo,

              s.nombreSeguro,

              pl.numeroSeguro,

              af.nombreAfp,

              pl.numeroAfp,
              pl.numeroLibretaMilitar,
              pl.numeroPasaporte,
              pl.tipoSangre,
              pl.hobby,
              pl.lecturaPreferencial,
              pl.numeroRegistroProfesional,
              pl.fechaIngreso,
              pl.rutaFoto,

              p.idPersona,
              p.primerNombre,
              p.segundoNombre,
              p.apellidoPaterno,
              p.apellidoMaterno,
              p.CI,

              le.nombreLugarExpedicion,

              p.fechaNacimiento,
              p.sexo,

              ec.nombreEstadoCivil

              FROM personal pl,
                   persona p,
                   nacion n,
                   tipoPersonal tp,
                   carrera c,
                   ciudad ci,
                   religion r,
                   seguro s,
                   afp af,
                   lugarexpedicion le,
                   estadoCivil ec

              WHERE af.idAfp = pl.idAfp
              AND s.idSeguro = pl.idSeguro
              AND r.idReligion = pl.idReligion
              AND ci.idCiudad = pl.idCiudad
              AND c.idCarrera = pl.idCarrera
              AND tp.idTipoPersonal = pl.idTipoPersonal
              AND n.idNacion = pl.idNacion
              AND pl.idPersona = p.idPersona
              AND p.idLugarExpedicion = le.idLugarExpedicion
              AND p.idEstadoCivil = ec.idEstadoCivil
              AND pl.idPersona=:id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function cargosPersonal($id)
  {
    $query = "SELECT c.idCargo, c.nombreCargo, cp.idPersonal
              FROM cargo c, cargopersonal cp
              WHERE c.idCargo=cp.idCargo
              AND cp.idPersonal = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function enfermedadesPersonal($id)
  {
    $query = "SELECT e.idEnfermedad, e.nombreEnfermedad, ep.idPersonal
              FROM enfermedad e, enfermedadPersonal ep
              WHERE e.idEnfermedad=ep.idEnfermedad
              AND ep.idPersonal = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function deportesPersonal($id)
  {
    $query = "SELECT d.idDeporte, d.nombreDeporte, dp.idPersonal
              FROM deporte d, deportePersonal dp
              WHERE d.idDeporte=dp.idDeporte
              AND dp.idPersonal = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
