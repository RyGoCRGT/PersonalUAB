<?php

class EvaluacionMeritosDocenteProfesorControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear()
  {
    $evalMeritoModel = new EvaluacionMeritosDocenteProfesorConsulta($this->Conexion);
    $i = 0;
    foreach($_POST['idMerito'] as $item)
    {
      $j = 0;
      foreach($_POST['puntajeMerito'] as $ite)
      {
        if ($i == $j)
        {
          $existe = $evalMeritoModel->existeEvaluacion($_POST['idPersonal'], $item);
          $evaluarMerito = new EvaluacionMeritosDocenteProfesor();
          $evaluarMerito->IdPersonal = $_POST['idPersonal'];
          $evaluarMerito->IdEstructuraMerito = $item;
          $evaluarMerito->PuntajeMerito = $ite;
          $evaluarMerito->EvaluacionOficial = 1;
          if ($existe == false)
          {
            $evalMeritoModel->crear($evaluarMerito);
          }
          else
          {
            $evalMeritoModel->actualizar($evaluarMerito);
          }
          break;
        }
        $j++;
      }
      $i++;
    }

    ?>
    <div class="text-center"><strong><h3>Evaluacion Terminada</h3></strong></div>
    <div class="text-center"><strong><i><h1><?php echo $_POST['puntajeTotal'] ?></h1></i></strong></div>
    <?php

  }

  public function crearAuto()
  {
    $evalMeritoModel = new EvaluacionMeritosDocenteProfesorConsulta($this->Conexion);
    $i = 0;
    foreach($_POST['idMerito'] as $item)
    {
      $j = 0;
      foreach($_POST['puntajeMerito'] as $ite)
      {
        if ($i == $j)
        {

          $existe = $evalMeritoModel->existeAutoEvaluacion($_POST['idPersonal'], $item);
          $evaluarMerito = new EvaluacionMeritosDocenteProfesor();
          $evaluarMerito->IdPersonal = $_POST['idPersonal'];
          $evaluarMerito->IdEstructuraMerito = $item;
          $evaluarMerito->PuntajeMerito = $ite;
          $evaluarMerito->EvaluacionOficial = 0;
          if ($existe == false)
          {
            $evalMeritoModel->crear($evaluarMerito);
          }
          else
          {
            $evalMeritoModel->actualizar($evaluarMerito);
          }
          break;
        }
        $j++;
      }
      $i++;
    }

    ?>
    <div class="text-center"><strong><h3>Evaluacion Terminada</h3></strong></div>
    <div class="text-center"><strong><i><h1><?php echo $_POST['puntajeTotal'] ?></h1></i></strong></div>
    <?php

  }

  public function listaEvalucionPersonal($idPersonal)
  {
    $consulta = new EvaluacionMeritosDocenteProfesorConsulta($this->Conexion);
    $listaMeritosPuntuados = $consulta->meritosPuntajesEvaluacion($idPersonal);
    $listaArrayMeritosPuntuados = array();
    $i = 0;
    foreach ($listaMeritosPuntuados as $listaMP)
    {
      $evaluacionMeritos = new EvaluacionMeritosDocenteProfesor();
      $evaluacionMeritos->IdPersonal = $listaMP['idPersonal'];
      $evaluacionMeritos->IdEstructuraMerito = $listaMP['idEstructuraMerito'];
      $evaluacionMeritos->PuntajeMerito = $listaMP['puntajeMerito'];
      $evaluacionMeritos->EvaluacionOficial = $listaMP['evaluacionOficial'];
      $listaArrayMeritosPuntuados[$i] = $evaluacionMeritos;
      $i++;
    }
    return $listaArrayMeritosPuntuados;
  }

  public function listaAutoEvalucionPersonal($idPersonal)
  {
    $consulta = new EvaluacionMeritosDocenteProfesorConsulta($this->Conexion);
    $listaMeritosPuntuados = $consulta->meritosPuntajesAutoEvaluacion($idPersonal);
    $listaArrayMeritosPuntuados = array();
    $i = 0;
    foreach ($listaMeritosPuntuados as $listaMP)
    {
      $evaluacionMeritos = new EvaluacionMeritosDocenteProfesor();
      $evaluacionMeritos->IdPersonal = $listaMP['idPersonal'];
      $evaluacionMeritos->IdEstructuraMerito = $listaMP['idEstructuraMerito'];
      $evaluacionMeritos->PuntajeMerito = $listaMP['puntajeMerito'];
      $evaluacionMeritos->EvaluacionOficial = $listaMP['evaluacionOficial'];
      $listaArrayMeritosPuntuados[$i] = $evaluacionMeritos;
      $i++;
    }
    return $listaArrayMeritosPuntuados;
  }

}

?>
