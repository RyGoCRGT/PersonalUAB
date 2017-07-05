<?php

class ContactoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }


  public function listar()
  {
    $consulta = new PersonalConsulta($this->Conexion);

    $listaPersonal = $consulta->listaPersonal();

    $listArrayPersonal = array();
    
    $i = 0;
    foreach ($listaPersonal as $listaP) {
      $persona = new Persona();
      $persona->IdPersona = $listaP['idPersona'];
      $persona->PrimerNombre = $listaP['primerNombre'];
      $persona->SegundoNombre = $listaP['segundoNombre'];
      $persona->ApellidoPaterno = $listaP['apellidoPaterno'];
      $persona->ApellidoMaterno = $listaP['apellidoMaterno'];
      $persona->CI = $listaP['CI'];
      $persona->FechaNacimiento = $listaP['fechaNacimiento'];
      $persona->Sexo = $listaP['sexo'];

      $personal = new Personal();
      $personal->IdPersonal = $listaP['idPersonal'];
      $personal->IdPersona = $persona;
      $personal->IdCarrera = $listaP['idCarrera'];
      $personal->IdCargo = $listaP['idCargoPersona'];

      $listArrayPersonal[$i] = $personal;
      $i++;
    }
    return $listArrayPersonal;
  }

  }

?>