<?php

class Noticia
{

  private $IdNoticia;
  private $Titulo;
  private $Contenido;
  private $Estado;
  private $RutaImagen;
  private $FechaPublicacion;

  private $C_TipoNoticia;
  private $C_Usuario;
  private $C_EspecificacionUsario;

  function __construct()
  {
    $this->IdNoticia = null;
    $this->Estado = 1;
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
