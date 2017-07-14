<div class="table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre Completo</th>
        <th>CI</th>
        <th>Sexo</th>
        <th>Tipo Personal</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($listaDePersonal as $persona): ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo "{$persona['apellidoPaterno']} {$persona['apellidoMaterno']} {$persona['primerNombre']} {$persona['segundoNombre']}" ?></td>
          <td><?php echo $persona['CI'] ?></td>
          <td><?php echo $persona['sexo'] ?></td>
          <td><?php echo $persona['nombreTipoPersonal'] ?></td>
        </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</div>
<br>
<?php
$datos = serialize($_POST);
?>
<div class="container">
  <div class="row">
    <div class="col-xs-2 col-md-2">
      <form action="../reportes/listaPersonalRepPDF.php" method="POST">
        <input type="hidden" name="tipoPersonal" value="<?php echo $_POST['tipoPersonal'] ?>">
        <input type="hidden" name="fechaInicio" value="<?php echo $_POST['fechaInicio'] ?>">
        <input type="hidden" name="fechaFin" value="<?php echo $_POST['fechaFin'] ?>">
        <button type="submit" class="btn btn-danger btn-sm">Exportar PDF <i class="fa fa-file-pdf-o"></i></button>
      </form>
    </div>
    <div class="col-xs-12 col-md-2">
      <form action="../reportes/listaPersonalRepWORD.php" method="POST">
        <input type="hidden" name="tipoPersonal" value="<?php echo $_POST['tipoPersonal'] ?>">
        <input type="hidden" name="fechaInicio" value="<?php echo $_POST['fechaInicio'] ?>">
        <input type="hidden" name="fechaFin" value="<?php echo $_POST['fechaFin'] ?>">
        <button type="submit" class="btn btn-primary btn-sm">Exportar WORD <i class="fa fa-file-pdf-o"></i></button>
      </form>
    </div>
    <div class="col-xs-12 col-md-2">
      <form action="../reportes/listaPersonalRepEXCEL.php" method="POST">
        <input type="hidden" name="tipoPersonal" value="<?php echo $_POST['tipoPersonal'] ?>">
        <input type="hidden" name="fechaInicio" value="<?php echo $_POST['fechaInicio'] ?>">
        <input type="hidden" name="fechaFin" value="<?php echo $_POST['fechaFin'] ?>">
        <button type="submit" class="btn btn-success btn-sm">Exportar EXCEL <i class="fa fa-file-pdf-o"></i></button>
      </form>
    </div>
  </div>
</div>
<br>
