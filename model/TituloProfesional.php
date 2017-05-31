<?php

class TituloProfesional
{

  private $TituloProfesional;
  private $IdTipoTituloProfesional;
  private $IdPersonal;
  private $NombreInstitucion;
  private $CursoProfesionalEstudiado;
  private $TiempoEstudio;
  private $ReligionInstitucion;
  private $RespaldoTituloPDF;

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
