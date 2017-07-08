<?php

class TipoDepartamentoContactoConsulta
{
  
  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTipoDepartamentoContacto()
  {
      $query = "SELECT * FROM tipodepartamentocontacto ORDER BY nombre";
      $consulta=$this->Conexion->prepare($query);
      $consulta->execute();
      $registro=$consulta->fetchAll();
      return $registro;
  }

  public function listaTipoDepartamentoContacto($idTipoDepartamentoContacto)
  {
      $query="SELECT * FROM tipodepartamentocontact WHERE idTipoDepartamentoContacto = :idTipoDepartamentoContacto";
      $consulta=$this->Conexion->prepare($query);
      $consulta->bindParam(':idTipoDepartamentoContacto',$idTipoDepartamentoContacto);
      $consulta->execute();
      $registro = $consulta->fetchAll();
      return $registro;
  }


}
?>
