<?php
/**
 *
 */
class PersonaBD
{

  public function insertarPersona($persona, $conn)
  {
    //Insertar PERSONA
    private $IdPersona;
    private $PrimerNombre;
    private $SegundoNombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $CI;
    private $LugarExpedicion;
    private $FechaNacimiento;
    private $Sexo;
    private $EstadoCivil;

    $id = $producto->IdProducto;
    $name = $producto->NombreProducto;
    $idCat = $producto->C_Categoria->IdCategoria;
    $idMet = $producto->C_Metrica->IdMetrica;
    $error = 1;
    try {

      $conn->beginTransaction();

      $prod_insert = 'INSERT INTO producto (idProducto, nombreProducto, idUnidMedida, idCatProducto)
                    VALUES (:idProducto, :nombreProducto, :idUnidMedida, :idCatProducto);';

      $stmtProd = $conn->prepare($prod_insert);

      $stmtProd->bindParam(':idProducto', $id);
      $stmtProd->bindParam(':nombreProducto', $name);
      $stmtProd->bindParam(':idUnidMedida', $idMet);
      $stmtProd->bindParam(':idCatProducto', $idCat);

      $stmtProd->execute();

      $conn->commit();
      $error = 0;
    } catch (PDOException $e) {
      $error = 1;
      $conn->rollBack();
    }
    return $error;
  }

}

 ?>
