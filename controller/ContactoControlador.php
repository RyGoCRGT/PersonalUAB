<?php

class ContactoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($contacto)
  {
    try
    {
      // var_dump($contacto);
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO contacto (idContacto, idDepartamentoContacto, idTipoEmpleado, idResponsabilidad,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,apellidoCasada,sexo,fechaNacimiento,interno,voip,emailInstitucional,emailPersonal)
                VALUES (:idContacto,:idDepartamentoContacto,:idTipoEmpleado,:idResponsabilidad,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:apellidoCasada,:sexo,:fechaNacimiento,:interno,:voip,:emailInstitucional,:emailPersonal)";

      $stmtContacto = $this->Conexion->prepare($query);

      $stmtContacto->bindValue(':idContacto', $contacto->idContacto);
      $stmtContacto->bindValue(':idDepartamentoContacto', $contacto->idDepartamentoContacto);
      $stmtContacto->bindValue(':idTipoEmpleado', $contacto->idTipoEmpleado);
      $stmtContacto->bindValue(':idResponsabilidad', $contacto->idResponsabilidad);
      $stmtContacto->bindValue(':primerNombre', $contacto->primerNombre);
      if ($contacto->segundoNombre=="") {
        $stmtContacto->bindValue(':segundoNombre', null);
      }
      else {
        $stmtContacto->bindValue(':segundoNombre', $contacto->segundoNombre);
      }

      $stmtContacto->bindValue(':apellidoPaterno', $contacto->apellidoPaterno);

      if ($contacto->apellidoMaterno=="")
        $stmtContacto->bindValue(':apellidoMaterno', null);
      else
        $stmtContacto->bindValue(':apellidoMaterno', $contacto->apellidoMaterno);

      if ($contacto->apellidoCasada=="")
        $stmtContacto->bindValue(':apellidoCasada', null);
      else
        $stmtContacto->bindValue(':apellidoCasada', $contacto->apellidoCasada);

      $stmtContacto->bindValue(':sexo', $contacto->sexo);

      if ($contacto->fechaNacimiento=="")
        $stmtContacto->bindValue(':fechaNacimiento', null);
      else
        $stmtContacto->bindValue(':fechaNacimiento', $contacto->fechaNacimiento);

      if ($contacto->interno=="")
        $stmtContacto->bindValue(':interno', null);
      else
        $stmtContacto->bindValue(':interno', $contacto->interno);

      if ($contacto->voip=="")
        $stmtContacto->bindValue(':voip', null);
      else
        $stmtContacto->bindValue(':voip', $contacto->voip);

      if ($contacto->emailInstitucional=="")
        $stmtContacto->bindValue(':emailInstitucional', null);
      else
        $stmtContacto->bindValue(':emailInstitucional', $contacto->emailInstitucional);

      if ($contacto->emailPersonal=="")
        $stmtContacto->bindValue(':emailPersonal', null);
      else
        $stmtContacto->bindValue(':emailPersonal', $contacto->emailPersonal);

      $stmtContacto->execute();

      $this->Conexion->commit();

      return true;
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }

  }

  public function listaDeContactosPorDepartamento($idDepartamentoContacto)
  {
      $consulta = new ContactoConsulta($this->Conexion);
      $listaContactosDpto = $consulta->listaDeContactosPorDepartamento($idDepartamentoContacto);
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
//contacto
        $consultaTel = new TelefonoContactoConsulta($this->Conexion);
        $listaTelefonosContacto = $consultaTel->listaTelefonoContacto($registroContacto['idContacto']);
        $c = 0;
        $arregloTelefonosContacto = array();
        foreach ($listaTelefonosContacto as $registroTelefonoContacto) {
            $telefonoContacto = new TelefonoContacto();
            $telefonoContacto->tipoTelefono = $registroTelefonoContacto['tipoTelefono'];
            $telefonoContacto->numero = $registroTelefonoContacto['numero'];
            $arregloTelefonosContacto[$c] = $telefonoContacto;
            $c++;
        }
        $contacto->listaTelefonos= $arregloTelefonosContacto;
        $arregloContactosDpto[$i] = $contacto;
        $i++;
      }
      return $arregloContactosDpto;
  }//end function



}//end class

?>
