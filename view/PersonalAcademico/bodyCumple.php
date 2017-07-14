<?php
setlocale(LC_TIME, "es_ES");

$mes=date( "m");

include '../../model/CumpleConsulta.php';
$conexion = new Conexion();
$cumpleMes=new CumpleConsulta($conexion);
$listaCumples=$cumpleMes->listaDeCumples($mes);

 ?>
<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-6">
          <h2>Cumpleañeros del Mes</h2>
      </div>

  </div>
  <link href="../libs/css/tarjeta.css" rel="stylesheet">

  <div class="row">
    <div class="col-lg-12" >
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                  <h4><span class="text-navy"><i class="fa fa-birthday-cake"></i> Cumpleañeros </span> /<span class="text-muted">Personal</span></h4>
                </div>
                <div class="panel panel-primary">
<!-- cumple dia -->

<?php foreach ($listaCumples as $listaC ):
  $date = date_create($listaC['fechaNacimiento']);

  ?>

                  <div class="row" >
                    <div class="col-md-12" id="home-box" >
                            <ul class="list-group" style="background:#73eb91">
                              <li class="list-group-item" style="color:#05300b"><strong><h4><?php echo date_format($date, 'M-d'); ?></h2></strong></li>
                                <div class="" >
                                  <div class="media block-update-card" style="background:#bbf2d9">
                                    <div class="col-md-3">
                                      <img class="media-object update-card-MDimentions" src="../libs/multimedia/img/design/user-6.png" alt="...">
                                    </div>
                                    <div class="col-md-3">
                                      <div class="media-body update-card-body" >

                                        <h4 class="media-heading" style="color:black"><?php echo $listaC['nombreTipoPersonal'];?></h4>
                                        <h3 class="media-heading" style="color:black"><p><?php echo $listaC['primerNombre']." ".$listaC['apellidoPaterno']." ".$listaC['apellidoMaterno'] ?></p></h3>

                                        <p><strong>E-mail: </strong><?php echo $listaC['email'];?></p>
                                      </div>
                                    </div>
                                   </div>
                                </div>
                              </ul>
                    </div>
                  </div>

                <?php endforeach; ?>



                </div>
            </div>
        </div>
    </div>
  </div>
</div>
