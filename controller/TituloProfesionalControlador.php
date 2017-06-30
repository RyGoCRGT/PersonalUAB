<?php

class TituloProfesionalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($tituloprofesional)
  {

    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO tituloprofesional (idTituloProfesional, idTipoTituloProfesional, idPersonal, nombreInstitucion, cursoProfesionalEstudiado, tiempoEstudio, religionInstitucion, respaldoTituloPDF)
                VALUES (:idTituloProfesional, :idTipoTituloProfesional, :idPersonal, :nombreInstitucion, :cursoProfesionalEstudiado, :tiempoEstudio, :religionInstitucion, :respaldoTituloPDF)";

      $stmtTituloPers = $this->Conexion->prepare($query);

      $stmtTituloPers->bindValue(':idTituloProfesional', $tituloprofesional->IdTituloProfesional);
      $stmtTituloPers->bindValue(':idTipoTituloProfesional', $tituloprofesional->IdTipoTituloProfesional);
      $stmtTituloPers->bindValue(':idPersonal', $tituloprofesional->IdPersonal);
      $stmtTituloPers->bindValue(':nombreInstitucion', $tituloprofesional->NombreInstitucion);
      $stmtTituloPers->bindValue(':cursoProfesionalEstudiado', $tituloprofesional->CursoProfesionalEstudiado);
      $stmtTituloPers->bindValue(':tiempoEstudio', $tituloprofesional->TiempoEstudio);
      $stmtTituloPers->bindValue(':religionInstitucion', $tituloprofesional->ReligionInstitucion);
      $stmtTituloPers->bindValue(':respaldoTituloPDF', $tituloprofesional->RespaldoTituloPDF);

      $stmtTituloPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }

  }

  public function listarPer($idPersonal)
  {
    $consulta = new TituloProfesionalConsulta($this->Conexion);
    $listaTitulos = $consulta->listaTitulosPersona($idPersonal);
    $listaArrayTitulos = array();
    $i = 0;
    foreach ($listaTitulos as $listaT) {
      $tituloprofesional = new TituloProfesional();
      $tituloprofesional->IdTituloProfesional = $listaT['idTituloProfesional'];
      $tituloprofesional->IdTipoTituloProfesional = $listaT['idTipoTituloProfesional'];
      $tituloprofesional->IdPersonal = $listaT['idPersonal'];
      $tituloprofesional->NombreInstitucion = $listaT['nombreInstitucion'];
      $tituloprofesional->CursoProfesionalEstudiado = $listaT['cursoProfesionalEstudiado'];
      $tituloprofesional->TiempoEstudio = $listaT['tiempoEstudio'];
      $tituloprofesional->ReligionInstitucion = $listaT['religionInstitucion'];
      $tituloprofesional->RespaldoTituloPDF = $listaT['respaldoTituloPDF'];
      $listaArrayTitulos[$i] = $tituloprofesional;
      $i++;
    }
    return $listaArrayTitulos;
  }

}

?>
