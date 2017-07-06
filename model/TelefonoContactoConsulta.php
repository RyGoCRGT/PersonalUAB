<?php

class TelefonoContactoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTelefonoContacto($idContacto)
  {
    $query = "SELECT tc.tipoTelefono, tc.numero
              FROM contacto c, telefonoContacto tc
              WHERE c.idContacto = :idContacto
              AND c.idContacto = tc.idContacto
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idContacto', $idContacto);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }


}

?>
