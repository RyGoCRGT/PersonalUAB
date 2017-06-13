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
                    <a href="#RegistroContacto" data-toggle="modal" class="clickable filter btn btn-success">Añadir Contacto <i class="fa fa-plus" data-toggle="tooltip" title="Añadir nuevo Contacto"></i></a>
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

                          <tr>
                            <td>1</td>
                            <td>Rodrigo Poma Mollo</td>
                            <td><a href="#ver" class="btn btn-danger efec" data-toggle="modal"><i class="fa fa-eye"></i></a></td>
                            <td><a href="#editar" class="btn btn-primary efec" data-toggle="modal"><i class="fa fa-pencil"></i></a></td>
                            <!-- <td>
                              <form  id="dardeBajaProd">
                                <input type="hidden" name="id" value="">
                                <button type="submit" name="dabaja" class="btn btn-success efec"><i class="fa fa-toggle-on"></i></button>
                              </form>
                            </td> -->
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Luis Poma Mollo</td>
                            <td><a href="#ver" class="btn btn-danger efec" data-toggle="modal"><i class="fa fa-eye"></i></a></td>
                            <td><a href="#editar" class="btn btn-primary efec" data-toggle="modal"><i class="fa fa-pencil"></i></a></td>
                            <!-- <td>
                              <form  id="dardeBajaProd">
                                <input type="hidden" name="id" value="">
                                <button type="submit" name="dabaja" class="btn btn-success efec"><i class="fa fa-toggle-on"></i></button>
                              </form>
                            </td> -->
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Pedro Poma Mollo</td>
                            <td><a href="#ver" class="btn btn-danger efec" data-toggle="modal"><i class="fa fa-eye"></i></a></td>
                            <td><a href="#editar" class="btn btn-primary efec" data-toggle="modal"><i class="fa fa-pencil"></i></a></td>
                            <!-- <td>
                              <form  id="dardeBajaProd">
                                <input type="hidden" name="id" value="">
                                <button type="submit" name="dabaja" class="btn btn-success efec"><i class="fa fa-toggle-on"></i></button>
                              </form>
                            </td> -->
                          </tr>

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
  include '../modalForm/verContacto.php';
?>
