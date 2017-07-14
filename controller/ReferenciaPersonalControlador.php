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

  public function editar()
  {
    $persona = new Persona();
    $persona->IdPersona = $_POST['idPersona'];
    $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreRef']));
    $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreRef']));
    $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoRef']));
    $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoRef']));
    $persona->CI = strtoupper($_POST['ciPersonReferencia'].$_POST['primerNombreRef'].$_POST['segundoNombreRef']);

    $personalManejador = new PersonaConsulta($this->Conexion);
    $personalManejador->edit($persona);

    $telefono = new Telefono();
    $telefono->IdTelefono = $_POST['telefonoAntiguo'];
    $telefono->NumeroTelefono = $_POST['telefonoReferencia'];

    $telefonoManejador = new TelefonoConsulta($this->Conexion);
    $telefonoManejador->edit($telefono);

  }

}

?>
