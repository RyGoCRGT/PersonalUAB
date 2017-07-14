<?php

class EstructuraMeritosConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function existeNombreMeritoCrear($nombreMerito)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM estructuraMeritos where nombreMerito=:nombreMerito');
    $consulta->bindParam(':nombreMerito', $nombreMerito);
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

  }// end function

  public function crear($estructuraMerito)
  {
    try {

            $this->Conexion->beginTransaction();

            $query = "INSERT INTO estructuraMeritos (idTablaMeritoDocenteProfesor, idEstructuraMeritoPrimario, nombreMerito, puntajeMerito)
                      VALUES (:idTablaMeritoDocenteProfesor, :idEstructuraMeritoPrimario, :nombreMerito, :puntajeMerito)";

            $stmtPersona = $this->Conexion->prepare($query);

            $stmtPersona->bindValue(':idTablaMeritoDocenteProfesor', $estructuraMerito->IdTablaMeritoDocenteProfesor);
            $stmtPersona->bindValue(':idEstructuraMeritoPrimario', $estructuraMerito->IdEstructuraMeritoPrimario);
            $stmtPersona->bindValue(':nombreMerito', $estructuraMerito->NombreMerito);
            $stmtPersona->bindValue(':puntajeMerito', $estructuraMerito->PuntajeMerito);
            $stmtPersona->execute();

            $this->Conexion->commit();
            return $this->ObtenerUltimoId();
        } catch (PDOException $e) {

            $this->Conexion->rollBack();
            echo "Error al Registrar:" . $e->getMessage();
      }

      return null;
  }// end metodo

    public function ObtenerUltimoId()
    {
        $consulta = $this->Conexion->prepare('SELECT MAX(idEstructuraMerito) AS idEstructuraMerito FROM estructuraMeritos');
        $consulta->execute();
        $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        //print_r($resultado);
        return $resultado['idEstructuraMerito'];
    }

  public function listaEstructuraMeritos($idTablaMeritoDocenteProfesor)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM estructuraMeritos where idTablaMeritoDocenteProfesor = :idTablaMeritoDocenteProfesor');
    $consulta->bindParam(':idTablaMeritoDocenteProfesor', $idTablaMeritoDocenteProfesor);
    $consulta->execute();
    $meritos = $consulta->fetchAll();
    $listaCategorias = array();
    foreach ($meritos as $merito)
    {
      $estructuraMerito = EstructuraMeritos::instancia($merito);

        /*$estructuraMerito = new EstructuraMeritos();
        $estructuraMerito->IdEstructuraMerito = $merito["idEstructuraMerito"];
        $estructuraMerito->IdTablaMeritoDocenteProfesor = $merito["idTablaMeritoDocenteProfesor"];
        $estructuraMerito->IdEstructuraMeritoPrimario = $merito["idEstructuraMeritoPrimario"];
        $estructuraMerito->NombreMerito = $merito["nombreMerito"];
        $estructuraMerito->PuntajeMerito = $merito["puntajeMerito"];*/
      if($estructuraMerito->IdEstructuraMeritoPrimario == null) {
        $estructuraMerito->SubMeritos = array();
        $listaCategorias["[".$estructuraMerito->IdEstructuraMerito."]"] = $estructuraMerito;

      } else {
        $categoriaMerito = $listaCategorias["[".$estructuraMerito->IdEstructuraMeritoPrimario."]"];
        $categoriaMerito->anadirSubMerito($estructuraMerito);
      }
    }

    return $listaCategorias;
  }

  public function listaEstructuraMeritosSegunPersonal($tipo)
  {
    $query = 'SELECT *
              FROM estructuraMeritos e, tablameritosdocenteprofesor t
              where t.idTablaMeritoDocenteProfesor = e.idTablaMeritoDocenteProfesor
              AND tipoMerito = :tipo
              AND activo = 1';
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':tipo', $tipo);
    $consulta->execute();
    $meritos = $consulta->fetchAll();
    $listaCategorias = array();
    foreach ($meritos as $merito)
    {
      $estructuraMerito = EstructuraMeritos::instancia($merito);

        /*$estructuraMerito = new EstructuraMeritos();
        $estructuraMerito->IdEstructuraMerito = $merito["idEstructuraMerito"];
        $estructuraMerito->IdTablaMeritoDocenteProfesor = $merito["idTablaMeritoDocenteProfesor"];
        $estructuraMerito->IdEstructuraMeritoPrimario = $merito["idEstructuraMeritoPrimario"];
        $estructuraMerito->NombreMerito = $merito["nombreMerito"];
        $estructuraMerito->PuntajeMerito = $merito["puntajeMerito"];*/
      if($estructuraMerito->IdEstructuraMeritoPrimario == null) {
        $estructuraMerito->SubMeritos = array();
        $listaCategorias["[".$estructuraMerito->IdEstructuraMerito."]"] = $estructuraMerito;

      } else {
        $categoriaMerito = $listaCategorias["[".$estructuraMerito->IdEstructuraMeritoPrimario."]"];
        $categoriaMerito->anadirSubMerito($estructuraMerito);
      }
    }

    return $listaCategorias;
  }

}

?>
