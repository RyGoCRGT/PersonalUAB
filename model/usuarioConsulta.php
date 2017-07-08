<?php

class UsuarioConsulta
{

  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function dataUser($nameUser)
  {
    $query = "SELECT * FROM usuario WHERE usuario = :nameUser";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':nameUser', $nameUser);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }


  public function listaUsuario()
  {
    $query = "SELECT p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.CI,tu.NombreTipoUsuario,u.usuario,u.contrasena
              FROM persona p, tipoUsuario tu,usuario u
              WHERE u.idPersona=p.idPersona
              AND u.idTipoUsuario=tu.idTipoUsuario";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeUsuarioVinculado($id)
  {
    $query = "SELECT * FROM usuario WHERE idPersona = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

  public function obtenerUsuario($id)
  {
    $query = "SELECT * FROM usuario WHERE idPersona = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function updateDown($usuario)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  usuario
                SET
                  estado = 0
                WHERE idUsuario = :idUsuario";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':idUsuario', $usuario->IdUsuario);

      $stmtUsuario->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function updateUp($usuario)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  usuario
                SET
                  estado = 1
                WHERE idUsuario = :idUsuario";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':idUsuario', $usuario->IdUsuario);

      $stmtUsuario->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

}

?>
