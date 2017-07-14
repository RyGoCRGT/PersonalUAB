<div class="modal fade" id="ver<?php echo $listaC->idContacto;?>">
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
                        <center><div class="row">
                            <div class="col-sm-12 col-md-6">
                              <strong><h4 style="color:green"><i class="fa fa-user"></i> Nombre Completo</h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaC->primerNombre." ".$listaC->apellidoPaterno." ".$listaC->apellidoMaterno; ?></h4>
                              <strong><h4 style="color:green"><i class="fa fa-id-card-o"></i> Tipo Empleado</h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaC->nombreTipoEmpleado; ?></h4>
                              <strong><h4 style="color:green"><i class="fa fa-id-card-o"></i> Responsabilidad</h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaC->nombreResponsabilidad; ?></h4>
                              <strong><h4 style="color:green"><i class="fa fa-venus-mars"></i> Sexo</h4></strong>
                              <?php if ($listaC->sexo=="M"){ ?>
                                <h4><i class="fa fa-caret-right"></i>Masculino</h4>
                              <?php } else{?>
                                <h4><i class="fa fa-caret-right"></i>Femenino</h4>
                              <?php }?>
                              <strong><h4 style="color:green"><i class="fa fa-address-book"></i> Número Voip</h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaC->voip; ?></h4>
                            </div>
                            <div class="col-sm-12 col-md-6">
                              <strong><h4 style="color:green"><i class="fa fa-address-book"></i> Número Interno</h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaC->interno; ?></h4>

                              <strong><h4 style="color:green"><i class="fa fa-envelope"></i> E-mail Personal</h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaC->emailPersonal; ?></h4>

                              <strong><h4 style="color:green"><i class="fa fa-envelope"></i> E-mail Institucional </h4></strong>
                              <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaC->emailInstitucional; ?></h4>

                              <strong><h4 style="color:green"><i class="fa fa-phone"></i> Telefono(s)</h4></strong>
                              <?php
                              foreach ($listaC->listaTelefonos as $listaT) {
                               ?>
                                <h4><i class="fa fa-caret-right"></i><?php echo " ".$listaT->numero; ?></h4>
                                <?php } ?>
                            </div>
                        </div></center>
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
