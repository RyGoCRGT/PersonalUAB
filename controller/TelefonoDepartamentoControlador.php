<?php

class TelefonoDepartamentoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTelefonoDepartamento($idDepartamentoContacto)
  {
      $consulta = new TelefonoDepartamentoConsulta($this->Conexion);
      $listaTelefonoDepartamento = $consulta->listaTelefonoDepartamento($idDepartamentoContacto);
      $arregloTelefonosDepartamento = array();
      $i = 0;
      foreach ($listaTelefonoDepartamento as $registroTelfDpto) {
        $telefonoDpto = new TelefonoDepartamento();
        $telefonoDpto->prefijo = $registroTelfDpto['prefijo'];
        $telefonoDpto->tipoTelefono = $registroTelfDpto['tipoTelefono'];
        $telefonoDpto->numero = $registroTelfDpto['numero'];
        $arregloTelefonosDepartamento[$i] = $telefonoDpto;
        $i++;
      }
      return $arregloTelefonosDepartamento;
  }//fin function

}//end class

?>
