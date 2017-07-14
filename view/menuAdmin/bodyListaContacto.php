<?php
include '../../model/conexion.php';
include '../../model/DepartamentoContacto.php';
include '../../model/DepartamentoContactoConsulta.php';

include '../../model/Responsabilidad.php';
include '../../model/ResponsabilidadConsulta.php';
include '../../model/TipoEmpleado.php';
include '../../model/TipoEmpleadoConsulta.php';

include '../../model/Contacto.php';
include '../../model/ContactoConsulta.php';

include '../../model/TelefonoContacto.php';
include '../../model/TelefonoContactoConsulta.php';

include '../../controller/ContactoControlador.php';
include '../../controller/DepartamentoContactoControlador.php';
include '../../controller/TelefonoContactoControlador.php';
include '../../controller/ResponsabilidadControlador.php';
include '../../controller/TipoEmpleadoControlador.php';


$con=new Conexion ();
$departamentoControlador = new DepartamentoContactoControlador($con);
$listaDepartamentoContacto=$departamentoControlador->listar();

$ResponsabilidadControlador=new ResponsabilidadControlador($con);
$listaResponsabilidad=$ResponsabilidadControlador->listar();

$tipoEmpleadoControlador=new TipoEmpleadoControlador($con);
$listaTipoEmpleado=$tipoEmpleadoControlador->listar();

$contactoControlador=new ContactoControlador($con);
$listaContacto=$contactoControlador->listaDeContactosPorDepartamento($_POST['departamento']);

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
                    <!-- <a href="#RegistroContacto" data-toggle="modal" class="clickable filter btn btn-success">Añadir Contacto <i class="fa fa-user-plus" data-toggle="tooltip" title="Añadir nuevo Contacto"></i></a> -->




                  </div>
                  <h4><span class="text-navy"><i class="fa fa-phone-square"></i> Directorio </span> /<span class="text-muted">Contactos</span></h4>
                </div>


                <div class="panel-heading">
                  <div class="btn-group">
                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" title="Añadir nuevo Contacto"><i class="fa fa-user-plus" data-toggle="tooltip" ></i> Añadir Contacto <span class="caret"></span></button>

                      <ul class="dropdown-menu" style="background:#8bd298">
                        <?php foreach ($listaDepartamentoContacto as $listaDepCon): ?>
                          <li><a href="#RegistroContacto<?php echo $listaDepCon->idDepartamentoContacto;  ?>" style="color:black;" data-toggle="modal"><?php echo $listaDepCon->nombre; ?></a></li>
                        <?php
                        include '../modalForm/registroContacto.php';
                              endforeach; ?>
                      </ul>
                    </div>

                  <div class="row">
                    <form action="index.php?modo=listaDirectorioContacto" method="post">

                    <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                      <label>Departamento Contacto</label>
                      <div class="input-group selector">
                        <span class="input-group-addon" style="background: #c9e3eb; color:black" id="sizing-addon2"><i class="fa fa-building"></i></span>
                        <select class="selectpicker form-control" name="departamento" id="departamento" title="Departamento Contacto">
                          <?php foreach ($listaDepartamentoContacto as $listaDepCon): ?>
                            <option value="<?php echo $listaDepCon->idDepartamentoContacto; ?>"><?php echo $listaDepCon->nombre; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="input-group selector-mobile">
                        <span class="input-group-addon" style="background: #c9e3eb; color:black" id="sizing-addon2"><i class="fa fa-building"></i></span>
                        <select class="form-control" name="departamento" id="departamento" title="Departamento Contacto">
                          <?php foreach ($listaDepartamentoContacto as $listaDepCon): ?>
                            <option value="<?php echo $listaDepCon->idDepartamentoContacto; ?>"><?php echo $listaDepCon->nombre; ?></option>
                          <?php endforeach;
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <br>
                      <button type="submit" class="btn btn-success">Buscar Nuevo <i class="fa fa-check-circle"></i></button>
                    </div>
                    </form>
                  </div>
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
                            <th class="text-center">Responsabilidad</th>

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
                            foreach ($listaContacto as $listaC): ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo ucwords(strtolower($listaC->primerNombre))." ".ucwords(strtolower($listaC->apellidoPaterno))." ".ucwords(strtolower($listaC->apellidoMaterno)); ?></td>
                          <td><?php echo ucwords(strtolower($listaC->nombreResponsabilidad)); ?></td>
                          <td><a href="#ver<?php echo $listaC->idContacto;?>" class="btn btn-danger efec" data-toggle="modal"><i class="fa fa-eye"></i></a></td>
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

?>
