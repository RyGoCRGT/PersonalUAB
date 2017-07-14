<?php
include '../../model/conexion.php';
include '../../model/Telefono.php';
include '../../model/TelefonoConsulta.php';
include '../../model/persona.php';
include '../../model/PersonaConsulta.php';
include '../../controller/PersonaControlador.php';

$con=new Conexion ();
$personaControlador = new PersonaControlador($con);
$listaPersona=$personaControlador->listarPersona();

 ?>
<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Directorio</h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12" >
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                  <div class="pull-right">
                    <a href="#RegistroContacto" data-toggle="modal" class="clickable filter btn btn-success">Añadir Contacto <i class="fa fa-user-plus" data-toggle="tooltip" title="Añadir nuevo Contacto"></i></a>
                    <!-- <span class="clickable filter btn btn-info" data-toggle="tooltip" title="Click aqui para buscar un Producto" data-container="body">
                      <i class="fa fa-search"></i>
                    </span> -->
                  </div>
                  <h4><span class="text-navy"><i class="fa fa-phone-square"></i> Directorio </span> /<span class="text-muted">Contactos</span></h4>
                </div>



                <div class="panel panel-primary">
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Contacto" />
                  </div>

        					<div class="panel-heading" style="background:rgb(57, 139, 198)">


                    <div class="table-responsive">
                      <table class="table">
                        <thead class="desk">
                          <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nombre Completo</th>
                            <th class="text-center">Ver</th>
                            <th class="text-center">Editar</th>
                          </tr>
                        </thead>
                      </table>
                    </div>

        					</div>

                  <div class="table-responsive" style="height:350px;overflow-y:scroll;; background:rgb(236, 244, 246)">
                    <table class="table table-hover" id="dev-table" >

                      <tbody class="text-center">

                        <?php
                      $i = 1;
                            foreach ($listaPersona as $listaP): ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo ucwords(strtolower($listaP->PrimerNombre))." ".ucwords(strtolower($listaP->ApellidoPaterno))." ".ucwords(strtolower($listaP->ApellidoMaterno)); ?></td>
                          <td><a href="#ver<?php echo $listaP->IdPersona;?>" class="btn btn-danger efec" data-toggle="modal"><i class="fa fa-eye"></i></a></td>
                          <td><a href="#editar" class="btn btn-primary efec" data-toggle="modal"><i class="fa fa-pencil"></i></a></td>

                        </tr>

                      <?php
                        include '../modalForm/verContacto.php';

                        endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>


        </div>
    </div>
  </div>
</div>

</div>
<?php
  include '../modalForm/registroContacto.php';

?>
