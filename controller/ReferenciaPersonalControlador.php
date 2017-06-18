<?php

class ReferenciaPersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($referenciaPersonal)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO referenciapersonal (idReferenciaPersonal, idPersona, idPersonal)
                VALUES (:idReferenciaPersonal, :idPersona, :idPersonal)";

      $stmtReferenciaPers = $this->Conexion->prepare($query);

      $stmtReferenciaPers->bindValue(':idReferenciaPersonal', $referenciaPersonal->IdReferenciaPersonal);
      $stmtReferenciaPers->bindValue(':idPersona', $referenciaPersonal->IdPersona);
      $stmtReferenciaPers->bindValue(':idPersonal', $referenciaPersonal->IdPersonal);

      $stmtReferenciaPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function ver($idPersonal)
  {
    $consultaReferencia = new ReferenciaPersonalConsulta($this->Conexion);
    $datos = $consultaReferencia->datosReferencia($idPersonal);

    $persona = new Persona();
    $persona->IdPersona = $datos['idPersona'];
    $persona->PrimerNombre = $datos['primerNombre'];
    $persona->SegundoNombre = $datos['segundoNombre'];
    $persona->ApellidoPaterno = $datos['apellidoPaterno'];
    $persona->ApellidoMaterno = $datos['apellidoMaterno'];

    $consultaTele = new PersonaConsulta($this->Conexion);
    $listaTelefonos = $consultaTele->listaTelefonos($persona->IdPersona);

    foreach ($listaTelefonos as $listT)
    {
      $persona->setListaTelefonos($listT['numeroTelefono']);
    }

    $referenciaPersonal = new ReferenciaPersonal();
    $referenciaPersonal->IdReferenciaPersonal = $datos['idReferenciaPersonal'];
    $referenciaPersonal->IdPersona = $persona;
    $referenciaPersonal->IdPersonal = $datos['idPersonal'];

    return $referenciaPersonal;
  }

}

?>
