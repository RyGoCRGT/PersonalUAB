<?php

class DepartamentoContactoConsulta
{
  
  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDepartamentoContacto()
  {
      $query = "SELECT * FROM departamentocontato ORDER BY nombre";
      $consulta=$this->Conexion->prepare($query);
      $consulta->execute();
      $registro=$consulta->fetchAll();
      return $registro;
  }

  public function datosDepartamentoContacto($idTipoDepartamentoContacto)
  {   
      $query =  "SELECT dc.idDepartamentoContacto, dc.nombre, dc.direccion,dc.email, 
                        dc.direccionWeb, dc.casillaPostal, dc.rutaLogo
                 FROM tipodepartamentocontacto tdc, departamentocontacto dc
                 WHERE dc.idTipoDepartamentoContacto = :idTipoDepartamentoContacto
                 AND dc.idTipoDepartamentoContacto = tdc.idTipoDepartamentoContacto
                ";

      $consulta=$this->Conexion->prepare($query);
      $consulta->bindParam(':idTipoDepartamentoContacto',$idTipoDepartamentoContacto);
      $consulta->execute();
      //$registro = $consulta->fetchAll();
      $datosDepartamento = $consulta->fetch(PDO::FETCH_ASSOC);
      //$registro = $consulta->fetch();
      return $datosDepartamento;
  }

}//end class
?>
