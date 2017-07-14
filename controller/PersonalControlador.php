<?php

class PersonalControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($personal)
  {
    $consulta = new PersonalConsulta($this->Conexion);
    if ($consulta->existePersonal($personal->IdPersona) == false)
    {
      if ($personal->IdCargo == "")
      {
        $personal->IdCargo = null;
      }
      if ($personal->IdCarrera == "")
      {
        $personal->IdCarrera = null;
      }
      try
      {

        $this->Conexion->beginTransaction();
        //var_dump($personal);
        $query = "INSERT INTO personal (idPersonal, idPersona, idNacion, idTipoPersonal, idCarrera, idCargoPersona, direccion, email, idCiudad, idReligion, fechaBautizmo, idSeguro, numeroSeguro, idAfp, numeroAfp, numeroLibretaMilitar, numeroPasaporte, tipoSangre, hobby, lecturaPreferencial, numeroRegistroProfesional, fechaIngreso, rutaFoto, estado)
                  VALUES (:idPersonal, :idPersona, :idNacion, :idTipoPersonal, :idCarrera, :idCargo, :direccion, :email, :idCiudad, :idReligion, :fechaBautizmo, :idSeguro, :numeroSeguro, :idAfp, :numeroAfp, :numeroLibretaMilitar, :numeroPasaporte, :tipoSangre, :hobby, :lecturaPreferencial, :numeroRegistroProfesional, :fechaIngreso, :rutaFoto, 1)";

        $stmtPersonal = $this->Conexion->prepare($query);

        $stmtPersonal->bindValue(':idPersonal', $personal->IdPersonal);
        $stmtPersonal->bindValue(':idPersona', $personal->IdPersona);
        $stmtPersonal->bindValue(':idNacion', $personal->IdNacion);
        $stmtPersonal->bindValue(':idTipoPersonal', $personal->IdTipoPersonal);
        $stmtPersonal->bindValue(':idCarrera', $personal->IdCarrera);
        $stmtPersonal->bindValue(':idCargo', $personal->IdCargo);
        $stmtPersonal->bindValue(':direccion', $personal->Direccion);
        $stmtPersonal->bindValue(':email', $personal->Email);
        $stmtPersonal->bindValue(':idCiudad', $personal->IdCiudadNacimiento);
        $stmtPersonal->bindValue(':idReligion', $personal->IdReligion);
        $stmtPersonal->bindValue(':fechaBautizmo', $personal->FechaBautizmo);
        $stmtPersonal->bindValue(':idSeguro', $personal->IdSeguro);
        $stmtPersonal->bindValue(':numeroSeguro', $personal->NumeroSeguro);
        $stmtPersonal->bindValue(':idAfp', $personal->IdAfp);
        $stmtPersonal->bindValue(':numeroAfp', $personal->NumeroAfp);
        $stmtPersonal->bindValue(':numeroLibretaMilitar', $personal->NumeroLibretaMilitar);
        $stmtPersonal->bindValue(':numeroPasaporte', $personal->NumeroPasaporte);
        $stmtPersonal->bindValue(':tipoSangre', $personal->TipoSangre);
        $stmtPersonal->bindValue(':hobby', $personal->Hobby);
        $stmtPersonal->bindValue(':lecturaPreferencial', $personal->LecturaPreferencial);
        $stmtPersonal->bindValue(':numeroRegistroProfesional', $personal->NumeroRegistroProfesional);
        $stmtPersonal->bindValue(':fechaIngreso', $personal->FechaIngreso);
        $stmtPersonal->bindValue(':rutaFoto', $personal->Ruta);

        $stmtPersonal->execute();

        $this->Conexion->commit();

      }
      catch (PDOException $e)
      {

        $this->Conexion->rollBack();

        echo "Error al Registrar";

      }
    }
    else
    {
      echo "<p>Error Personal Existente</p>";
    }

  }

  public function ver($id)
  {
    $consulta = new PersonalConsulta($this->Conexion);
    $datos = $consulta->datosPersonal($id);

    $personal = new Personal();

    $persona = new Persona();

    $persona->IdPersona = $datos['idPersona'];

    $consultaTele = new PersonaConsulta($this->Conexion);
    $listaTelefonos = $consultaTele->listaTelefonos($persona->IdPersona);
    // var_dump($datos);
    foreach ($listaTelefonos as $listT)
    {
      $persona->setListaTelefonos($listT['numeroTelefono']);
    }

    $persona->PrimerNombre = $datos['primerNombre'];
    $persona->SegundoNombre = $datos['segundoNombre'];
    $persona->ApellidoPaterno = $datos['apellidoPaterno'];
    $persona->ApellidoMaterno = $datos['apellidoMaterno'];
    $persona->CI = $datos['CI'];
    $persona->LugarExpedicion = $datos['nombreLugarExpedicion'];
    $persona->FechaNacimiento = $datos['fechaNacimiento'];
    $persona->Sexo = $datos['sexo'];
    $persona->EstadoCivil = $datos['nombreEstadoCivil'];

    $personal->IdPersonal = $datos['idPersonal'];
    $personal->IdPersona = $persona;
    $personal->IdNacion = $datos['nombreNacion'];
    $personal->IdTipoPersonal = $datos['nombreTipoPersonal'];
    $personal->IdCarrera = $datos['nombreCarrera'];
    $personal->IdCargo = $datos['nombreCargoPersona'];
    $personal->Direccion = $datos['direccion'];
    $personal->Email = $datos['email'];
    $personal->IdCiudadNacimiento = $datos['nombreCiudad'];
    $personal->IdReligion = $datos['nombreReligion'];
    $personal->FechaBautizmo = $datos['fechaBautizmo'];
    $personal->IdSeguro = $datos['nombreSeguro'];
    $personal->NumeroSeguro = $datos['numeroSeguro'];
    $personal->IdAfp = $datos['nombreAfp'];
    $personal->NumeroAfp = $datos['numeroAfp'];
    $personal->NumeroLibretaMilitar = $datos['numeroLibretaMilitar'];
    $personal->NumeroPasaporte = $datos['numeroPasaporte'];
    $personal->TipoSangre = $datos['tipoSangre'];
    $personal->Hobby = $datos['hobby'];
    $personal->LecturaPreferencial = $datos['lecturaPreferencial'];
    $personal->NumeroRegistroProfesional = $datos['numeroRegistroProfesional'];
    $personal->FechaIngreso = $datos['fechaIngreso'];
    $personal->Ruta = $datos['rutaFoto'];
    $personal->Estado = $datos['estado'];

    $personalConyugueManejador = new ConyuguePersonalControlador($this->Conexion);
    $personalConyugue = $personalConyugueManejador->ver($personal->IdPersonal);

    $personalHijosManejador = new HijosPersonalControlador($this->Conexion);
    $personalHijos = $personalHijosManejador->verHijos($personal->IdPersonal);

    $personalReferenciaManejador = new ReferenciaPersonalControlador($this->Conexion);
    $personalReferencia = $personalReferenciaManejador->ver($personal->IdPersonal);

    $cusosPersonalManejador = new CursoEstudiadoControlador($this->Conexion);
    $listaCursosPersonal = $cusosPersonalManejador->listarPer($personal->IdPersonal);

    $titulosPersonalManejador = new TituloProfesionalControlador($this->Conexion);
    $listaTitulosPersonal = $titulosPersonalManejador->listarPer($personal->IdPersonal);

    $experienciaLaboral = new ExperienciaLaboralControlador($this->Conexion);
    $listaExperienciaPersonal = $experienciaLaboral->listarPer($personal->IdPersonal);

    $personal->C_HijosLista = $personalHijos;

    $personal->C_Conyugue = $personalConyugue;

    $personal->C_Referencia = $personalReferencia;

    $personal->ListaCursos = $listaCursosPersonal;

    $personal->ListaTitulos = $listaTitulosPersonal;

    $personal->ListaExperinciaLaboral = $listaExperienciaPersonal;

    $listaCargos = $consulta->cargosPersonal($personal->IdPersonal);
    $listaEnfermedades = $consulta->enfermedadesPersonal($personal->IdPersonal);
    $listaDeportes = $consulta->deportesPersonal($personal->IdPersonal);

    foreach ($listaCargos as $listaC)
    {
      $cargo = new Cargo();
      $cargo->IdCargo = $listaC['idCargo'];
      $cargo->NombreCargo = $listaC['nombreCargo'];
      $personal->setListaCargos($cargo);
    }

    foreach ($listaEnfermedades as $listaE)
    {
      $enfermedad = new Enfermedad();
      $enfermedad->IdEnfermedad = $listaE['idEnfermedad'];
      $enfermedad->NombreEnfermedad = $listaE['nombreEnfermedad'];
      $personal->setListaEnfermedades($enfermedad);
    }

    foreach ($listaDeportes as $listaD)
    {
      $deporte = new Deporte();
      $deporte->IdDeporte = $listaD['idDeporte'];
      $deporte->NombreDeporte = $listaD['nombreDeporte'];
      $personal->setListaDeportes($deporte);
    }

    return $personal;
  }



  public function agregarCargo($personal, $cargo)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO cargoPersonal (idCargo, idPersonal) VALUES (:cargo, :personal)";

      $stmtPersonalCargo = $this->Conexion->prepare($query);

      $stmtPersonalCargo->bindValue(":cargo", $cargo);
      $stmtPersonalCargo->bindValue(":personal", $personal);

      $stmtPersonalCargo->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {

      $this->Conexion->rollBack();

      echo "Error al Registrar";

    }
  }

  public function agregarDeporte($personal, $deporte)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO deportePersonal (idDeporte, idPersonal) VALUES (:deporte, :personal)";

      $stmtPersonalDeporte = $this->Conexion->prepare($query);

      $stmtPersonalDeporte->bindValue(":deporte", $deporte);
      $stmtPersonalDeporte->bindValue(":personal", $personal);

      $stmtPersonalDeporte->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {

      $this->Conexion->rollBack();

      echo "Error al Registrar";

    }
  }

  public function agregarEnfermedad($personal, $enfermedad)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO enfermedadPersonal (idEnfermedad, idPersonal) VALUES (:enfermedad, :personal)";

      $stmtPersonalEnfermedad = $this->Conexion->prepare($query);

      $stmtPersonalEnfermedad->bindValue(":enfermedad", $enfermedad);
      $stmtPersonalEnfermedad->bindValue(":personal", $personal);

      $stmtPersonalEnfermedad->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {

      $this->Conexion->rollBack();

      echo "Error al Registrar";

    }
  }

  public function listar()
  {
    $consulta = new PersonalConsulta($this->Conexion);
    $listaPersonal = $consulta->listaPersonal();
    $listArrayPersonal = array();
    $i = 0;
    foreach ($listaPersonal as $listaP) {
      $persona = new Persona();
      $persona->IdPersona = $listaP['idPersona'];
      $persona->PrimerNombre = $listaP['primerNombre'];
      $persona->SegundoNombre = $listaP['segundoNombre'];
      $persona->ApellidoPaterno = $listaP['apellidoPaterno'];
      $persona->ApellidoMaterno = $listaP['apellidoMaterno'];
      $persona->CI = $listaP['CI'];
      $persona->FechaNacimiento = $listaP['fechaNacimiento'];
      $persona->Sexo = $listaP['sexo'];

      $personal = new Personal();
      $personal->IdPersonal = $listaP['idPersonal'];
      $personal->IdPersona = $persona;
      $personal->IdCarrera = $listaP['idCarrera'];
      $personal->IdCargo = $listaP['idCargoPersona'];
      $personal->IdTipoPersonal = $listaP['nombreTipoPersonal'];
      $personal->Estado = $listaP['estado'];

      $listArrayPersonal[$i] = $personal;
      $i++;
    }
    return $listArrayPersonal;
  }

  public function darBeBaja()
  {
    $consulta = new PersonaConsulta($this->Conexion);
    $consul = new PersonalConsulta($this->Conexion);
    $usuarioCons = new UsuarioConsulta($this->Conexion);

    $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonalDBAja']);
    $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);
    $user = $usuarioCons->obtenerUsuario($idPersona['idPersona']);
    if ($user)
    {
      $usuario = new Usuario($user['usuario'], $user['contrasena']);
      $usuario->IdUsuario = $user['idUsuario'];
      $usuarioCons->updateDown($usuario);
      $personal = new Personal();
      $personal->IdPersonal = $idPersonal['idPersonal'];
      $consul->updateDown($personal);
    }
    else
    {
      $personal = new Personal();
      $personal->IdPersonal = $idPersonal['idPersonal'];
      $consul->updateDown($personal);
    }
  }

  public function habilitar()
  {
    $consulta = new PersonaConsulta($this->Conexion);
    $consul = new PersonalConsulta($this->Conexion);
    $usuarioCons = new UsuarioConsulta($this->Conexion);

    $idPersona = $consulta->obtenerIdPersona($_POST['ciPersonalDBAja']);
    $idPersonal = $consul->obtenerIdPersonal($idPersona['idPersona']);
    $user = $usuarioCons->obtenerUsuario($idPersona['idPersona']);
    if ($user)
    {
      $usuario = new Usuario($user['usuario'], $user['contrasena']);
      $usuario->IdUsuario = $user['idUsuario'];
      $usuarioCons->updateUp($usuario);
      $personal = new Personal();
      $personal->IdPersonal = $idPersonal['idPersonal'];
      $consul->updateUp($personal);
    }
    else
    {
      $personal = new Personal();
      $personal->IdPersonal = $idPersonal['idPersonal'];
      $consul->updateUp($personal);
    }
  }

  public function editar()
  {

    $personalManejador = new PersonalConsulta($this->Conexion);

    if ($_FILES)
    {
      $target_path = "/wamp64/www/PersonalUAB/view/libs/multimedia/img/personal/";
      $target_path = $target_path . basename("img".strtoupper($_POST['ciPersona']).".jpg");

      $a=move_uploaded_file($_FILES["fotoPersonal"]["tmp_name"], $target_path);
    }
    else
    {
      $target_path = $_POST['imagenPersonal'];
    }

    $personal = new Personal();
    $personal->IdPersonal = $_POST['idPersonal'];
    $personal->IdPersona = $_POST['idPersona'];
    $personal->IdNacion = $_POST['nacionalidad'];
    $personal->IdTipoPersonal = $_POST['tipoPersonal'];
    $personal->IdCarrera = ($_POST['carrera']=="") ? null : $_POST['carrera'];
    $personal->IdCargo = ($_POST['cargoPersonal']=="") ? null : $_POST['cargoPersonal'];
    $personal->Direccion = $_POST['direccion'];
    $personal->Email = $_POST['email'];
    $personal->IdCiudadNacimiento = ($_POST['ciudad']=="") ? null : $_POST['ciudad'];
    $personal->IdReligion = ($_POST['religion']=="") ? null : $_POST['religion'];
    $personal->FechaBautizmo = $_POST['fechaBau'];
    $personal->IdSeguro = ($_POST['seguro']=="") ? null : $_POST['seguro'];
    $personal->NumeroSeguro = $_POST['numSeguro'];
    $personal->IdAfp = ($_POST['afp']=="") ? null : $_POST['afp'];
    $personal->NumeroAfp = $_POST['numSeguro'];
    $personal->NumeroLibretaMilitar = $_POST['numLibMilitar'];
    $personal->NumeroPasaporte = $_POST['numPasaporte'];
    $personal->TipoSangre = $_POST['tipoSangre'];
    $personal->Hobby = $_POST['hobby'];
    $personal->LecturaPreferencial = $_POST['lecturaP'];
    $personal->NumeroRegistroProfesional = $_POST['numeroRegProfesional'];
    $personal->FechaIngreso = $_POST['fechaIngres'];
    $personal->Ruta = $target_path;

    $estado = $personalManejador->edit($personal);

    $id = $_POST['idPersonal'];

    if (isset($_POST['cargos']))
    {
      $personalManejador->limpiarCargos($id);
      foreach($_POST['cargos'] as $item)
      {
        $this->agregarCargo($id, $item);
      }
    }
    if (isset($_POST['enfermedades']))
    {
      $personalManejador->limpiarEnfermedades($id);
      foreach($_POST['enfermedades'] as $item)
      {
        $this->agregarEnfermedad($id, $item);
      }
    }
    if (isset($_POST['deportes']))
    {
      $personalManejador->limpiarDeportes($id);
      foreach($_POST['deportes'] as $item)
      {
        $this->agregarDeporte($id, $item);
      }
    }

    return $estado;
  }

  public function crearPreventUsuario($idPersona)
  {
    $fecha=date("Y/m/d");

    $personal = new Personal();
    $personal->IdPersona = $idPersona;
    $personal->IdNacion = 1;
    $personal->IdTipoPersonal = $_POST['tipoUsuario'] - 2;
    $personal->IdCarrera = $_POST['carrera'];
    $personal->IdCargo = $_POST['cargoPersonal'];
    $personal->Direccion = "";
    $personal->IdCiudadNacimiento = 1;

    $personal->IdCiudadNacimiento = 1;
    $personal->IdReligion = 1;
    $personal->IdSeguro = 1;
    $personal->IdAfp = 1;

    $personal->FechaIngreso = $fecha;

    $this->crear($personal);

  }

}

?>
