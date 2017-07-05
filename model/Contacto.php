<?php

class Contacto
{
  private $idContacto;
  private $idDepartamentoContacto;
  private $idTipoEmpleado;
  private $idResponsabilidad;
  private $primerNombre;
  private $segundoNombre;
  private $apellidoPaterno;
  private $apellidoMaterno;
  private $apellidoCasada;
  private $sexo;
  private $fechaNacimiento;
  private $interno;
  private $voip;
  private $cumpleanios;
  private $emailInstitucional;
  private $emailPersonal;


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
