<?php

  class Usuarios
  {

    private $IdUsuario;
    private $Usuario;
    private $Contrasena;
    private $Estado;
    private $Borrado;

    private $C_Persona;
    private $C_TipoUsuario;

    function __construct($user, $pass)
    {
      $this->Usuario = $user;
      $this->Contrasena = $pass;
    }

    public function __set($atributo, $value)
    {
      if (property_exists($this, $atributo)) {
        $this->$atributo = $value;
      }else {
        echo "Error al encontrar Atributo SET {$atributo} .";
      }
    }

    public function __get($atributo)
    {
      if (property_exists($this, $atributo)) {
        return $this->$atributo;
      }else {
        return "Error al encontrar Atributo GET {$atributo} .";
      }

    }

  }

?>
