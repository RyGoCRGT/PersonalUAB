<?php

class PersonaControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($persona)
  {
    $existe = false;
    $consulta = new PersonaConsulta($this->Conexion);
    if ($persona->SegundoNombre == "")
    {
      $persona->SegundoNombre = null;
    }
    if ($persona->ApellidoMaterno == "")
    {
      $persona->ApellidoMaterno = null;
    }
    $existe = $consulta->existePersonaCrear($persona->CI);
    if ($existe == false)
    {
      try {

        $this->Conexion->beginTransaction();

        $query = "INSERT INTO persona (idPersona, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, CI, idLugarExpedicion, fechaNacimiento, sexo, idEstadoCivil)
                  VALUES (:idPersona, :primerNombre, :segundoNombre, :apellidoPaterno, :apellidoMaterno, :CI, :idLugarExpedicion, :fechaNacimiento, :sexo, :idEstadoCivil)";

        $stmtPersona = $this->Conexion->prepare($query);

        $stmtPersona->bindValue(':idPersona', $persona->IdPersona);
        $stmtPersona->bindValue(':primerNombre', $persona->PrimerNombre);
        $stmtPersona->bindValue(':segundoNombre', $persona->SegundoNombre);
        $stmtPersona->bindValue(':apellidoPaterno', $persona->ApellidoPaterno);
        $stmtPersona->bindValue(':apellidoMaterno', $persona->ApellidoMaterno);
        $stmtPersona->bindValue(':CI', $persona->CI);
        $stmtPersona->bindValue(':idLugarExpedicion', $persona->LugarExpedicion);
        $stmtPersona->bindValue(':fechaNacimiento', $persona->FechaNacimiento);
        $stmtPersona->bindValue(':sexo', $persona->Sexo);
        $stmtPersona->bindValue(':idEstadoCivil', $persona->EstadoCivil);

        $stmtPersona->execute();

        $this->Conexion->commit();



      } catch (PDOException $e) {

        $this->Conexion->rollBack();

        echo "Error al Registrar";

      }

    }
    else
    {
      echo "<p style='color: red'>Persona Existente</p>";
    }
  }


public function listarPersona()
{
$consulta = new PersonaConsulta($this->Conexion);
$listaPersona = $consulta->listaPersona();
$listArray = array();
$i = 0;
foreach ($listaPersona as $listaP) {
  $persona = new Persona();
  $persona->IdPersona = $listaP['idPersona'];
  $persona->PrimerNombre = $listaP['primerNombre'];
  $persona->SegundoNombre = $listaP['segundoNombre'];
  $persona->ApellidoPaterno = $listaP['apellidoPaterno'];
  $persona->ApellidoMaterno = $listaP['apellidoMaterno'];
  //telefono
  $consultaTel = new TelefonoConsulta($this->Conexion);
  $listaTelefono = $consultaTel->listaNumeroPersona($listaP['idPersona']);
  $c = 0;
  $listArrayTelefonos = array();
  foreach ($listaTelefono as $listaT) {
      $telefono=new Telefono();
      $telefono->NumeroTelefono=$listaT['numeroTelefono'];
      // echo   $persona->PrimerNombre ;
      // echo   $telefono->NumeroTelefono;
      $listArrayTelefonos[$c]=$telefono;
      $c++;
  }
  $persona->ListaTelefonos=$listArrayTelefonos;
  $listArray[$i] = $persona;
  $i++;
}
return $listArray;
}

  public function editar()
  {

    $consultaPersona = new PersonaConsulta($this->Conexion);

    $datosPersona = $consultaPersona->obtenerIdPersona($_POST['persona']);

    if ( ($datosPersona['primerNombre'] == $_POST['primerNombre'])
      && ($datosPersona['segundoNombre'] == $_POST['segundoNombre'])
      && ($datosPersona['apellidoPaterno'] == $_POST['apellidoPaterno'])
      && ($datosPersona['apellidoMaterno'] == $_POST['apellidoMaterno'])
      && ($datosPersona['CI'] == $_POST['ciNit'])
      && ($datosPersona['idLugarExpedicion'] == $_POST['lugarExpedicion'])
      && ($datosPersona['fechaNacimiento'] == $_POST['fechaNac'])
      && ($datosPersona['sexo'] == $_POST['sexo'])
      && ($datosPersona['idEstadoCivil'] == $_POST['estadoCivil']) )
    {
      return "<p style='color:rgb(214, 129, 17)'>Sin Cambios</p>";
    }
    else
    {

      $existe = $consultaPersona->existePersonaEditar($datosPersona['idPersona'], $_POST['ciNit']);

      if ($existe == false)
      {
        $persona = new Persona();
        $persona->IdPersona = $datosPersona['idPersona'];
        $persona->PrimerNombre = ucwords(strtolower($_POST['primerNombre']));
        $persona->SegundoNombre = ucwords(strtolower($_POST['segundoNombre']));
        $persona->ApellidoPaterno = ucwords(strtolower($_POST['apellidoPaterno']));
        $persona->ApellidoMaterno = ucwords(strtolower($_POST['apellidoMaterno']));
        $persona->CI = strtoupper($_POST['ciNit']);
        $persona->LugarExpedicion = ucwords(strtolower($_POST['lugarExpedicion']));
        $persona->FechaNacimiento = $_POST['fechaNac'];
        $persona->Sexo = strtoupper($_POST['sexo']);
        $persona->EstadoCivil = ucwords(strtolower($_POST['estadoCivil']));

        $estadoSave = $consultaPersona->edit($persona);

        if ($estadoSave ==  true)
        {
          return 3;
        }
        else
        {
          return 4;
        }
      }
      else
      {
        return "<p style='color:red'>Existe Persona Con este CI</p>";
      }
    }

  }

}


?>
