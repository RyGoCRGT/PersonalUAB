<?php

class PersonaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function existePersonaCrear($ci)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona where CI=:ci');
    $consulta->bindParam(':ci', $ci);
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

  public function obtenerIdPersona($ci)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona where CI=:ci');
    $consulta->bindParam(':ci', $ci);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }
  public function listaPersona()
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona');
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function listaTelefonos($id)
  {
    $query = "SELECT *
              FROM telefono
              WHERE idPersona = :idPersona";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idPersona', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
