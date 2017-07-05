<?php

class DepartamentoContacto
{
  private $idDepartamentoContacto;
  private $idTipoDepartamentoContacto;
  private $nombre;
  private $direccion;
  private $email;
  private $direccionWeb;
  private $casillaPostal;
  private $rutaLogo;


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
