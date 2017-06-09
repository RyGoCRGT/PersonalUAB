<?php

class Personal
{

  private $IdPersonal;
  private $IdPersona;
  private $IdNacion;
  private $IdTipoPersonal;
  private $IdCarrera;
  private $Direccion;
  private $Email;
  private $IdCiudadNacimiento;
  private $IdReligion;
  private $FechaBautizmo;
  private $IdSeguro;
  private $NumeroSeguro;
  private $IdAfp;
  private $NumeroAfp;
  private $NumeroLibretaMilitar;
  private $NumeroPasaporte;
  private $TipoSangre;
  private $Hobby;
  private $LecturaPreferencial;
  private $FechaIngreso;
  private $Ruta;

  function __construct()
  {
    $this->IdPersonal = null;
    $this->IdCarrera = null;
    $this->IdReligion = null;
    $this->FechaBautizmo = null;
    $this->NumeroLibretaMilitar = null;
    $this->NumeroPasaporte = null;
    $this->Ruta =  null;
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
