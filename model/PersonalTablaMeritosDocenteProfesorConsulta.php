<?php

class PersonalTablaMeritosDocenteProfesorConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }


  public function crear($personalTablaMeritos)
  {
    try {

            $this->Conexion->beginTransaction();

            $query = "INSERT INTO personalTablaMeritosDocenteProfesor (idPersonal, idTablaMeritoDocenteProfesor)  
                      VALUES (:idPersonal, :idTablaMeritoDocenteProfesor)";

            $stmtPersona = $this->Conexion->prepare($query);

            $stmtPersona->bindValue(':idPersonal', $personalTablaMeritos->IdPersonal);
            $stmtPersona->bindValue(':idTablaMeritoDocenteProfesor', $personalTablaMeritos->IdTablaMeritosDocenteProfesor);

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
