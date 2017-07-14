<div class="panel panel-default">
  <div class="panel-heading">
    <div class="text-center">
      <h2><strong><?php echo $archivo->C_TipoArchivo ?></strong></h2>
      <hr>
      <div class="embed-responsive embed-responsive-16by9">
        <?php
          list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $archivo->Archivo);
        ?>
        <iframe class="embed-responsive-item" src="‪<?php echo "../../../".$ruta ?>"></iframe>

      </div>
    </div>
  </div>
  <div class="panel-body text-center">
    <h1><strong><?php echo $archivo->NombreArchivo ?></strong></h1>
  </div>
</div>
