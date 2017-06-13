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

  private $ListaTelefonos;

  function __construct()
  {
    $this->IdPersona = null;
    $this->CI = null;
    $this->LugarExpedicion = null;
    $this->FechaNacimiento = null;
    $this->Sexo = null;
    $this->EstadoCivil = null;
    $this->ListaTelefonos = array();
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

  public function getListaTelefonos(){ return $this->ListaTelefonos; }
  public function setListaTelefonos($value){ $this->ListaTelefonos[] = $value; }

}

?>
