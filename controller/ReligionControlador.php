<?php

class ReligionControlador
{
  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new ReligionConsulta($this->Conexion);
    $listaReligion = $consulta->listaReligion();
    $listArrayReligion = array();
    $i = 0;
    foreach ($listaReligion as $listaR) {
      $religion = new Religion($listaR['nombreReligion']);
      $religion->IdReligion = $listaR['idReligion'];
      $listArrayReligion[$i] = $religion;
      $i++;
    }
    return $listArrayReligion;
  }

  public function crear()
  {
    $manageReligion = new ReligionConsulta($this->Conexion);
    $existe = $manageReligion->existeReligion($_POST['religionNew']);
    if ($existe == false)
    {
      $religion = new Religion("");
      $religion->NombreReligion = ucwords(strtolower($_POST['religionNew']));
      $exito = $manageReligion->save($religion);
      if ($exito == true)
      {
        $listaReligion = $this->listar();
        if ($_POST['ventanaAncho']>1000)
        {
          ?>
          <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewReligion"></a> <i class="fa fa-cube"></i></span>
          <select class="selectpicker form-control personalInputCtr" name="religion" id="religion" title="Seleccione Religion">
            <?php foreach ($listaReligion as $listaR): ?>
              <option value="<?php echo $listaR->IdReligion; ?>"><?php echo $listaR->NombreReligion; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
        else
        {
          ?>
          <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewReligion"></a> <i class="fa fa-cube"></i></span>
          <select class="form-control personalInputCtr" name="religion" id="religion">
            <option value="" disabled selected hidden>Seleccione Religion</option>
            <?php foreach ($listaReligion as $listaR): ?>
              <option value="<?php echo $listaR->IdReligion; ?>"><?php echo $listaR->NombreReligion; ?></option>
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
