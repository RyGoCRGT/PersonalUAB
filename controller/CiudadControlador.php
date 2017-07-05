<?php

class CiudadControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CiudadConsulta($this->Conexion);
    $listaCiudad = $consulta->listaCiudad();

    $listArrayCity = array();
    $i = 0;

    foreach ($listaCiudad as $listaC) {
      $ciudad = new Ciudad($listaC['nombreCiudad']);
      $ciudad->IdCiudad = $listaC['idCiudad'];
      $listArrayCity[$i] = $ciudad;
      $i++;
    }

    return $listArrayCity;

  }

  public function crear()
  {
    $manageCiudad = new CiudadConsulta($this->Conexion);
    $existe = $manageCiudad->existeCiudad($_POST['ciudadNew']);
    if ($existe == false)
    {
      $ciudad = new Ciudad("");
      $ciudad->NombreCiudad = ucwords(strtolower($_POST['ciudadNew']));
      $exito = $manageCiudad->save($ciudad);
      // var_dump($ciudad);
      if ($exito == true)
      {
        $listaCiudades = $this->listar();
        if ($_POST['ventanaAncho']>1000)
        {
          ?>
          <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewCiudad" ><i class="fa fa-building"></i></a> </span>
          <select class="selectpicker form-control personalInputCtr" name="ciudad" id="ciudad" title="Seleccione Ciudad de Nacimiento" required>
            <?php foreach ($listaCiudades as $listaC): ?>
              <option value="<?php echo $listaC->IdCiudad; ?>"><?php echo $listaC->NombreCiudad; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
        else
        {
          ?>
          <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewCiudad" ><i class="fa fa-building"></i></a> </span>
          <select class="form-control personalInputCtr" name="ciudad" id="ciudad" required>
            <option value="" disabled selected hidden>Seleccione Ciudad de Nacimiento</option>
            <?php foreach ($listaCiudades as $listaC): ?>
              <option value="<?php echo $listaC->IdCiudad; ?>"><?php echo $listaC->NombreCiudad; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
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
