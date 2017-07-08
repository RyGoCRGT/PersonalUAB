<?php

class SeguroControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new SeguroConsulta($this->Conexion);
    $listaSeguros = $consulta->listaSeguro();
    $listArraySeguro = array();
    $i = 0;
    foreach ($listaSeguros as $listaS) {
      $seguro =  new Seguro();
      $seguro->IdSeguro = $listaS['idSeguro'];
      $seguro->NombreSeguro = $listaS['nombreSeguro'];
      $listArraySeguro[$i] = $seguro;
      $i++;
    }
    return $listArraySeguro;
  }

  public function crear()
  {
    $manageSeguro = new SeguroConsulta($this->Conexion);
    $existe = $manageSeguro->existeSeguro($_POST['seguroNew']);
    if ($existe == false)
    {
      $seguro = new Seguro();
      $seguro->NombreSeguro = strtoupper($_POST['seguroNew']);
      $exito = $manageSeguro->save($seguro);
      if ($exito == true)
      {
        $listaSeguros = $this->listar();
        if ($_POST['ventanaAncho']>1000)
        {
          ?>
          <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-togle="modal" data-target="#addNewSeguro"><i class="fa fa-cube"></i></a> </span>
          <select class="selectpicker form-control personalInputCtr" name="seguro" id="seguro" title="Seleccione Empresa Aseguradora">
            <?php foreach ($listaSeguros as $listaS): ?>
              <option value="<?php echo $listaS->IdSeguro; ?>"><?php echo $listaS->NombreSeguro; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
        else
        {
          ?>
          <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-togle="modal" data-target="#addNewSeguro"><i class="fa fa-cube"></i></a> </span>
          <select class="form-control personalInputCtr" name="seguro" id="seguro">
            <option value="" disabled selected hidden>Seleccione Empresa Aseguradora</option>
            <?php foreach ($listaSeguros as $listaS): ?>
              <option value="<?php echo $listaS->IdSeguro; ?>"><?php echo $listaS->NombreSeguro; ?></option>
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
