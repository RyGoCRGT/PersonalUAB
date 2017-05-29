<?php

class Persona
{

  private $IdPersona;
  private $PrimerNombre;
  private $SegundoNombre;
  private $ApellidoPaterno;
  private $ApellidoMaterno;
  private $CI;
  private $LugarExpedicion;
  private $FechaNacimiento;
  private $Sexo;
  private $EstadoCivil;

  function __construct($primerName, $segundoName, $apellidoPaterno, $apellidoMaterno, $ci, $lugarExp, $fechaNac, $sexo, $estadoCivil)
  {
    $this->IdPersona = null;
    $this->PrimerNombre = $primerName;
    $this->SegundoNombre = $segundoName;
    $this->ApellidoPaterno = $apellidoPaterno;
    $this->ApellidoMaterno = $apellidoMaterno;
    $this->CI = $ci;
    $this->LugarExpedicion = $lugarExp;
    $this->FechaNacimiento = $fechaNac;
    $this->Sexo = $sexo;
    $this->EstadoCivil = $estadoCivil;
  }

  public function __set($atributo, $value)
  {
    if (property_exists($this, $atributo))
    {
      $this->$atributo = $value;
    }
    else
    {
      echo "Error al encontrar Atributo SET {$atributo} .";
    }
  }

  public function __get($atributo)
  {
    if (property_exists($this, $atributo))
    {
      return $this->$atributo;
    }
    else
    {
      return "Error al encontrar Atributo GET {$atributo} .";
    }

  }

}

?>
