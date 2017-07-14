<?php
include '../../model/conexion.php';
include '../../model/PersonalConsulta.php';
include '../../controller/ReportesControlador.php';

$conexion = new Conexion();

$reporte = new ReportesControlador($conexion);
$listaDePersonal = $reporte->listadoPersonal();

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_ListaPersponal.doc");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="file://C:/wamp64/www/PersonalUAB/view/libs/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="container ">
      <div class="row">
        <div class="col-sm-4">
          <center><img src="file://C:/wamp64/www/PersonalUAB/view/libs/multimedia/img/design/uabLogo.jpg" alt="" width="70" height="70"></center>
        </div>
        <div class="col-sm-4">
          <div class="text-center">
            <h2>Lista de Personal</h2>
          </div>
        </div>
        <div class="col-sm-4"></div>
      </div>
      <hr>
      <table class="table table-bordered table-hover">
        <tr class="info">
          <th style="border: 0px; background:white;"></th>
          <th class="text-left">#</th>
          <th class="text-left">Nombre Completo</th>
          <th class="text-left">CI</th>
          <th class="text-left">Sexo</th>
          <th class="text-left">Tipo Personal</th>
        </tr>
        <?php $i=0; foreach ($listaDePersonal as $persona): $i++; ?>
          <tr>
            <td class="text-left"><?php echo $i ?></td>
            <td class="text-left"><?php echo $persona['apellidoPaterno']." ".$persona['apellidoMaterno']." ".$persona['primerNombre']." ".$persona['segundoNombre'] ?></td>
            <td class="text-left"><?php echo $persona['CI'] ?></td>
            <td class="text-left"><?php echo $persona['sexo'] ?></td>
            <td class="text-left"><?php echo $persona['nombreTipoPersonal'] ?></td>
          </tr>
        <?php  endforeach; ?>
      </table>
      <div class="pull-left">
        <p class="btn btn-primary btn-lg"><?php echo "Total = {$i}" ?></p>
      </div>
    </div>
  </body>
</html>
