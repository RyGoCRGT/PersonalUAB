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
      try {
        var_dump($usuario);
        $this->Conexion->beginTransaction();

        $query = "INSERT INTO usuario (idUsuario,idPersona,idTipoUsuario,usuario,contrasena,estado,borrado)
                  VALUES (:idUsuario,:idPersona,:idTipoUsuario,:usuario,:contrasena,:estado,:borrado)";

        $valUsuario = $this->Conexion->prepare($query);

        $valUsuario->bindValue(':idUsuario', $usuario->IdUsuario);
        $valUsuario->bindValue(':idPersona', $usuario->IdPersona);
        $valUsuario->bindValue(':idTipoUsuario', $usuario->IdTipoUsuario);
        $valUsuario->bindValue(':usuario', $usuario->Usuario);
        $valUsuario->bindValue(':contrasena', $usuario->Contrasena);
        $valUsuario->bindValue(':estado', $usuario->Estado);
        $valUsuario->bindValue(':borrado', $usuario->Borrado);


        $valUsuario->execute();

        $this->Conexion->commit();

        var_dump($valUsuario);


      } catch (PDOException $e) {

        $this->Conexion->rollBack();

        echo "Error al Registrar";

      }

    }

  }

?>
