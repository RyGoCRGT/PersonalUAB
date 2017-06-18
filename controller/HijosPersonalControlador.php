<?php

class HijosPersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($hijoPersonal)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO hijospersonal (idHijosPersonal, idPersona, idPersonal)
                VALUES (:idHijosPersonal, :idPersona, :idPersonal)";

      $stmtHijoPers = $this->Conexion->prepare($query);

      $stmtHijoPers->bindValue(':idHijosPersonal', $hijoPersonal->IdHijosPersonal);
      $stmtHijoPers->bindValue(':idPersona', $hijoPersonal->IdPersona);
      $stmtHijoPers->bindValue(':idPersonal', $hijoPersonal->IdPersonal);

      $stmtHijoPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function verHijos($idPersonal)
  {
    $consultaHijo = new HijosPersonalConsulta($this->Conexion);
    $datosHijos = $consultaHijo->datosHijo($idPersonal);
    //var_dump($datosHijos);
    $listaHijos = array();
    $i = 0;

    foreach ($datosHijos as $datos)
    {
      $persona = new Persona();
      $persona->IdPersona = $datos['idPersona'];
      $persona->PrimerNombre = $datos['primerNombre'];
      $persona->SegundoNombre = $datos['segundoNombre'];
      $persona->ApellidoPaterno = $datos['apellidoPaterno'];
      $persona->ApellidoMaterno = $datos['apellidoMaterno'];
      $persona->FechaNacimiento = $datos['fechaNacimiento'];

      $hijosPersonal = new HijosPersonal();
      $hijosPersonal->IdHijosPersonal = $datos['idHijosPersonal'];
      $hijosPersonal->IdPersonal = $datos['idPersonal'];
      $hijosPersonal->IdPersona = $persona;
      $listaHijos[$i] = $hijosPersonal;
      $i++;
    }

    return $listaHijos;
  }

}

?>
