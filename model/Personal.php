<?php

class Personal
{

  private $IdPersonal;
  private $IdPersona;
  private $IdNacion;
  private $IdTipoPersonal;
  private $IdCarrera;
  private $IdDireccion;
  private $Email;
  private $CiudadNacimiento;
  private $Religion;
  private $FechaBautizmo;
  private $NumeroSeguro;
  private $IdAfp;
  private $NumeroLibretaMilitar;
  private $NumeroPasaporte;
  private $TipoSangre;
  private $Hobby;
  private $LecturaPreferencial;
  private $FechaIngreso;


  function __construct()
  {
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
