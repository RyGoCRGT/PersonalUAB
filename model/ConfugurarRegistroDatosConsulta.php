<?php

class ConfugurarRegistroDatosConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function updateRegistro($config)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE configRegistroDatos
                SET fechaLimite = :fechaLimite
                WHERE idConfigRegistroDatos = :id";

      $stmtEnfermedad = $this->Conexion->prepare($query);

      $stmtEnfermedad->bindValue(':fechaLimite', $config->FechaLimite);
      $stmtEnfermedad->bindValue(':id', $config->IdConfugurarRegistroDatos);

      $stmtEnfermedad->execute();

      $this->Conexion->commit();
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function listarRegistros()
  {
    $query = "SELECT
                 cr.idConfigRegistroDatos, cr.fechaLimite, tp.NombreTipoUsuario, tp.idTipoUsuario
              FROM configRegistroDatos cr, tipoUsuario tp
              WHERE cr.idTipoUsuario = tp.idTipoUsuario";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
