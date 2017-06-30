<div class="modal fade" id="ver<?php echo $listaP->IdPersona;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="#" method="post">

        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <strong><h2 class="modal-title"><i class="fa fa-eye"></i> VER <i class="fa fa-arrow-right"></i> Contacto</h2></strong>
        </div>
        <div class="modal-body">


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <img src="../libs/multimedia/img/design/avatar.png" alt="" class="img-rounded img-responsive" />
                            </div>
                            <div class="col-sm-6 col-md-8">
                              <strong><h4 style="color:green"><i class="fa fa-user"></i> Nombre Completo</h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaP->PrimerNombre." ".$listaP->ApellidoPaterno." ".$listaP->ApellidoMaterno; ?></h4>
                              <strong><h4 style="color:green"><i class="fa fa-id-card-o"></i> Cargo</h4></strong>
                              <strong><h4 style="color:green"><i class="fa fa-phone"></i> Telefono(s)</h4></strong>
                              <?php
                              foreach ($listaP->ListaTelefonos as $listaT) {
                               ?>
                                <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaT->NumeroTelefono; ?></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Volver</button>
        </div>

      </form>

    </div>
  </div>
</div>
