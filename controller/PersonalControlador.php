<?php

class PersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($personal)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO personal (idPersonal, idPersona, idNacion, idTipoPersonal, idCarrera, direccion, email, idCiudad, idReligion, fechaBautizmo, idSeguro, numeroSeguro, idAfp, numeroAfp, numeroLibretaMilitar, numeroPasaporte, tipoSangre, hobby, lecturaPreferencial, fechaIngreso, rutaFoto)
                VALUES (:idPersonal, :idPersona, :idNacion, :idTipoPersonal, :idCarrera, :direccion, :email, :idCiudad, :idReligion, :fechaBautizmo, :idSeguro, :numeroSeguro, :idAfp, :numeroAfp, :numeroLibretaMilitar, :numeroPasaporte, :tipoSangre, :hobby, :lecturaPreferencial, :fechaIngreso, :rutaFoto)";

      $stmtPersonal = $this->Conexion->prepare($query);

      $stmtPersonal->bindValue(':idPersonal', $personal->IdPersonal);
      $stmtPersonal->bindValue(':idPersona', $personal->IdPersona);
      $stmtPersonal->bindValue(':idNacion', $personal->IdNacion);
      $stmtPersonal->bindValue(':idTipoPersonal', $personal->IdTipoPersonal);
      $stmtPersonal->bindValue(':idCarrera', $personal->IdCarrera);
      $stmtPersonal->bindValue(':direccion', $personal->Direccion);
      $stmtPersonal->bindValue(':email', $personal->Email);
      $stmtPersonal->bindValue(':idCiudad', $personal->IdCiudad);
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
      $stmtPersonal->bindValue(':fechaIngreso', $personal->FechaIngreso);
      $stmtPersonal->bindValue(':rutaFoto', $personal->Ruta);

      $stmtPersonal->execute();

      $this->Conexion->commit();

      echo "Listo Personal {$personal->IdPersona}";

    }
    catch (PDOException $e)
    {

      //$this->Conexion->rollBack();

      echo "Error al Registrar";

    }
  }

}

?>
