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
    $consulta = $this->Conexion->prepare('SELECT idPersona FROM persona where CI=:ci');
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

}

?>
