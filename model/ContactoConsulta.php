<?php

class ContactoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeContactosPorDepartamento($idDepartamentoContacto)
  {
    $query = "SELECT te.nombre as tipoempleado,
                     r.nombre AS responsabilidad,
                     c.idContacto,
                     c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre,
                     c.apellidoCasada,
                     c.sexo,c.interno,c.voip,c.fechaNacimiento,
                     c.emailPersonal,c.emailInstitucional
              FROM  departamentocontato dc, contacto c, responsabilidad r, tipoempleado te
              WHERE  dc.idDepartamentoContacto = :idDepartamentoContacto
              AND dc.idDepartamentoContacto = c.idDepartamentoContacto
              AND c.idTipoEmpleado  = te.idTipoEmpleado
              AND c.idResponsabilidad = r.idResponsabilidad
              ORDER BY tipoempleado,c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre, responsabilidad
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idDepartamentoContacto', $idDepartamentoContacto);
    $consulta->execute();
    $listaContactosPorDpto = $consulta->fetchAll();
    return $listaContactosPorDpto;
  }//end function


}//end class

?>
