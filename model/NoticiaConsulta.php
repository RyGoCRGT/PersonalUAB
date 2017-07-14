<?php

class NoticiaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function save($noticia)
  {
    try {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO noticia (idNoticia, idTipoNoticia, titulo, contenido, idUsuario, especificacionUsuario, estado, rutaImagen, fechaPublicacion)
                VALUES (:idNoticia, :idTipoNoticia, :titulo, :contenido, :idUsuario, :especificacionUsuario, :estado, :rutaImagen, :fechaPublicacion)";

      $stmtNoticia = $this->Conexion->prepare($query);

      $stmtNoticia->bindValue(':idNoticia', $noticia->IdNoticia);
      $stmtNoticia->bindValue(':idTipoNoticia', $noticia->C_TipoNoticia);
      $stmtNoticia->bindValue(':titulo', $noticia->Titulo);
      $stmtNoticia->bindValue(':contenido', $noticia->Contenido);
      $stmtNoticia->bindValue(':idUsuario', $noticia->C_Usuario);
      $stmtNoticia->bindValue(':especificacionUsuario', $noticia->C_EspecificacionUsario);
      $stmtNoticia->bindValue(':estado', $noticia->Estado);
      $stmtNoticia->bindValue(':rutaImagen', $noticia->RutaImagen);
      $stmtNoticia->bindValue(':fechaPublicacion', $noticia->FechaPublicacion);

      $stmtNoticia->execute();

      $this->Conexion->commit();



    } catch (PDOException $e) {

      $this->Conexion->rollBack();

    }
  }

  public function listaNoticias()
  {
    $fechaHoy = date('Y-m-j');
    $fechaAnterior = strtotime ( '-7 day' , strtotime ( $fechaHoy ) ) ;
    $fechaAnterior = date ( 'Y-m-j' , $fechaAnterior );

    $query = "SELECT
                n.idNoticia,
                tp.nombreTipoNoticia,
                n.titulo,
                n.contenido,
                n.idUsuario,
                n.especificacionUsuario,
                n.estado,
                n.rutaImagen,
                n.fechaPublicacion
              FROM noticia n, tipoNoticia tp
              WHERE n.idTipoNoticia = tp.idTipoNoticia
              AND fechaPublicacion BETWEEN :anterior AND :hoy
              ORDER BY n.idNoticia desc";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':anterior', $fechaAnterior);
    $consulta->bindValue(':hoy', $fechaHoy);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

}

?>
