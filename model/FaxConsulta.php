<?php

class FaxConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaFaxDepartamento($idDepartamentoContacto)
  {
    $query = "SELECT f.prefijo, f.numero
              FROM departamentocontacto dc, fax f
              WHERE dc.idDepartamentoContacto = :idDepartamentoContacto
              AND dc.idDepartamentoContacto = f.idDepartamentoContacto
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idDepartamentoContacto', $idDepartamentoContacto);
    $consulta->execute();
    $listaFax = $consulta->fetchAll();
    return $listaFax;
  }
  
}//end class

?>
