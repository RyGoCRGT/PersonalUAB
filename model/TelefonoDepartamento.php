<?php

class TelefonoDepartamento
{
  private $idTelefono;
  private $idDepartamentoContacto;
  private $tipoTelefono;
  private $numero;
  private $prefijo;

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
