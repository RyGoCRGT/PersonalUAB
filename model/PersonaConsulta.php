<?php

class PersonaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function existePersonaCrear($ci)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona where CI=:ci');
    $consulta->bindParam(':ci', $ci);
    $consulta->execute();
    $registro = $consulta->fetch();

    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

  public function obtenerIdPersona($ci)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona where CI=:ci');
    $consulta->bindParam(':ci', $ci);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }
  public function listaPersona()
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona');
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function listaTelefonos($id)
  {
    $query = "SELECT *
              FROM telefono
              WHERE idPersona = :idPersona";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idPersona', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function edit($persona)
  {
    if ($persona->FechaNacimiento)
    {
      try
    	{
    		$this->Conexion->beginTransaction();

    		$query = 'UPDATE
        					  persona
        				  SET
          					primerNombre =  :primerNombre,
          					segundoNombre = :segundoNombre,
          					apellidoPaterno = :apellidoPaterno,
          					apellidoMaterno = :apellidoMaterno,
          					CI = :CI,
          					idLugarExpedicion = :idLugarExpedicion,
          					fechaNacimiento = :fechaNacimiento,
          					sexo = :sexo,
          					idEstadoCivil = :idEstadoCivil
          				WHERE
          					idPersona = :idPersona';

    		$stmtPersona = $this->Conexion->prepare($query);

    		$stmtPersona->bindValue(':primerNombre', $persona->PrimerNombre);
    		$stmtPersona->bindValue(':segundoNombre', $persona->SegundoNombre);
    		$stmtPersona->bindValue(':apellidoPaterno', $persona->ApellidoPaterno);
    		$stmtPersona->bindValue(':apellidoMaterno', $persona->ApellidoMaterno);
    		$stmtPersona->bindValue(':CI', $persona->CI);
    		$stmtPersona->bindValue(':idLugarExpedicion', $persona->LugarExpedicion);
    		$stmtPersona->bindValue(':fechaNacimiento', $persona->FechaNacimiento);
    		$stmtPersona->bindValue(':sexo', $persona->Sexo);
    		$stmtPersona->bindValue(':idEstadoCivil', $persona->EstadoCivil);
    		$stmtPersona->bindValue(':idPersona', $persona->IdPersona);

    		$stmtPersona->execute();

    		$this->Conexion->commit();
        return true;
    	}
    	catch (Exception $e)
    	{
    		$this->Conexion->rollback();
        return false;
    	}
    }
    else
    {
      try
    	{
    		$this->Conexion->beginTransaction();

    		$query = 'UPDATE
        					  persona
        				  SET
          					primerNombre =  :primerNombre,
          					segundoNombre = :segundoNombre,
          					apellidoPaterno = :apellidoPaterno,
          					apellidoMaterno = :apellidoMaterno,
          					CI = :CI,
          					idLugarExpedicion = :idLugarExpedicion,
          					sexo = :sexo,
          					idEstadoCivil = :idEstadoCivil
          				WHERE
          					idPersona = :idPersona';

    		$stmtPersona = $this->Conexion->prepare($query);

    		$stmtPersona->bindValue(':primerNombre', $persona->PrimerNombre);
    		$stmtPersona->bindValue(':segundoNombre', $persona->SegundoNombre);
    		$stmtPersona->bindValue(':apellidoPaterno', $persona->ApellidoPaterno);
    		$stmtPersona->bindValue(':apellidoMaterno', $persona->ApellidoMaterno);
    		$stmtPersona->bindValue(':CI', $persona->CI);
    		$stmtPersona->bindValue(':idLugarExpedicion', $persona->LugarExpedicion);
    		$stmtPersona->bindValue(':sexo', $persona->Sexo);
    		$stmtPersona->bindValue(':idEstadoCivil', $persona->EstadoCivil);
    		$stmtPersona->bindValue(':idPersona', $persona->IdPersona);

    		$stmtPersona->execute();

    		$this->Conexion->commit();
        return true;
    	}
    	catch (Exception $e)
    	{
    		$this->Conexion->rollback();
        return false;
    	}
    }

  }

  public function existePersonaEditar($id, $ciNew)
  {
    $query = "SELECT *
              FROM persona
              WHERE idPersona != :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    $existe = false;
    if ($registro)
    {
      foreach ($registro as $dato)
      {
        if ($dato['CI'] == $ciNew)
        {
          echo "hola";
          $existe  =  true;
          break;
        }
      }
      return $existe;
    }
    else
    {
      return $existe;
    }
  }

}

?>
