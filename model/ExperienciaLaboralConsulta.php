<?php

class ExperienciaLaboralConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaExperienciaPersonal($idPersonal)
  {
    $query = "SELECT *
              FROM experiencialaboral
              WHERE idPersonal = :idPersonal
              ORDER BY cargoResponsabilidad";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeExperiencia($idPersonal, $nombreInstitucion, $cargo)
  {

    $query = 'SELECT *
              FROM experiencialaboral
              WHERE idPersonal = :idPersonal
              and nombreInstitucion = :nombreInstitucion
              and cargoResponsabilidad = :cargo;';
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->bindValue(':nombreInstitucion', $nombreInstitucion);
    $consulta->bindValue(':cargo', $cargo);
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

  public function guardar($experiencialaboral)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO experiencialaboral (idExperienciaLaboral, idPersonal, nombreInstitucion, cargoResponsabilidad, aniosDeServicio, religionInstitucion, motivoRetiro)
                VALUES (:idExperienciaLaboral, :idPersonal, :nombreInstitucion, :cargoResponsabilidad, :aniosDeServicio, :religionInstitucion, :motivoRetiro)";

      $stmtExperiencia = $this->Conexion->prepare($query);

      $stmtExperiencia->bindValue(':idExperienciaLaboral', $experiencialaboral->IdExperienciaLaboral);
      $stmtExperiencia->bindValue(':idPersonal', $experiencialaboral->IdPersonal);
      $stmtExperiencia->bindValue(':nombreInstitucion', $experiencialaboral->NombreInstitucion);
      $stmtExperiencia->bindValue(':cargoResponsabilidad', $experiencialaboral->CargoResponsabilidad);
      $stmtExperiencia->bindValue(':aniosDeServicio', $experiencialaboral->AniosDeServicio);
      $stmtExperiencia->bindValue(':religionInstitucion', $experiencialaboral->ReligionInstitucion);
      $stmtExperiencia->bindValue(':motivoRetiro', $experiencialaboral->MotivoRetiro);

      $stmtExperiencia->execute();

      $this->Conexion->commit();

      return true;

    }
    catch (PDOException $e)
    {

      $this->Conexion->rollBack();

      echo "<p style='color:red'>Error al Registrar DB</p>";

      return false;

    }
  }

}
?>
