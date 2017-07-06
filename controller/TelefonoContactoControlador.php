<?php

class TelefonoContactoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listarTelefonoContacto($idContacto)
  {
      $consulta = new TelefonoContactoConsulta($this->Conexion);
      $listaTelefonosContacto = $consulta-> listaTelefonoContacto($idContacto);
      $arregloTelefonosContacto = array();
      $i = 0;
      foreach ($listaTelefonosContacto as $registroTelefonoContacto) {
        $telefonoContacto = new TelefonoContacto();
        $telefonoContacto->tipoTelefono = $registroTelefonoContacto['tipoTelefono'];
        $telefonoContacto->numero = $registroTelefonoContacto['numero'];
        $arregloTelefonosContacto[$i] = $telefonoContacto;
        $i++;
      }
      return $arregloTelefonosContacto;
  }//fin function

}//end class

?>
