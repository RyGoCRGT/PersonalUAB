<?php

class TipoUsuarioControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
      $consulta = new TipoUsuarioConsulta($this->Conexion);
      $listaTipoUsuario = $consulta->listaTipoUsuario();
      $listArrayTipoUsuario = array();
      $i = 0;
      foreach ($listaTipoUsuario as $listaTU) {
        $tipoUsuario = new TipoUsuario();
        $tipoUsuario->IdTipoUsuario = $listaTU['idTipoUsuario'];
        $tipoUsuario->NombreTipoUsuario = $listaTU['NombreTipoUsuario'];
        $listArrayTipoUsuario[$i] = $tipoUsuario;
        $i++;
      }
      return $listArrayTipoUsuario;
  }

}

?>
