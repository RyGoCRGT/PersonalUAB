<?php

class ContactoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeContactosPorDepartamento($idDepartamentoContacto)
  {
      $consulta = new ContactoConsulta($this->Conexion);
      $listaContactosDpto = $consulta-> listaDeContactosPorDepartamento($idDepartamentoContacto);
      $arregloContactosDpto = array();
      $i = 0;
      foreach ($listaContactosDpto as $registroContacto) {
        $contacto = new Contacto();
               
        $contacto->nombreTipoEmpleado = $registroContacto['tipoempleado'];
        $contacto->nombreResponsabilidad = $registroContacto['responsabilidad'];
        $contacto->idContacto = $registroContacto['idContacto'];
        $contacto->apellidoPaterno = $registroContacto['apellidoPaterno'];
        $contacto->apellidoMaterno = $registroContacto['apellidoMaterno'];
        $contacto->apellidoCasada = $registroContacto['apellidoCasada'];
        $contacto->primerNombre = $registroContacto['primerNombre'];
        $contacto->segundoNombre = $registroContacto['segundoNombre'];
        $contacto->interno = $registroContacto['interno'];
        $contacto->voip = $registroContacto['voip'];
        $contacto->fechaNacimiento = $registroContacto['fechaNacimiento'];
        $contacto->sexo = $registroContacto['sexo'];
        $contacto->emailPersonal = $registroContacto['emailPersonal'];
        $contacto->emailInstitucional = $registroContacto['emailInstitucional'];

        $arregloContactosDpto[$i] = $contacto;
        $i++;
      }
      return $arregloContactosDpto;
  }//end function



}//end class

?>