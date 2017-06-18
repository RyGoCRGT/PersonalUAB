<?php

class ConyuguePersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($conyuguePersonal)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO conyuguePersonal (idConyuguePersonal, idPersona, idPersonal, fechaMatrimonio)
                VALUES (:idConyuguePersonal, :idPersona, :idPersonal, :fechaMatrimonio)";

      $stmtConyuPers = $this->Conexion->prepare($query);

      $stmtConyuPers->bindValue(':idConyuguePersonal', $conyuguePersonal->IdConyuguePersonal);
      $stmtConyuPers->bindValue(':idPersona', $conyuguePersonal->IdPersona);
      $stmtConyuPers->bindValue(':idPersonal', $conyuguePersonal->IdPersonal);
      $stmtConyuPers->bindValue(':fechaMatrimonio', $conyuguePersonal->FechaMatrimonio);

      $stmtConyuPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }

  }

  public function ver($idPersonal)
  {
    $consultaConyugue = new ConyuguePersonalConsulta($this->Conexion);
    $datos = $consultaConyugue->datosConyugue($idPersonal);

    $persona = new Persona();
    $persona->IdPersona = $datos['idPersona'];
    $persona->PrimerNombre = $datos['primerNombre'];
    $persona->SegundoNombre = $datos['segundoNombre'];
    $persona->ApellidoPaterno = $datos['apellidoPaterno'];
    $persona->ApellidoMaterno = $datos['apellidoMaterno'];
    $persona->FechaNacimiento = $datos['fechaNacimiento'];

    $conyuguePersonal = new ConyuguePersonal();
    $conyuguePersonal->IdConyuguePersonal = $datos['idConyuguePersonal'];
    $conyuguePersonal->IdPersonal = $datos['idPersonal'];
    $conyuguePersonal->IdPersona = $persona;
    $conyuguePersonal->FechaMatrimonio = $datos['fechaMatrimonio'];

    return $conyuguePersonal;
  }

}

?>
