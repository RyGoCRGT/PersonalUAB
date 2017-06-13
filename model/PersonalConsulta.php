<?php

class PersonalConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function obtenerIdPersonal($id)
  {
    $consulta = $this->Conexion->prepare('SELECT idPersonal FROM personal where idPersona=:id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

}

?>
