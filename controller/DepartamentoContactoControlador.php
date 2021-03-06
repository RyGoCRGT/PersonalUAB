<?php

class DepartamentoContactoControlador
{
  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion=$conexion;
  }

  public function listar()
  {
    $consulta=new DepartamentoContactoConsulta($this->Conexion);
    $listaDepContacto=$consulta->listaDepartamentoContacto();
    $listaArrayDepContacto=array();
    $i=0;
    foreach ($listaDepContacto as $listaDepCon) {
      $departamentoContacto=new DepartamentoContacto();

      $departamentoContacto->idDepartamentoContacto=$listaDepCon['idDepartamentoContacto'];
      $departamentoContacto->idTipoDepartamentoContacto=$listaDepCon['idTipoDepartamentoContacto'];
      $departamentoContacto->nombre=$listaDepCon['nombre'];
      $departamentoContacto->direccion=$listaDepCon['direccion'];
      $departamentoContacto->email=$listaDepCon['email'];
      $departamentoContacto->direccionWeb=$listaDepCon['direccionWeb'];
      $departamentoContacto->casillaPostal=$listaDepCon['casillaPostal'];
      $departamentoContacto->rutaLogo=$listaDepCon['rutaLogo'];

      $listaArrayDepContacto[$i]=$departamentoContacto;
      $i++;
    }
    return $listaArrayDepContacto;

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
