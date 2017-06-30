<?php

class Facultad
{

  private $IdFacultad;
  private $NombreFacultad;

  private $ListaCarreras;

  function __construct()
  {
    $ListaCarreras = array();
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

  public function getListaCarreras(){ return $this->ListaCarreras; }
  public function setListaCarreras( $value ){ $this->ListaCarreras[] = $value; }

}

?>
