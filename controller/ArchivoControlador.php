<?php

class ArchivoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear()
  {
    
    $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/documento/";
    $target_path = $target_path . basename( "documento-{$_POST['tipoArchivo']}-".$_POST['nombreArchivo'].".pdf");

    $a=move_uploaded_file($_FILES["documento"]["tmp_name"], $target_path);

    $archivoManejador = new ArchivoConsulta($this->Conexion);

    $archivo = new Archivo();
    $archivo->Archivo  = $target_path;
    $archivo->NombreArchivo = $_POST['nombreArchivo'];
    $archivo->C_TipoArchivo = $_POST['tipoArchivo'];

    $archivoManejador->save($archivo);
  }

  public function listar()
  {
    $consulta = new ArchivoConsulta($this->Conexion);
    $listaArchivos = $consulta->listaArchivos();
    $listaArray = array();
    $i = 0;
    foreach ($listaArchivos as $key => $value)
    {
      $archivo = new Archivo();
      $archivo->IdArchivo = $value['idArchivo'];
      $archivo->Archivo  = $value['archivo'];
      $archivo->NombreArchivo = $value['nombreArchivo'];
      $archivo->C_TipoArchivo = $value['nombreTipoArchivo'];
      $listaArray[$i] = $archivo;
      $i++;
    }
    return $listaArray;
  }

  public function ver($id)
  {
    $consulta = new ArchivoConsulta($this->Conexion);
    $data = $consulta->datosArchivo($id);

    $archivo = new Archivo();
    $archivo->IdArchivo = $data['idArchivo'];
    $archivo->Archivo  = $data['archivo'];
    $archivo->NombreArchivo = $data['nombreArchivo'];
    $archivo->C_TipoArchivo = $data['nombreTipoArchivo'];
    return $archivo;
  }

}

?>
