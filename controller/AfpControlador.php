<?php

class AfpControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new AfpConsulta($this->Conexion);
    $listaAfps = $consulta->listaAfp();
    $listaArrayAfps = array();
    $i = 0;
    foreach ($listaAfps as $listaA) {
      $afp = new Afp();
      $afp->IdAfp = $listaA['idAfp'];
      $afp->NombreAfp = $listaA['nombreAfp'];
      $listaArrayAfps[$i] = $afp;
      $i++;
    }
    return $listaArrayAfps;
  }

}

?>
