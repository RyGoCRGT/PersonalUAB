<?php
$fecha=date( "d/m/Y");
?>
<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3 col-md-9">
          <h2>Bienvenido </h2>
          <small>Al sistema de control de Personal UAB.</small>

      </div>
        <!-- <button type="button" class="btn btn-primary btn-lg btn3d"> -->
          <div class="col-sm-3 col-md-3" style="background:#d5dce4" >

        <div class="text-center">
          <h2><?php echo $fecha; ?> </h2>
          <h3> FECHA <i class="fa fa-calendar"></i></h3>
        </div>
      </div>
      <!-- </button> -->

  </div>


  <div class="row">
    <div class="col-lg-6">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Noticias </span> /<span class="text-muted">Hoy</span></h4>
                </div>
                <div class="media" style="background:rgb(235, 247, 247)">
                    <a class="forum-avatar" href="#">
                        <img src="../libs/multimedia/img/design/uab.png" class="img-circle img-responsive" alt="image">
                        <div class="author-info">
                            <strong>Posts:</strong> 542<br/>
                            <strong>Fecha:</strong> <?php echo $fecha; ?><br/>
                        </div>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Feria de Tecnologia</h4>
                        Organizado por la facultad de Ingenieria
                        <br/><br/>
                        Feria de Innovacion Tecnologica  <a href="#" class="btn btn-xs btn-info"> mas... </a>
                        <br/><br/>
                        -Administracion
                        UAB.
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-birthday-cake"></i> Cumpleaños </span> /<span class="text-muted">Hoy</span></h4>
                </div>
                <link href="../libs/css/font-awesome/css/miestilo.css" rel="stylesheet">
                            <div class="card hovercard">
                                <div class="cardheader" >

                                </div>
                                <div class="avatar">
                                    <img src="../libs/multimedia/img/design/PastelHB.png">
                                </div>
                                <div class="info">
                                    <div class="title">
                                        <a href="">Lista de cumpleañeros</a>
                                    </div>

                                    <div class="desc"><strong>Rodrigo Luis Poma Mollo</strong> <a style="color:blue" href="">Felicitar</a></div>
                                    <div class="desc"><strong>Miguel Angel Gutierrez</strong> <a style="color:blue" href="">Felicitar</a></div>
                                    <div class="desc"><strong>Erika Suxo Ramos</strong> <a style="color:blue" href="">Felicitar</a></div>
                                    <br>
                                    <a href="index.php?modo=cumplePersonal"><button  type="button" class="btn btn-primary btn-lg btn3d"><span class="fa fa-birthday-cake"></span> VER CUMPLEAÑEROS DEL MES</button></a><br>
                                </div>

                              </div>
            </div>
        </div>
    </div>





</div>

</div>

<!-- <div class="container">
  <h2>Responsive Embed</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="../libs/comercial.pdf"></iframe>
  </div>
</div> -->
