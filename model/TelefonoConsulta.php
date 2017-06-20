<?php

class TelefonoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function existeTelefono($num)
  {
    $query = "SELECT * FROM telefono where numeroTelefono = :num";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':num', $num);
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
  public function listaNumeroPersona($id)
{
  $query="SELECT * FROM telefono WHERE idPersona=:idPer";
  $consulta=$this->Conexion->prepare($query);
  $consulta->bindParam(':idPer',$id);
  $consulta->execute();
  $registro=$consulta->fetchAll();
  return $registro;
}


}

?>
