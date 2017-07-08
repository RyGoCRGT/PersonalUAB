<?php

class DeporteControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new DeporteConsulta($this->Conexion);
    $listaDeportes = $consulta->listaDeportes();
    $listaArrayDeportes = array();
    $i = 0;
    foreach ($listaDeportes as $listaD)
    {
      $deporte = new Deporte();
      $deporte->IdDeporte = $listaD['idDeporte'];
      $deporte->NombreDeporte = $listaD['nombreDeporte'];
      $listaArrayDeportes[$i] = $deporte;
      $i++;
    }
    return $listaArrayDeportes;
  }

  public function crear()
  {
    $manageDeporte = new DeporteConsulta($this->Conexion);
    $existe = $manageDeporte->existeDeporte($_POST['deporteNew']);
    if ($existe == false)
    {
      $deporte = new Deporte();
      $deporte->NombreDeporte = strtoupper($_POST['deporteNew']);
      $exito = $manageDeporte->save($deporte);
      if ($exito == true)
      {
        $listaDeportes = $this->listar();
        ?>
        <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewDeporte" ><i class="fa fa-star"></i></a></span>
        <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="deportes[]" id="deportes">
          <?php foreach ($listaDeportes as $listaD): ?>
            <option value="<?php echo $listaD->IdDeporte; ?>"><?php echo $listaD->NombreDeporte; ?></option>
          <?php endforeach; ?>
        </select>
        <?php
      }
      else
      {
        echo "<p style='color:red'>Error al Guardar Nacionalidad</p>";
      }
    }
    else
    {
      echo "<p style='color:red'>Existe Nacionalidad</p>";
    }
  }

}

?>
