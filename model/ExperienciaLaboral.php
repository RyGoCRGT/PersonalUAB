<?php

class ExperienciaLaboral
{

  private $IdExperienciaLaboral;
  private $IdPersonal;
  private $NombreInstitucion;
  private $CargoResponsabilidad;
  private $AniosDeServicio;
  private $ReligionInstitucion;
  private $MotivoRetiro;

  function __construct()
  {
    $this->IdExperienciaLaboral = null;
    $this->ReligionInstitucion = null;
    $this->MotivoRetiro = null;
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
