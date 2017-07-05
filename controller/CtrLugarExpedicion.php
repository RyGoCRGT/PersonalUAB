<?php

class CtrLugarExpedicion
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new LugarExpedicionConsulta($this->Conexion);
    $ListaLugarExpedicion = $consulta->listaLugarExpedicion();
    $listArrayLE = array();
    $i = 0;
    foreach ($ListaLugarExpedicion as $ListaLE) {
      $lugExp = new LugarExpedicion($ListaLE['nombreLugarExpedicion']);
      $lugExp->IdLugarExpedicion = $ListaLE['idLugarExpedicion'];
      $listArrayLE[$i] = $lugExp;
      $i++;
    }
    return $listArrayLE;
  }

  public function crear()
  {
    $manageLugExp = new LugarExpedicionConsulta($this->Conexion);
    $existe = $manageLugExp->existeLugarExpedicion($_POST['expedicionNew']);
    if ($existe == false)
    {
      $lugarExpedicion = new LugarExpedicion(ucwords(strtolower($_POST['expedicionNew'])));
      $exito = $manageLugExp->save($lugarExpedicion);
      if ($exito == true)
      {
        $listaLugarExpedicion = $this->listar();
        if ($_POST['ventanaAncho']>1000)
        {
          ?>
          <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><a class="btn btn-xs btn-default lugarExpedicionAdd" data-toggle="modal" data-target="#addNewLugExpedi"><i class="fa fa-address-card"></i></a></span>
          <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion" title="Seleccione Lugar de Expedicion CI" required>
            <?php foreach ($listaLugarExpedicion as $listaLE): ?>
              <option value="<?php echo $listaLE->IdLugarExpedicion; ?>"><?php echo $listaLE->NombreLugarExpedicion; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
        else
        {
          ?>
          <span class="input-group-addon" style="background: red; color:white" id="sizing-addon2"><a class="btn btn-xs btn-default lugarExpedicionAdd" data-toggle="modal" data-target="#addNewLugExpedi"><i class="fa fa-address-card"></i></a></span>
          <select class="form-control" name="lugarExpedicion" id="lugarExpedicion" title="Seleccione Lugar de Expedicion CI" required>
            <option value="" disabled selected hidden>Seleccione Lugar de Expedicion CI</option>
            <?php foreach ($listaLugarExpedicion as $listaLE): ?>
              <option value="<?php echo $listaLE->IdLugarExpedicion; ?>"><?php echo $listaLE->NombreLugarExpedicion; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
        }
      }
      else
      {
        echo "<p style='color:red'>Error al Guardar Lugar de Expedicion</p>";
      }
    }
    else
    {
      echo "<p style='color:red'>Existe Lugar de Expedicion</p>";
    }
  }

}

?>
