  <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
  <div class="container">
    <?php
    //if (isset($_POST['datos']))
    //{

      require_once("../libs/dompdf/dompdf_config.inc.php");

      include '../../model/conexion.php';
      include '../../model/Persona.php';
      include '../../model/Cargo.php';
      include '../../model/Enfermedad.php';
      include '../../model/Deporte.php';
      include '../../model/Personal.php';
      include '../../model/PersonaConsulta.php';
      include '../../model/PersonalConsulta.php';
      include '../../model/ReferenciaPersonal.php';
      include '../../model/ReferenciaPersonalConsulta.php';
      include '../../model/ConyuguePersonal.php';
      include '../../model/ConyuguePersonalConsulta.php';
      include '../../model/CursoEstudiado.php';
      include '../../model/CursoEstudiadoConsulta.php';
      include '../../model/HijosPersonal.php';
      include '../../model/HijosPersonalConsulta.php';
      include '../../model/Telefono.php';
      include '../../model/TelefonoConsulta.php';
      include '../../model/TituloProfesional.php';
      include '../../model/TituloProfesionalConsulta.php';
      include '../../controller/PersonaControlador.php';
      include '../../controller/PersonalControlador.php';
      include '../../controller/ReferenciaPersonalControlador.php';
      include '../../controller/TelefonoControlador.php';
      include '../../controller/ConyuguePersonalControlador.php';
      include '../../controller/HijosPersonalControlador.php';
      include '../../controller/CursoEstudiadoControlador.php';
      include '../../controller/TituloProfesionalControlador.php';

      $conexion = new Conexion();
      $consulta = new PersonaConsulta($conexion);

      //$idPersona = $consulta->obtenerIdPersona($_POST['ciPersonalDetalle']);
      $idPersona = $consulta->obtenerIdPersona(7548743);
      //
      // $consul = new PersonalConsulta($conexion);
      //
      // $idPersonal = $consul->datosPersonal($idPersona['idPersona']);// COMEMTAR

      $personalManejador = new PersonalControlador($conexion);

      $personal = $personalManejador->ver($idPersona['idPersona']);

      $html = "<strong>Apellidos y Nombres: </strong>".$personal->IdPersona->ApellidoPaterno." ".$personal->IdPersona->ApellidoMaterno." ".$personal->IdPersona->PrimerNombre." ".$personal->IdPersona->SegundoNombre;


      $codigo=utf8_encode($html);
      $dompdf=new DOMPDF();
      $dompdf->load_html($codigo);
      ini_set("memory_limit","128M");
      $dompdf->render();
      $hoy = date("Y-m-d");
      $dompdf->stream("Reporte_$hoy.pdf");

    //}
    //else
    //{
    //  echo "<p style='color:red'>Error al ver Formulario Detalle</p>";
    //}
    ?>

  </div>
