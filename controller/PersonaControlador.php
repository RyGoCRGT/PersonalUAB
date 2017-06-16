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

}

?>
