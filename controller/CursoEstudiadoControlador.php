<?php

class CursoEstudiadoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($cursoEstudiado)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "INSERT INTO cursoestudiado (idCursoEstudiado, idPersonal, nombreInstitucion, cursoEstudiado, anhoEstudio, religionInstitucion, respaldoTituloPDF)
                VALUES (:idCursoEstudiado, :idPersonal, :nombreInstitucion, :cursoEstudiado, :anhoEstudio, :religionInstitucion, :respaldoTituloPDF)";

      $stmtCursoPers = $this->Conexion->prepare($query);

      $stmtCursoPers->bindValue(':idCursoEstudiado', $cursoEstudiado->IdCursoEstudiado);
      $stmtCursoPers->bindValue(':idPersonal', $cursoEstudiado->IdPersonal);
      $stmtCursoPers->bindValue(':nombreInstitucion', $cursoEstudiado->NombreInstitucion);
      $stmtCursoPers->bindValue(':cursoEstudiado', $cursoEstudiado->CursoEstudiado);
      $stmtCursoPers->bindValue(':anhoEstudio', $cursoEstudiado->AnhoEstudio);
      $stmtCursoPers->bindValue(':religionInstitucion', $cursoEstudiado->ReligionInstitucion);
      $stmtCursoPers->bindValue(':respaldoTituloPDF', $cursoEstudiado->RespaldoTituloPDF);

      $stmtCursoPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }

  }

  public function listarPer($idPersonal)
  {
    $consulta = new CursoEstudiadoConsulta($this->Conexion);
    $listaCursos = $consulta->listaCursosPersonal($idPersonal);
    $listaArrayCursos = array();
    $i = 0;
    foreach ($listaCursos as $listaC) {
      $cursoEstudiado = new CursoEstudiado();
      $cursoEstudiado->IdCursoEstudiado = $listaC['idCursoEstudiado'];
      $cursoEstudiado->IdPersonal = $listaC['idPersonal'];
      $cursoEstudiado->NombreInstitucion = $listaC['nombreInstitucion'];
      $cursoEstudiado->CursoEstudiado = $listaC['cursoEstudiado'];
      $cursoEstudiado->AnhoEstudio = $listaC['anhoEstudio'];
      $cursoEstudiado->ReligionInstitucion = $listaC['religionInstitucion'];
      $cursoEstudiado->RespaldoTituloPDF = $listaC['respaldoTituloPDF'];
      $listaArrayCursos[$i] = $cursoEstudiado;
      $i++;
    }
    return $listaArrayCursos;
  }

}

?>
