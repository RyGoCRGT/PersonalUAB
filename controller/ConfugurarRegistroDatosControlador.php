<?php
class ConfugurarRegistroDatosControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new ConfugurarRegistroDatosConsulta($this->Conexion);
    $lista = $consulta->listarRegistros();
    $listaArray = array();
    $i = 0;
    foreach ($lista as $key => $value)
    {
      $config = new ConfugurarRegistroDatos();
      $config->IdConfugurarRegistroDatos = $value['idConfigRegistroDatos'];
      $config->FechaLimite = $value['fechaLimite'];
      $tipo = new TipoUsuario();
      $tipo->IdTipoUsuario = $value['idTipoUsuario'];
      $tipo->NombreTipoUsuario =  $value['NombreTipoUsuario'];
      $config->C_TipoUsuario = $tipo;
      $listaArray[$i] = $config;
      $i++;
    }
    return $listaArray;
  }

  public function modificar()
  {
    $config = new ConfugurarRegistroDatos();
    $config->IdConfugurarRegistroDatos = $_POST['id'];
    $config->FechaLimite = $_POST['fechaLimite'];

    $configManejador = new ConfugurarRegistroDatosConsulta($this->Conexion);
    $configManejador->updateRegistro($config);
  }

}
?>
