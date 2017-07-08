<?php

class EnfermedadControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new EnfermedadConsulta($this->Conexion);
    $listaEnfermedades = $consulta->listaEnfermedades();
    $listaArrayEnfermedades = array();
    $i = 0;
    foreach ($listaEnfermedades as $listaE)
    {
      $enfermedad = new Enfermedad();
      $enfermedad->IdEnfermedad = $listaE['idEnfermedad'];
      $enfermedad->NombreEnfermedad = $listaE['nombreEnfermedad'];
      $listaArrayEnfermedades[$i] = $enfermedad;
      $i++;
    }
    return $listaArrayEnfermedades;
  }

  public function crear()
  {
    $manageEnfermedad = new EnfermedadConsulta($this->Conexion);
    $existe = $manageEnfermedad->existeEnfermedad($_POST['enfermedadNew']);
    if ($existe == false)
    {
      $enfermedad = new Enfermedad();
      $enfermedad->NombreEnfermedad = strtoupper($_POST['enfermedadNew']);
      $exito = $manageEnfermedad->save($enfermedad);
      if ($exito == true)
      {
        $listaEnfermedades = $this->listar();
        ?>
        <span class="input-group-addon" id="sizing-addon2"> <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#addNewEnfermedad" ><i class="fa fa-medkit"></i></a> </span>
        <select class="selectpicker form-control personalInputCtr" data-width="150px" multiple name="enfermedades[]" id="enfermedades">
          <?php foreach ($listaEnfermedades as $listaE): ?>
            <option value="<?php echo $listaE->IdEnfermedad; ?>"><?php echo $listaE->NombreEnfermedad; ?></option>
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
