<?php

class FaxControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaFaxDepartamento($idDepartamentoContacto)
  {
      $consulta = new FaxConsulta($this->Conexion);
      $listaFax = $consulta-> listaFaxDepartamento($idDepartamentoContacto);
      $arregloFax = array();
      $i = 0;
      foreach ($listaFax as $registroFax) {
        $faxDpto = new Fax();
        $faxDpto->prefijo = $registroFax['prefijo'];
        $faxDpto->numero = $registroFax['numero'];
        $arregloFax[$i] = $faxDpto;
        $i++;
      }
      return $arregloFax;
  }//fin function

}//end class

?>
