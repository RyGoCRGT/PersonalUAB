<?php

class TelefonoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($telefono)
  {

    $existe = false;
    $consulta = new TelefonoConsulta($this->Conexion);
    $existe = $consulta->existeTelefono($telefono->NumeroTelefono);
    if ($existe == false)
    {
      try
      {
        $this->Conexion->beginTransaction();

        $query = "INSERT INTO telefono (idTelefono, idPersona, numeroTelefono)
                  VALUES (:idTelefono, :idPersona, :numeroTelefono)";

        $stmtTelefono = $this->Conexion->prepare($query);

        $stmtTelefono->bindValue(":idTelefono", $telefono->IdTelefono);
        $stmtTelefono->bindValue(":idPersona", $telefono->IdPersona);
        $stmtTelefono->bindValue(":numeroTelefono", $telefono->NumeroTelefono);

        $stmtTelefono->execute();

        $this->Conexion->commit();

      }
      catch (PDOException $e)
      {
        $this->Conexion->rollBack();
      }

    }
    else
    {
      echo "<p style='color:orange'>Error al Guardar Telefono Existente</p>";
    }

  }

  public function crearT()
  {

    $telefono = new Telefono();
    $telefono->IdPersona = $_POST['idPersona'];
    $telefono->NumeroTelefono = $_POST['telefono'];

    $consulta = new TelefonoConsulta($this->Conexion);
    $existe = $consulta->existeTelefono($telefono->NumeroTelefono);

    if ($existe == false)
    {
      $consulta->save($telefono);
      $ListaTelefonos = $consulta->listaNumeroPersona($telefono->IdPersona);
      ?>
      <table class="table table-hover table-condensed">
        <thead>
          <tr class="info">
            <th class="text-center">Numero</th>
            <th class="text-center">Borrar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ListaTelefonos as $key => $telefonos): ?>
            <tr>
              <td class="text-center"><?php echo $telefonos['numeroTelefono'] ?></td>
              <td class="text-center">
                <form class="telefonoBorrar">
                  <input type="hidden" name="telefono" value="<?php echo $telefonos['numeroTelefono'] ?>">
                  <input type="hidden" name="idPersona" value="<?php echo $telefono->IdPersona ?>">
                  <button type="submit" name="borrarTelefono" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php
    }
    else
    {
      echo "<p style='color:red'>Telefono Existente</p>";
    }

  }

  public function borrar()
  {
    $telefono = new Telefono();
    $telefono->IdPersona = $_POST['idPersona'];
    $telefono->NumeroTelefono = $_POST['telefono'];

    $consulta = new TelefonoConsulta($this->Conexion);
    $consulta->delete($telefono);
    $ListaTelefonos = $consulta->listaNumeroPersona($telefono->IdPersona);
    ?>
    <table class="table table-hover table-condensed">
      <thead>
        <tr class="info">
          <th class="text-center">Numero</th>
          <th class="text-center">Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ListaTelefonos as $key => $telefonos): ?>
          <tr>
            <td class="text-center"><?php echo $telefonos['numeroTelefono'] ?></td>
            <td class="text-center">
              <form class="telefonoBorrar">
                <input type="hidden" name="telefono" value="<?php echo $telefonos['numeroTelefono'] ?>">
                <input type="hidden" name="idPersona" value="<?php echo $telefono->IdPersona ?>">
                <button type="submit" name="borrarTelefono" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php
  }

}

?>
