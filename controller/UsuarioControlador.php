<?php

class UsuarioControlador
{
  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($usuario)
  {
    $consulta =  new UsuarioConsulta($this->Conexion);
    $existe  = $consulta->dataUser($usuario->Usuario);
    if (!$existe)
    {
      $vinculacion = $consulta->existeUsuarioVinculado($usuario->IdPersona);
      if ($vinculacion==false)
      {
        try {

            $this->Conexion->beginTransaction();

            $query = "INSERT INTO usuario (idUsuario, idPersona, idTipoUsuario, usuario, contrasena, estado, borrado)
                      VALUES (:idUsuario, :idPersona, :tipoUsuario, :usuario, :contrasena, :estado, :borrado)";

            $valUsuario = $this->Conexion->prepare($query);

            $valUsuario->bindValue(':idUsuario', $usuario->IdUsuario);
            $valUsuario->bindValue(':idPersona', $usuario->IdPersona);
            $valUsuario->bindValue(':tipoUsuario', $usuario->TipoUsuario);
            $valUsuario->bindValue(':usuario', $usuario->Usuario);
            $valUsuario->bindValue(':contrasena', $usuario->Contrasena);
            $valUsuario->bindValue(':estado', $usuario->Estado);
            $valUsuario->bindValue(':borrado', $usuario->Borrado);


            $valUsuario->execute();

            $this->Conexion->commit();

            

          } catch (PDOException $e) {

            $this->Conexion->rollBack();

            echo "<p style='color:red'>Error al Registrar</p>";

          }
      }
      else
      {
        echo "<p style='color:red'>Este Persona ya tiene una Cuenta de Usuario</p>";
      }

    }
    else
    {
        echo "<p style='color:red'>Error Nombre de Usuario Existente </p>";
    }

  }

}

?>
