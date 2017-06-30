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

}

?>
