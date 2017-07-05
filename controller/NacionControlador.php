<?php

class NacionControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new NacionConsulta($this->Conexion);
    $listaNaciones = $consulta->listaNaciones();
    $listArrayLN = array();
    $i = 0;
    foreach ($listaNaciones as $listaN) {
      $nacion = new Nacion();
      $nacion->IdNacion = $listaN['idNacion'];
      $nacion->NombreNacion = $listaN['nombreNacion'];
      $listArrayLN[$i] = $nacion;
      $i++;
    }
    return $listArrayLN;
  }

  public function crear()
  {
    $manageNacionalidad = new NacionConsulta($this->Conexion);
    $existe = $manageNacionalidad->existeNacion($_POST['nacionalidadNew']);
    if ($existe == false)
    {
      $nacion = new Nacion();
      $nacion->NombreNacion = ucwords(strtolower($_POST['nacionalidadNew']));
      $exito = $manageNacionalidad->save($nacion);
      if ($exito == true)
      {
        $listaNaciones = $this->listar();
        if ($_POST['ventanaAncho']>1000)
        {
          ?>
          <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewNacionalidad"><i class="fa fa-building"></i></a></span>
          <select class="selectpicker form-control personalInputCtr" name="nacionalidad" id="nacionalidad" title="Seleccione Nacionalidad" required>
            <?php foreach ($listaNaciones as $listaN): ?>
              <option value="<?php echo $listaN->IdNacion; ?>"><?php echo $listaN->NombreNacion; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
        else
        {
          ?>
          <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewNacionalidad"><i class="fa fa-building"></i></a></span>
          <select class="form-control personalInputCtr" name="nacionalidad" id="nacionalidad" required>
            <option value="" disabled selected hidden>Seleccione Nacionalidad</option>
            <?php foreach ($listaNaciones as $listaN): ?>
              <option value="<?php echo $listaN->IdNacion; ?>"><?php echo $listaN->NombreNacion; ?></option>
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
