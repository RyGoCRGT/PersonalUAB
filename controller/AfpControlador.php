<?php

class AfpControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new AfpConsulta($this->Conexion);
    $listaAfps = $consulta->listaAfp();
    $listaArrayAfps = array();
    $i = 0;
    foreach ($listaAfps as $listaA) {
      $afp = new Afp();
      $afp->IdAfp = $listaA['idAfp'];
      $afp->NombreAfp = $listaA['nombreAfp'];
      $listaArrayAfps[$i] = $afp;
      $i++;
    }
    return $listaArrayAfps;
  }

  public function crear()
  {
    $manageAfp = new AfpConsulta($this->Conexion);
    $existe = $manageAfp->existeAfp($_POST['afpNew']);
    if ($existe == false)
    {
      $afp = new Afp();
      $afp->NombreAfp = strtoupper($_POST['afpNew']);
      $exito = $manageAfp->save($afp);
      if ($exito == true)
      {
        $listaAfps = $this->listar();
        if ($_POST['ventanaAncho']>1000)
        {
          ?>
          <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewAfp"><i class="fa fa-cube"></i></a> </span>
          <select class="selectpicker form-control personalInputCtr" name="afp" id="afp" title="Seleccione AFP">
            <?php foreach ($listaAfps as $listaA): ?>
              <option value="<?php echo $listaA->IdAfp; ?>"><?php echo $listaA->NombreAfp; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
        else
        {
          ?>
          <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewAfp"><i class="fa fa-cube"></i></a> </span>
          <select class="form-control personalInputCtr" name="afp" id="afp">
            <option value="" disabled selected hidden>Seleccione AFP</option>
            <?php foreach ($listaAfps as $listaA): ?>
              <option value="<?php echo $listaA->IdAfp; ?>"><?php echo $listaA->NombreAfp; ?></option>
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
