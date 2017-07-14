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
              cp.nombreCargoPersona,

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
              pl.estado,

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

              FROM (personal as pl LEFT JOIN carrera as c ON pl.idCarrera = c.idCarrera)
                   LEFT JOIN cargoPersona cp ON cp.idCargoPersona = pl.idCargoPersona,
                   persona p,
                   nacion n,
                   tipoPersonal tp,
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

  public function listaPersonal()
  {
    $query = "SELECT
                p.idPersona,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.CI,
                p.fechaNacimiento,
                p.sexo,
                pl.idPersonal,
                pl.idCarrera,
                pl.idCargoPersona,
                tp.nombreTipoPersonal,
                pl.estado
              FROM
                personal pl,
                persona p,
                tipoPersonal tp
              WHERE
                p.idPersona=pl.idPersona
              AND pl.idTipoPersonal = tp.idTipoPersonal";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existePersonal($id)
  {
    $query = "SELECT
                idPersonal, idPersona
              FROM
                personal
              WHERE
                idPersona = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
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

  public function updateDown($personal)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  personal
                SET
                  estado = 0
                WHERE idPersonal = :idPersonal";

      $stmtPersonal = $this->Conexion->prepare($query);

      $stmtPersonal->bindValue(':idPersonal', $personal->IdPersonal);

      $stmtPersonal->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function updateUp($personal)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  personal
                SET
                  estado = 1
                WHERE idPersonal = :idPersonal";

      $stmtPersonal = $this->Conexion->prepare($query);

      $stmtPersonal->bindValue(':idPersonal', $personal->IdPersonal);

      $stmtPersonal->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function edit($personal)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = 'UPDATE
                  personal
                SET
                  idNacion = :idNacion,
                  idTipoPersonal = :idTipoPersonal,
                  idCarrera = :idCarrera,
                  idCargoPersona = :idCargoPersona,
                  direccion = :direccion,
                  email = :email,
                  idCiudad = :idCiudad,
                  idReligion = :idReligion,
                  fechaBautizmo = :fechaBautizmo,
                  idSeguro = :idSeguro,
                  numeroSeguro = :numeroSeguro,
                  idAfp = :idAfp,
                  numeroAfp = :numeroAfp,
                  numeroLibretaMilitar = :numeroLibretaMilitar,
                  numeroPasaporte = :numeroPasaporte,
                  tipoSangre = :tipoSangre,
                  hobby = :hobby,
                  lecturaPreferencial = :lecturaPreferencial,
                  numeroRegistroProfesional = :numeroRegistroProfesional,
                  fechaIngreso = :fechaIngreso,
                  rutaFoto = :rutaFoto
                WHERE
                  idPersonal = :idPersonal';

      $stmtPersonal = $this->Conexion->prepare($query);

      $stmtPersonal->bindValue(':idPersonal', $personal->IdPersonal);
      $stmtPersonal->bindValue(':idNacion', $personal->IdNacion);
      $stmtPersonal->bindValue(':idTipoPersonal', $personal->IdTipoPersonal);
      $stmtPersonal->bindValue(':idCarrera', $personal->IdCarrera);
      $stmtPersonal->bindValue(':idCargoPersona', $personal->IdCargo);
      $stmtPersonal->bindValue(':direccion', $personal->Direccion);
      $stmtPersonal->bindValue(':email', $personal->Email);
      $stmtPersonal->bindValue(':idCiudad', $personal->IdCiudadNacimiento);
      $stmtPersonal->bindValue(':idReligion', $personal->IdReligion);
      $stmtPersonal->bindValue(':fechaBautizmo', $personal->FechaBautizmo);
      $stmtPersonal->bindValue(':idSeguro', $personal->IdSeguro);
      $stmtPersonal->bindValue(':numeroSeguro', $personal->NumeroSeguro);
      $stmtPersonal->bindValue(':idAfp', $personal->IdAfp);
      $stmtPersonal->bindValue(':numeroAfp', $personal->NumeroAfp);
      $stmtPersonal->bindValue(':numeroLibretaMilitar', $personal->NumeroLibretaMilitar);
      $stmtPersonal->bindValue(':numeroPasaporte', $personal->NumeroPasaporte);
      $stmtPersonal->bindValue(':tipoSangre', $personal->TipoSangre);
      $stmtPersonal->bindValue(':hobby', $personal->Hobby);
      $stmtPersonal->bindValue(':lecturaPreferencial', $personal->LecturaPreferencial);
      $stmtPersonal->bindValue(':numeroRegistroProfesional', $personal->NumeroRegistroProfesional);
      $stmtPersonal->bindValue(':fechaIngreso', $personal->FechaIngreso);
      $stmtPersonal->bindValue(':rutaFoto', $personal->Ruta);

      $stmtPersonal->execute();

      $this->Conexion->commit();
      return 1;
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
      return 0;
    }
  }

  public function limpiarCargos($id)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "DELETE FROM
                  cargoPersonal
                WHERE
                  idPersonal = :idPersonal";

      $stmtPersonal = $this->Conexion->prepare($query);

      $stmtPersonal->bindValue(':idPersonal', $id);

      $stmtPersonal->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function limpiarEnfermedades($id)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "DELETE FROM
                  enfermedadpersonal
                WHERE
                  idPersonal = :idPersonal";

      $stmtPersonal = $this->Conexion->prepare($query);

      $stmtPersonal->bindValue(':idPersonal', $id);

      $stmtPersonal->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function limpiarDeportes($id)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "DELETE FROM
                  deportepersonal
                WHERE
                  idPersonal = :idPersonal";

      $stmtPersonal = $this->Conexion->prepare($query);

      $stmtPersonal->bindValue(':idPersonal', $id);

      $stmtPersonal->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function todoElPersonal()
  {
    $query = "SELECT
                pl.idPersonal,

                pl.direccion,
                pl.email,

                pl.fechaBautizmo,

                pl.numeroSeguro,

                pl.numeroAfp,
                pl.numeroLibretaMilitar,
                pl.numeroPasaporte,
                pl.tipoSangre,
                pl.hobby,
                pl.lecturaPreferencial,
                pl.numeroRegistroProfesional,
                pl.fechaIngreso,
                pl.rutaFoto,
                pl.estado,

                p.idPersona,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.CI,

                p.fechaNacimiento,
                p.sexo,
	              tp.nombreTipoPersonal

              FROM persona p, personal pl, tipoPersonal tp
              WHERE p.idPersona = pl.idPersona
              and pl.idTipoPersonal = tp.idTipoPersonal
              and pl.estado = 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function todoElPersonalEntre($post)
  {
    //var_dump($post);
    $query = "SELECT
                pl.idPersonal,

                pl.direccion,
                pl.email,

                pl.fechaBautizmo,

                pl.numeroSeguro,

                pl.numeroAfp,
                pl.numeroLibretaMilitar,
                pl.numeroPasaporte,
                pl.tipoSangre,
                pl.hobby,
                pl.lecturaPreferencial,
                pl.numeroRegistroProfesional,
                pl.fechaIngreso,
                pl.rutaFoto,
                pl.estado,

                p.idPersona,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.CI,

                p.fechaNacimiento,
                p.sexo,
              	tp.nombreTipoPersonal

              FROM persona p, personal pl, tipoPersonal tp
              WHERE p.idPersona = pl.idPersona
              and pl.idTipoPersonal = tp.idTipoPersonal
              and pl.estado = 1
              and pl.fechaIngreso BETWEEN :inicio AND :fin";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':inicio', $post['fechaInicio']);
    $consulta->bindValue(':fin', $post['fechaFin']);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function algunPersonal($post)
  {
    $query = "SELECT
                pl.idPersonal,

                pl.direccion,
                pl.email,

                pl.fechaBautizmo,

                pl.numeroSeguro,

                pl.numeroAfp,
                pl.numeroLibretaMilitar,
                pl.numeroPasaporte,
                pl.tipoSangre,
                pl.hobby,
                pl.lecturaPreferencial,
                pl.numeroRegistroProfesional,
                pl.fechaIngreso,
                pl.rutaFoto,
                pl.estado,

                p.idPersona,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.CI,

                p.fechaNacimiento,
                p.sexo,
	              tp.nombreTipoPersonal

              FROM persona p, personal pl, tipoPersonal tp
              WHERE p.idPersona = pl.idPersona
              and pl.idTipoPersonal = tp.idTipoPersonal
              and pl.idTipoPersonal = :id
              and pl.estado = 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':id', $post['tipoPersonal']);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function algunPersonalEntre($post)
  {
    $query = "SELECT
                pl.idPersonal,

                pl.direccion,
                pl.email,

                pl.fechaBautizmo,

                pl.numeroSeguro,

                pl.numeroAfp,
                pl.numeroLibretaMilitar,
                pl.numeroPasaporte,
                pl.tipoSangre,
                pl.hobby,
                pl.lecturaPreferencial,
                pl.numeroRegistroProfesional,
                pl.fechaIngreso,
                pl.rutaFoto,
                pl.estado,

                p.idPersona,
                p.primerNombre,
                p.segundoNombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.CI,

                p.fechaNacimiento,
                p.sexo,
	              tp.nombreTipoPersonal

              FROM persona p, personal pl, tipoPersonal tp
              WHERE p.idPersona = pl.idPersona
              and pl.idTipoPersonal = tp.idTipoPersonal
              and pl.idTipoPersonal = :id
              and pl.fechaIngreso BETWEEN :inicio AND :fin
              and pl.estado = 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':inicio', $post['fechaInicio']);
    $consulta->bindValue(':fin', $post['fechaFin']);
    $consulta->bindValue(':id', $post['tipoPersonal']);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
    }

  public function cantidadTotalPersonalDocente()
  {
    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $cantidadIngenieria = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 2";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $cantidadSalud = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 3";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $cantidadEducacion = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 4";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $cantidadTeologia = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 5";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $cantidadFCEA = $consulta->fetch();

    $registro = array(0 => round($cantidadIngenieria['cantidad'],1),
            				  1 => round($cantidadSalud['cantidad'],1),
            				  2 => round($cantidadEducacion['cantidad'],1),
            				  3 => round($cantidadTeologia['cantidad'],1),
            				  4 => round($cantidadFCEA['cantidad'],1)
            				  );

    return $registro;
  }

  ///
  public function cantidadTotalSexoPersonalDocente($post)
  {
    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f, persona pe
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.idPersona = pe.idPersona
              and pe.sexo = :sexo
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 1";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':sexo', $post['sexo']);
    $consulta->execute();
    $cantidadIngenieria = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f, persona pe
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.idPersona = pe.idPersona
              and pe.sexo = :sexo
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 2";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':sexo', $post['sexo']);
    $consulta->execute();
    $cantidadSalud = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f, persona pe
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.idPersona = pe.idPersona
              and pe.sexo = :sexo
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 3";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':sexo', $post['sexo']);
    $consulta->execute();
    $cantidadEducacion = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f, persona pe
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.idPersona = pe.idPersona
              and pe.sexo = :sexo
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 4";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':sexo', $post['sexo']);
    $consulta->execute();
    $cantidadTeologia = $consulta->fetch();

    $query = "SELECT
                count(p.idPersonal) as cantidad
              FROM personal p, cargoPersona cp, carrera c, facultad f, persona pe
              where p.idCargoPersona = cp.idCargoPersona
      	      and p.idCarrera = c.idCarrera
      	      and c.idFacultad = f.idFacultad
              and p.idPersona = pe.idPersona
              and pe.sexo = :sexo
              and p.estado = 1
              and p.idCargoPersona = 1
      	      and f.idFacultad = 5";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':sexo', $post['sexo']);
    $consulta->execute();
    $cantidadFCEA = $consulta->fetch();

    $registro = array(0 => round($cantidadIngenieria['cantidad'],1),
            				  1 => round($cantidadSalud['cantidad'],1),
            				  2 => round($cantidadEducacion['cantidad'],1),
            				  3 => round($cantidadTeologia['cantidad'],1),
            				  4 => round($cantidadFCEA['cantidad'],1)
            				  );

    return $registro;
  }

}

?>
