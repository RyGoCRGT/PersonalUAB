<?php

class TelefonoDepartamentoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTelefonoDepartamento($idDepartamentoContacto)
  {
    $query = "SELECT td.prefijo, td.tipoTelefono, td.numero
              FROM departamentocontacto dc, telefonodepartamento td
              WHERE dc.idDepartamentoContacto = :idDepartamentoContacto
              AND dc.idDepartamentoContacto = td.idDepartamentoContacto
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idDepartamentoContacto', $idDepartamentoContacto);
    $consulta->execute();
    $listaTelfDpto = $consulta->fetchAll();
    return $listaTelfDpto;
  }//end function

}//end class

?>
