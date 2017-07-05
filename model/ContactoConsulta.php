<?php

class ContactoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaContactos($departamento)
  {
    $query = "SELECT *
              FROM 
              WHERE idPersona = :idPersona";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':nombre', $departamento->nombre);
    $consulta->execute();
    $listaContactos = $consulta->fetchAll();
    return $listaContactos;
  }

}

?>
