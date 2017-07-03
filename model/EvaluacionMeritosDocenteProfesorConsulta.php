<?php

class EvaluacionMeritosDocenteProfesorConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function actualizar($evaluacionMeritos)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "UPDATE evaluacionMeritosDocenteProfesor
                SET puntajeMerito = :puntajeMerito
                WHERE idPersonal = :idPersonal
                AND idEstructuraMerito = :idEstructuraMerito";

      $stmtPersona = $this->Conexion->prepare($query);

      $stmtPersona->bindValue(':idPersonal', $evaluacionMeritos->IdPersonal);
      $stmtPersona->bindValue(':idEstructuraMerito', $evaluacionMeritos->IdEstructuraMerito);
      $stmtPersona->bindValue(':puntajeMerito', $evaluacionMeritos->PuntajeMerito);


      $stmtPersona->execute();

      $this->Conexion->commit();

      return true;

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function crear($evaluacionMeritos)
  {
    try {

            $this->Conexion->beginTransaction();

            $query = "INSERT INTO evaluacionMeritosDocenteProfesor (idPersonal, idEstructuraMerito, puntajeMerito)
                      VALUES (:idPersonal, :idEstructuraMerito, :puntajeMerito)";

            $stmtPersona = $this->Conexion->prepare($query);

            $stmtPersona->bindValue(':idPersonal', $evaluacionMeritos->IdPersonal);
            $stmtPersona->bindValue(':idEstructuraMerito', $evaluacionMeritos->IdEstructuraMerito);
            $stmtPersona->bindValue(':puntajeMerito', $evaluacionMeritos->PuntajeMerito);


            $stmtPersona->execute();

            $this->Conexion->commit();

            return true;

        } catch (PDOException $e) {

            $this->Conexion->rollBack();
            return false;
      }


  }// end metodo

  public function existeEvaluacion($idPersonal, $idMerito)
  {
    $query = "SELECT *
              FROM evaluacionmeritosdocenteprofesor
              WHERE idPersonal = :idPersonal
              AND idEstructuraMerito = :idEstructura";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idPersonal', $idPersonal);
    $consulta->bindValue(':idEstructura', $idMerito);
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

}

?>
