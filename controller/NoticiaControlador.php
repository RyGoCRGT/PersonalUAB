<?php

class NoticiaControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear()
  {
    $fecha=date( "Y/m/d");

    $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/publicaciones/";
    $target_path = $target_path . basename( $fecha.$_FILES["rutaImagen"]["name"]);

    $a=move_uploaded_file($_FILES["rutaImagen"]["tmp_name"], $target_path);

    $noticiaManejador = new NoticiaConsulta($this->Conexion);

    $noticia = new Noticia();

    $noticia->Titulo = $_POST['titulo'];
    $noticia->Contenido = $_POST['contenido'];
    $noticia->RutaImagen = $target_path;
    $noticia->FechaPublicacion = $fecha;

    $noticia->C_TipoNoticia = $_POST['tipoNoticia'];
    $noticia->C_Usuario = $_SESSION['idUsuario'];
    $noticia->C_EspecificacionUsario = ($_POST['especificacionUsuario'] == '0') ? null : $_POST['especificacionUsuario'];

    $noticiaManejador->save($noticia);
  }

  public function listar()
  {
    $noticiaManejador = new NoticiaConsulta($this->Conexion);
    $listaNoticias = $noticiaManejador->listaNoticias();
    $listaArrayNoticias = array();
    $i = 0;
    foreach ($listaNoticias as $key => $item)
    {
      $noticia = new Noticia();
      $noticia->IdNoticia = $item['idNoticia'];
      $noticia->Titulo = $item['titulo'];
      $noticia->Contenido = $item['contenido'];
      $noticia->Estado = $item['estado'];
      $noticia->RutaImagen = $item['rutaImagen'];
      $noticia->FechaPublicacion = $item['fechaPublicacion'];
      $noticia->C_TipoNoticia = $item['nombreTipoNoticia'];
      $noticia->C_Usuario = $item['idUsuario'];
      $noticia->C_EspecificacionUsario = $item['especificacionUsuario'];
      $listaArrayNoticias[$i] = $noticia;
      $i++;
    }
    return $listaArrayNoticias;
  }

}

?>
