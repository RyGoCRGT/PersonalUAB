<?php

class Personal
{

  private $IdPersonal;
  private $IdPersona;
  private $IdNacion;
  private $IdTipoPersonal;
  private $IdCarrera;
  private $IdCargo;
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
  private $NumeroRegistroProfesional;
  private $FechaIngreso;
  private $Ruta;

  private $C_Conyugue;
  private $C_HijosLista;
  private $C_Referencia;

  private $ListaEnfermedades;
  private $ListaDeportes;
  private $ListaCargos;

  private $ListaCursos;
  private $ListaTitulos;
  private $ListaExperinciaLaboral;

  private $C_EvaluacionMeritos;
  private $C_AutoEvaluacionMeritos;

  function __construct()
  {
    $this->IdPersonal = null;
    $this->IdCarrera = null;
    $this->IdCargo = null;
    $this->IdReligion = null;
    $this->FechaBautizmo = null;
    $this->NumeroLibretaMilitar = null;
    $this->NumeroPasaporte = null;
    $this->Ruta =  null;
    $this->NumeroRegistroProfesional = null;
    $this->C_HijosLista = array();
    $this->ListaEnfermedades = array();
    $this->ListaDeportes = array();
    $this->ListaCargos = array();
    $this->ListaCursos = array();
    $this->ListaTitulos = array();
    $this->ListaExperinciaLaboral = array();
    $this->C_EvaluacionMeritos = array();
    $this->C_AutoEvaluacionMeritos = array();
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

  public function getC_HijosLista(){ return $this->C_HijosLista; }
  public function setC_HijosLista($value){ $this->C_HijosLista[] = $value; }

  public function getListaEnfermedades(){ return $this->ListaEnfermedades; }
  public function setListaEnfermedades($value){ $this->ListaEnfermedades[] = $value; }

  public function getListaDeportes(){ return $this->ListaDeportes; }
  public function setListaDeportes($value){ $this->ListaDeportes[] = $value; }

  public function getListaCargos(){ return $this->ListaCargos; }
  public function setListaCargos($value){ $this->ListaCargos[] = $value; }

  public function setListaCursos($value){ $this->ListaCursos[] = $value; }

  public function setListaTitulos($value){ $this->ListaTitulos[] = $value; }

  public function setListaExperinciaLaboral($value){ $this->ListaExperinciaLaboral[] = $value; }

  public function setListaC_EvaluacionMeritos($value){ $this->C_EvaluacionMeritos[] = $value; }
  public function setListaC_AutoEvaluacionMeritos($value){ $this->C_AutoEvaluacionMeritos[] = $value; }

}

?>
