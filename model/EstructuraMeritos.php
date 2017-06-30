<?php

class EstructuraMeritos
{

  private $IdEstructuraMerito;
  private $IdTablaMeritoDocenteProfesor;
  private $IdEstructuraMeritoPrimario;
  private $NombreMerito;
  private $PuntajeMerito;
  private $SubMeritos;
  
  function __construct(){
    $this->SubMeritos = array();
  }

  public function anadirSubMerito($merito) {
    $this->SubMeritos[] = $merito;
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

   public static function instancia($merito) {
        $estructuraMerito = new EstructuraMeritos();
        $estructuraMerito->IdEstructuraMerito = $merito["idEstructuraMerito"];
        $estructuraMerito->IdTablaMeritoDocenteProfesor = $merito["idTablaMeritoDocenteProfesor"];
        $estructuraMerito->IdEstructuraMeritoPrimario = $merito["idEstructuraMeritoPrimario"];
        $estructuraMerito->NombreMerito = $merito["nombreMerito"];
        $estructuraMerito->PuntajeMerito = $merito["puntajeMerito"];
        return $estructuraMerito;
    }

}

?>
