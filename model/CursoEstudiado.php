<?php

class CursoEstudiado
{

  private $IdCursoEstudiado;
  private $IdPersonal;
  private $NombreInstitucion;
  private $CursoEstudiado;
  private $AnhoEstudio;
  Private $ReligionInstitucion;
  Private $RespaldoTituloPDF;

  function __construct()
  {
    $this->IdCursoEstudiado = null;
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
