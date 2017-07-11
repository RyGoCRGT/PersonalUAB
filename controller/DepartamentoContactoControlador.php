<?php


class DepartamentoContactoControlador
{

    private $Conexion;

    function __construct($con)
    {
      $this->Conexion = $con;
    }

    public function datosDepartamentoContacto($idTipoDepartamentoContacto)
    {
      $consulta = new DepartamentoContactoConsulta($this->Conexion);
      $datosDepartamento = $consulta->datosDepartamentoContacto($idTipoDepartamentoContacto);
      return $datosDepartamento;
    }//end function

    public function listaDepartamentos()
    {
      $consulta = new DepartamentoContactoConsulta($this->Conexion);
      return $datosDepartamento = $consulta->listaDepartamentoContacto();
    }//end function


}//end class

?>
