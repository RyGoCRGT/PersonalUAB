<?php

class TelefonoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($telefono)
  {

    $existe = false;
    $consulta = new TelefonoConsulta($this->Conexion);
    $existe = $consulta->existeTelefono($telefono->NumeroTelefono);
    if ($existe == false)
    {
      try
      {
        $this->Conexion->beginTransaction();

        $query = "INSERT INTO telefono (idTelefono, idPersona, numeroTelefono)
                  VALUES (:idTelefono, :idPersona, :numeroTelefono)";

        $stmtTelefono = $this->Conexion->prepare($query);

        $stmtTelefono->bindValue(":idTelefono", $telefono->IdTelefono);
        $stmtTelefono->bindValue(":idPersona", $telefono->IdPersona);
        $stmtTelefono->bindValue(":numeroTelefono", $telefono->NumeroTelefono);

        $stmtTelefono->execute();

        $this->Conexion->commit();

      }
      catch (PDOException $e)
      {
        $this->Conexion->rollBack();
      }

    }
    else
    {
      echo "<p style='color:orange'>Error al Guardar Telefono Existente</p>";
    }

  }

}

?>
