<?php

class HijosPersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($hijoPersonal)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO hijospersonal (idHijosPersonal, idPersona, idPersonal)
                VALUES (:idHijosPersonal, :idPersona, :idPersonal)";

      $stmtHijoPers = $this->Conexion->prepare($query);

      $stmtHijoPers->bindValue(':idHijosPersonal', $hijoPersonal->IdHijosPersonal);
      $stmtHijoPers->bindValue(':idPersona', $hijoPersonal->IdPersona);
      $stmtHijoPers->bindValue(':idPersonal', $hijoPersonal->IdPersonal);

      $stmtHijoPers->execute();

      $this->Conexion->commit();
    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function verHijos($idPersonal)
  {
    $consultaHijo = new HijosPersonalConsulta($this->Conexion);
    $datosHijos = $consultaHijo->datosHijo($idPersonal);
    //var_dump($datosHijos);
    $listaHijos = array();
    $i = 0;

    foreach ($datosHijos as $datos)
    {
      $persona = new Persona();
      $persona->IdPersona = $datos['idPersona'];
      $persona->PrimerNombre = $datos['primerNombre'];
      $persona->SegundoNombre = $datos['segundoNombre'];
      $persona->ApellidoPaterno = $datos['apellidoPaterno'];
      $persona->ApellidoMaterno = $datos['apellidoMaterno'];
      $persona->FechaNacimiento = $datos['fechaNacimiento'];

      $hijosPersonal = new HijosPersonal();
      $hijosPersonal->IdHijosPersonal = $datos['idHijosPersonal'];
      $hijosPersonal->IdPersonal = $datos['idPersonal'];
      $hijosPersonal->IdPersona = $persona;
      $listaHijos[$i] = $hijosPersonal;
      $i++;
    }

    return $listaHijos;
  }

  public function editar()
  {
    $persona = new Persona();
    $persona->IdPersona = $_POST['idPersona'];
    $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombreHij']));
    $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombreHij']));
    $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaternoHij']));
    $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaternoHij']));
    $persona->CI = strtoupper($_POST['ciPersonHijo'].$_POST['primerNombreHij'].$_POST['segundoNombreHij']);
    $persona->FechaNacimiento = $_POST['fechaNacimientoHij'];

    $personaManejador = new PersonaConsulta($this->Conexion);
    $personaManejador->edit($persona);

    $ListaHijos = $this->verHijos($_POST['idPersonal']);

    ?>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Fecha Nacimiento</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ListaHijos as $hijo): ?>
            <tr style="cursor:pointer" class="dataHijo" data-toggle="modal" data-target="#editarHijo">
              <td><?php echo "{$hijo->IdPersona->PrimerNombre} {$hijo->IdPersona->SegundoNombre}" ?></td>
              <td><?php echo "{$hijo->IdPersona->ApellidoPaterno} {$hijo->IdPersona->ApellidoMaterno}" ?></td>
              <td><?php echo "{$hijo->IdPersona->FechaNacimiento}" ?></td>
              <input class="idPersona" type="hidden" name="idPersona" value="<?php echo $hijo->IdPersona->IdPersona ?>">
              <input class="idPersona" type="hidden" name="primerNombre" value="<?php echo $hijo->IdPersona->PrimerNombre ?>">
              <input class="idPersona" type="hidden" name="segundoNombre" value="<?php echo $hijo->IdPersona->SegundoNombre ?>">
              <input class="idPersona" type="hidden" name="apellidoPaterno" value="<?php echo $hijo->IdPersona->ApellidoPaterno ?>">
              <input class="idPersona" type="hidden" name="apellidoMaterno" value="<?php echo $hijo->IdPersona->ApellidoMaterno ?>">
              <input class="idPersona" type="hidden" name="fechaNacimiento" value="<?php echo $hijo->IdPersona->FechaNacimiento ?>">
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php

  }

}

?>
