<?php

class ExperienciaLaboralControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear()
  {

    $consulta = new PersonaConsulta($this->Conexion);
    $consul = new PersonalConsulta($this->Conexion);
    $experienciaModelo = new ExperienciaLaboralConsulta($this->Conexion);

    $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonEL']);

    $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);

    $existe = $experienciaModelo->existeExperiencia($idPersonal['idPersonal'], $_POST['nombreInstitucionEL'],$_POST['cargoResponsabilidadEL']);

    if ($existe == false)
    {

      $experiencialaboral = new ExperienciaLaboral();

      $experiencialaboral->IdPersonal = $idPersonal['idPersonal'];
      $experiencialaboral->NombreInstitucion = ucwords(strtolower($_POST['nombreInstitucionEL']));
      $experiencialaboral->CargoResponsabilidad = ucwords(strtolower($_POST['cargoResponsabilidadEL']));
      $experiencialaboral->AniosDeServicio = $_POST['anhoServicioEL'];
      $experiencialaboral->ReligionInstitucion = ucwords(strtolower($_POST['religionInstEL']));
      $experiencialaboral->MotivoRetiro = ucwords(strtolower($_POST['motivoRetiroEL']));

      $guardado = $experienciaModelo->guardar($experiencialaboral);

      if ($guardado == true)
      {

        $listaExperincia = $this->listarPer($experiencialaboral->IdPersonal);

        $i = 0;
        ?>
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Cargo/Responsabilidad</th>
                <th>Institucion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listaExperincia as $listaE): $i++;?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $listaE->CargoResponsabilidad; ?></td>
                  <td><?php echo $listaE->NombreInstitucion; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php

      }

    }
    else
    {
      echo "<p style='color:red'>Existe Experiencia Laboral del Personal</p>";
      $listaExperincia = $this->listarPer($idPersonal['idPersonal']);

      $i = 0;
      ?>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Cargo/Responsabilidad</th>
              <th>Institucion</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listaExperincia as $listaE): $i++;?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $listaE->CargoResponsabilidad; ?></td>
                <td><?php echo $listaE->NombreInstitucion; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php
    }

  }

  public function listarPer($idPersonal)
  {
    $consulta = new ExperienciaLaboralConsulta($this->Conexion);
    $listaExperiencia = $consulta->listaExperienciaPersonal($idPersonal);
    $listaArrayExperiencia = array();
    $i = 0;
    foreach ($listaExperiencia as $listaE)
    {
      $experiencialaboral = new ExperienciaLaboral();
      $experiencialaboral->IdExperienciaLaboral = $listaE['idExperienciaLaboral'];
      $experiencialaboral->IdPersonal = $listaE['idPersonal'];
      $experiencialaboral->NombreInstitucion = $listaE['nombreInstitucion'];
      $experiencialaboral->CargoResponsabilidad = $listaE['cargoResponsabilidad'];
      $experiencialaboral->AniosDeServicio = $listaE['aniosDeServicio'];
      $experiencialaboral->ReligionInstitucion = $listaE['religionInstitucion'];
      $experiencialaboral->MotivoRetiro = $listaE['motivoRetiro'];
      $listaArrayExperiencia[$i] = $experiencialaboral;
      $i++;
    }
    return $listaArrayExperiencia;
  }

}

?>
