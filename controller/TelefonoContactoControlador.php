<?php

class TelefonoContactoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listarTelefonoContacto($idContacto)
  {
      $consulta = new TelefonoContactoConsulta($this->Conexion);
      $listaTelefonosContacto = $consulta-> listaTelefonoContacto($idContacto);
      $arregloTelefonosContacto = array();
      $i = 0;
      foreach ($listaTelefonosContacto as $registroTelefonoContacto) {
        $telefonoContacto = new TelefonoContacto();
        $telefonoContacto->tipoTelefono = $registroTelefonoContacto['tipoTelefono'];
        $telefonoContacto->numero = $registroTelefonoContacto['numero'];
        $arregloTelefonosContacto[$i] = $telefonoContacto;
        $i++;
      }
      return $arregloTelefonosContacto;
  }//fin function

  public function crear($TelefonoContacto)
  {
    try
    {
      //var_dump($contacto); ver datos
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO telefonoContacto (idTelefonoContacto,idContacto,tipoTelefono,numero) VALUES (:idTelefonoContacto,:idContacto,:tipoTelefono,:numero)";

      $stmtContacto = $this->Conexion->prepare($query);

      $stmtContacto->bindValue(':idTelefonoContacto', null);
      $stmtContacto->bindValue(':idContacto', $TelefonoContacto->idContacto);
      $stmtContacto->bindValue(':tipoTelefono', $TelefonoContacto->tipoTelefono);
      $stmtContacto->bindValue(':numero', $TelefonoContacto->numero);
      $stmtContacto->execute();
      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}//end class

?>
