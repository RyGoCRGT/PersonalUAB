<?php

class EvaluacionMeritosDocenteProfesorConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
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
            echo "Error al Registrar";
      }

      return false;
  }// end metodo


}

?>
