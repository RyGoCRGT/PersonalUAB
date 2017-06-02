<div id="contenidoAll">

  <div class="row  border-bottom white-bg dashboard-header">

      <div class="col-sm-3">
          <h2>Personal-UAB </h2>
      </div>

  </div>

  <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content forum-post-container">
                <div class="forum-post-info">
                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Registro </span> /<span class="text-muted">Personal</span></h4>
                </div>
                <div class="media">


                    <div class="panel with-nav-tabs panel-info">
                      <div class="panel-heading" style="background:rgb(26, 74, 101)">
                        <ul class="nav nav-tabs" >
                            <li class="active"class="efe"><a style="color:white" href="#General" data-toggle="tab" >Generales</a></li>
                            <li class="efe"><a style="color:white" href="#Personal" data-toggle="tab">Personal-UAB</a></li>
                            <li class="efe"><a style="color:white" href="#Familiares" data-toggle="tab">Familiares</a></li>
                            <li class="efe"><a style="color:white" href="#Otros" data-toggle="tab">Otros</a></li>
                        </ul>
                      </div>
                      <div class="panel-body" style="display: block;">
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="General">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Registro de Personal</h3>
                                  </div>
                                    <form id="frmPersona">

                                      <div class="row">

                                        <div class="col-sm-1 col-md-2"></div>
                                        <div class="col-sm-10 col-md-8">

                                          <div class="form-group">
                                            <label>Primer Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="primerNombre" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Segundo Nombre</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="segundoNombre" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoPaterno" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="apellidoMaterno" type="text" class="form-control" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>CI/NIT</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                              <input id="ciNit" type="text" class="form-control" placeholder="CI/NIT: " aria-describedby="sizing-addon2" name="ciNit" required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Lugar de Expedicion CI/NIT</label>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-address-card"></i></span>
                                              <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion">
                                                <option value="">cargar LugarExpediom</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Fecha de Nacimiento</label>
                                            <div class="input-group" >
                                              <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                              <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" required>
                                            </div>
                                          </div>

                                          <div class="form-group" data-toggle="buttons">
                                            <label class="btn btn-primary"> <i class="fa fa-venus-mars"></i> Sexo: </label>
                                            <label class="btn btn-info btn-outline">
                                                <input type="radio" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
                                            </label>
                                            <label class="btn btn-info btn-outline">
                                                <input type="radio" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
                                            </label>
                                         </div>

                                         <div class="form-group">
                                           <label>Estado Civil</label>
                                           <div class="input-group">
                                             <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                             <select class="selectpicker form-control" style="background-color: #fff" name="estadoCivil" id="estadoCivil">
                                               <option value="">cargar Estado Ci</option>
                                             </select>
                                           </div>
                                         </div>

                                         <input type="hidden" name="datos" value="1">

                                         <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                         <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Limpiar</button>
                                         <button type="submit" name="guardar" class="btn btn-success btn-lg">Siguiente</button>

                                         <br><br>

                                        </div>
                                        <div class="col-sm-1 col-md-2"></div>

                                      </div>

                                    </form>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="Personal">
                                <div class="thumbnail">
                                  <div class="text-center">
                                    <h3>Registro de Personal</h3>
                                  </div>
                                  <form id="frmPersonal">

                                    <div class="row">
                                      <div class="col-sm-1 col-md-2"></div>
                                      <div class="col-sm-10 col-md-8">

                                        <div class="form-group">
                                          <label>Nacionalidad</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                            <select class="selectpicker form-control" name="nacionalidad" id="nacionalidad">
                                              <option value="">cargar Naciones</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Tipo Personal</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="selectpicker form-control" name="tipoPersonal" id="tipoPersonal">
                                              <option value="">cargar Tipo Personal</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Facultad Carrera</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-linode"></i></span>
                                            <select class="selectpicker form-control" name="carrera" id="carrera">
                                              <option value="">cargar Carrera de Facultad</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Direccion</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control" placeholder="Direccion: " aria-describedby="sizing-addon2" id="direccion" name="direccion" required>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Correo Electronico</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" placeholder="E-mail: " aria-describedby="sizing-addon2" id="email" name="email" required>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Ciudad Nacimiento</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-building"></i></span>
                                            <select class="selectpicker form-control" name="ciudad" id="ciudad">
                                              <option value="">cargar Tabla Ciudad</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Religion</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <select class="selectpicker form-control" name="religion" id="religion">
                                              <option value="">cargar Tabla Religion</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Fecha de Bautizmo</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                            <input id="fechaBau" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Bautizmo:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaBau" required>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Seguro</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <select class="selectpicker form-control" name="seguro" id="seguro">
                                              <option value="">cargar Tabla Seguro</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de Seguro</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numSeguro" type="text" class="form-control" placeholder="Numero de Seguro" name="numSeguro">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>AFP</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <select class="selectpicker form-control" name="afp" id="afp">
                                              <option value="">cargar Tabla afp</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de AFP</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numAfp" type="text" class="form-control" placeholder="Numero de AFP" name="numAfp">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de Libreta Militar</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numLibMilitar" type="text" class="form-control" placeholder="Numero de Libreta Familiar" name="numLibMilitar">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Numero de Pasaporte</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input id="numPasaporte" type="text" class="form-control" placeholder="Numero de Pasaporte" name="numPasaporte">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Tipo Sangre</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tumblr-square"></i></span>
                                            <select class="selectpicker form-control" name="tipoSangre" id="tipoSangre">
                                              <option value="">Tipos de sangre</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Hobby</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <input id="hobby" type="text" class="form-control" placeholder="Hobby:" name="hobby">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Lectura Preferencial</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-cube"></i></span>
                                            <textarea name="lecturaP" style="resize:none;" id="lecturaP" class="form-control" placeholder="Lectura Preferencial:" rows="3" cols="100"></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Fecha de Ingreso UAB</label>
                                          <div class="input-group" >
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                            <input id="fechaIngres" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Ingreso UAB:  AAAA/MM/DD" name="fechaIngres" >
                                          </div>
                                        </div>

                                        <input type="hidden" name="datos" value="1">

                                        <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                        <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Limpiar</button>
                                        <button type="submit" name="guardar" class="btn btn-success btn-lg">Siguiente</button>

                                        <br><br>

                                      </div>
                                      <div class="col-sm-1 col-md-2"></div>
                                    </div>

                                  </form>

                                </div>
                              </div>
                              <div class="tab-pane fade" id="Familiares">
                                <div class="thumbnail">

                                  <div class="row">
                                    <div class="col-sm-1 col-md-2"></div>
                                    <div class="col-sm-10 col-md-8">

                                      <form id="frmPersonalConyugue">

                                        <div class="ibox float-e-margins" >
                                          <div class="ibox-title">
                                              <h5>Conyugue</h5>
                                              <div class="ibox-tools">
                                                  <a class="collapse-link">
                                                      <i class="fa fa-chevron-up"></i>
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="ibox-content" style="background: rgba(234, 245, 245, 1);">

                                            <div class="form-group">
                                              <label>Primer Nombre</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="primerNombre" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Segundo Nombre</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="segundoNombre" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Apellido Paterno</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="apellidoPaterno" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Apellido Materno</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="apellidoMaterno" type="text" class="form-control" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>CI/NIT</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="ciNit" type="text" class="form-control" placeholder="CI/NIT: " aria-describedby="sizing-addon2" name="ciNit" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Lugar de Expedicion CI/NIT</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-address-card"></i></span>
                                                <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion">
                                                  <option value="">cargar LugarExpediom</option>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Fecha de Nacimiento</label>
                                              <div class="input-group" >
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" required>
                                              </div>
                                            </div>

                                            <div class="form-group" data-toggle="buttons">
                                              <label class="btn btn-primary"> <i class="fa fa-venus-mars"></i> Sexo: </label>
                                              <label class="btn btn-info btn-outline">
                                                  <input type="radio" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
                                              </label>
                                              <label class="btn btn-info btn-outline">
                                                  <input type="radio" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
                                              </label>
                                           </div>

                                           <div class="form-group">
                                             <label>Estado Civil</label>
                                             <div class="input-group">
                                               <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                               <select class="selectpicker form-control" style="background-color: #fff" name="estadoCivil" id="estadoCivil">
                                                 <option value="">cargar Estado Ci</option>
                                               </select>
                                             </div>
                                           </div>

                                           <input type="hidden" name="datos" value="1">

                                           <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                           <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Limpiar</button>
                                           <button type="submit" name="guardar" class="btn btn-success btn-lg">Guardar</button>

                                          </div>
                                        </div>


                                      </form>

                                      <form id="frmPersonalHijos">

                                        <div class="ibox float-e-margins" >
                                          <div class="ibox-title">
                                              <h5>Hijos</h5>
                                              <div class="ibox-tools">
                                                  <a class="collapse-link">
                                                      <i class="fa fa-chevron-up"></i>
                                                  </a>
                                              </div>

                                          </div>
                                          <div class="ibox-content" style="background: rgba(234, 245, 245, 1);">

                                            <div class="form-group">
                                              <label>Primer Nombre</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="primerNombre" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Segundo Nombre</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="segundoNombre" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Apellido Paterno</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="apellidoPaterno" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Apellido Materno</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="apellidoMaterno" type="text" class="form-control" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>CI/NIT</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="ciNit" type="text" class="form-control" placeholder="CI/NIT: " aria-describedby="sizing-addon2" name="ciNit" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Lugar de Expedicion CI/NIT</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-address-card"></i></span>
                                                <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion">
                                                  <option value="">cargar LugarExpediom</option>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Fecha de Nacimiento</label>
                                              <div class="input-group" >
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" required>
                                              </div>
                                            </div>

                                            <div class="form-group" data-toggle="buttons">
                                              <label class="btn btn-primary"> <i class="fa fa-venus-mars"></i> Sexo: </label>
                                              <label class="btn btn-info btn-outline">
                                                  <input type="radio" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
                                              </label>
                                              <label class="btn btn-info btn-outline">
                                                  <input type="radio" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
                                              </label>
                                           </div>

                                           <div class="form-group">
                                             <label>Estado Civil</label>
                                             <div class="input-group">
                                               <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                               <select class="selectpicker form-control" style="background-color: #fff" name="estadoCivil" id="estadoCivil">
                                                 <option value="">cargar Estado Ci</option>
                                               </select>
                                             </div>
                                           </div>

                                           <input type="hidden" name="datos" value="1">

                                           <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                           <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Limpiar</button>
                                           <button type="submit" name="guardar" class="btn btn-success btn-lg">Guardar</button>
                                           <a href="#NuevoHijo" class="btn btn-primary btn-lg">Nuevo Hijo (a)</a>

                                          </div>
                                        </div>


                                      </form>

                                      <form id="frmPersonalReferencia">

                                        <div class="ibox float-e-margins" >
                                          <div class="ibox-title">
                                              <h5>Referencia en caso de Emergencia</h5>
                                              <div class="ibox-tools">
                                                  <a class="collapse-link">
                                                      <i class="fa fa-chevron-up"></i>
                                                  </a>
                                              </div>

                                          </div>
                                          <div class="ibox-content" style="background: rgba(234, 245, 245, 1);">

                                            <div class="form-group">
                                              <label>Primer Nombre</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="primerNombre" type="text" class="form-control" placeholder="Primer Nombre: " aria-describedby="sizing-addon2" name="primerNombre" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Segundo Nombre</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="segundoNombre" type="text" class="form-control" placeholder="Segundo Nombre: " aria-describedby="sizing-addon2" name="segundoNombre">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Apellido Paterno</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="apellidoPaterno" type="text" class="form-control" placeholder="Apellido Paterno: " aria-describedby="sizing-addon2" name="apellidoPaterno" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Apellido Materno</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="apellidoMaterno" type="text" class="form-control" placeholder="Apellido Materno: " aria-describedby="sizing-addon2" name="apellidoMaterno">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>CI/NIT</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                                <input id="ciNit" type="text" class="form-control" placeholder="CI/NIT: " aria-describedby="sizing-addon2" name="ciNit" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Lugar de Expedicion CI/NIT</label>
                                              <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-address-card"></i></span>
                                                <select class="selectpicker form-control" name="lugarExpedicion" id="lugarExpedicion">
                                                  <option value="">cargar LugarExpediom</option>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label>Fecha de Nacimiento</label>
                                              <div class="input-group" >
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
                                                <input id="fechaNac" type="text" class="form-control datepicker" data-date-format="yyyy/mm/dd" readonly="true" placeholder="Fecha de Nacimiento:  AAAA/MM/DD" aria-describedby="sizing-addon2" name="fechaNac" required>
                                              </div>
                                            </div>

                                            <div class="form-group" data-toggle="buttons">
                                              <label class="btn btn-primary"> <i class="fa fa-venus-mars"></i> Sexo: </label>
                                              <label class="btn btn-info btn-outline">
                                                  <input type="radio" name="sexo" value="F"><i class="fa fa-female">  Femenino</i>
                                              </label>
                                              <label class="btn btn-info btn-outline">
                                                  <input type="radio" name="sexo" value="M"><i class="fa fa-male">  Masculino</i>
                                              </label>
                                           </div>

                                           <div class="form-group">
                                             <label>Estado Civil</label>
                                             <div class="input-group">
                                               <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-handshake-o"></i></span>
                                               <select class="selectpicker form-control" style="background-color: #fff" name="estadoCivil" id="estadoCivil">
                                                 <option value="">cargar Estado Ci</option>
                                               </select>
                                             </div>
                                           </div>

                                           <input type="hidden" name="datos" value="1">

                                           <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                           <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Limpiar</button>
                                           <button type="submit" name="guardar" class="btn btn-success btn-lg">Guardar</button>

                                          </div>
                                        </div>


                                      </form>


                                    </div>
                                    <div class="col-sm-1 col-md-2"></div>
                                  </div>

                                </div>
                              </div>
                              <div class="tab-pane fade" id="Otros">
                                <div class="thumbnail">

                                  <div class="text-center">
                                    <h3>Registro de Personal</h3>
                                  </div>
                                  <form id="frmPersonalOtros">

                                    <div class="row">
                                      <div class="col-sm-1 col-md-2"></div>
                                      <div class="col-sm-10 col-md-8">

                                        <div class="form-group">
                                          <label>Cargos</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-briefcase"></i></span>
                                            <select class="selectpicker form-control" name="cargos" id="cargos">
                                              <option value="">cargar Cargos</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Alergias / Enfermedades</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-medkit"></i></span>
                                            <select class="selectpicker form-control" name="enfermedades" id="enfermedades">
                                              <option value="">cargar Enfermedades</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label>Deportes</label>
                                          <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-star"></i></span>
                                            <select class="selectpicker form-control" name="deportes" id="deportes">
                                              <option value="">cargar Deportes</option>
                                            </select>
                                          </div>
                                        </div>

                                        <input type="hidden" name="datos" value="1">

                                        <button type="button" name="cancelar" class="btn btn-default btn-lg">Cancelar</button>
                                        <button type="reset" name="limpiar" class="btn btn-warning btn-lg">Limpiar</button>
                                        <button type="submit" name="guardar" class="btn btn-success btn-lg">Siguiente</button>

                                        <br><br>

                                      </div>
                                      <div class="col-sm-1 col-md-2">

                                      </div>
                                    </div>

                                  </form>
                                  <div class="text-center">
                                    <a href="#Listo" class="btn btn-primary btn-lg">LISTO</a>
                                  </div>

                                </div>
                              </div>
                          </div>
                      </div>
                  </div>


                </div>

            </div>
        </div>
    </div>
</div>

</div>
