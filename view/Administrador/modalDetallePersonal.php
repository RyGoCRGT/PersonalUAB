<div class="thumbnail">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4">
      <center><img src="../libs/multimedia/img/design/uab.png" alt="uab-logo" width="80" height="80" class="img img-responsive img-rounded"></center>
      <div class="text-center">
        <h5>UNIVERSIDAD</h5>
        <h3>ADVENTISTA</h3>
        <h5>DE BOLIVIA</h5>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="text-center">
        <h4>UNIVERSIDAD ADVENTISTA DE BOLIVIA</h4>
        <br>
        <h4>GESTION DEL TALENTO HUMANO</h4>
        <br><br>
        <h1><strong>FICHA PERSONAL</strong></h1>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
      <?php if ($personal->Ruta): ?>
        <?php
          list($nada,$ruta) = explode("/wamp64/www/PersonalUAB/view/", $personal->Ruta);
        ?>
        <center><img src="‪<?php echo "../../../".$ruta ?>" alt="persona" class="img img-responsive img-rounded" width="110" height="110"></center>
      <?php endif; ?>      
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="table-responsive">
        <table class="table table-hover">
          <tbody>
            <div><strong>DATOS GENERALES</strong></div><br>
            <tr>
              <td> <strong>Apellidos y Nombres: </strong> <?php echo " {$personal->IdPersona->ApellidoPaterno} {$personal->IdPersona->ApellidoMaterno} {$personal->IdPersona->PrimerNombre} {$personal->IdPersona->SegundoNombre}" ?></td>
              <td></td>
            </tr>
            <tr>
              <td> <strong>Fecha de Nacimiento: </strong> <?php echo " {$personal->IdPersona->FechaNacimiento}" ?></td>
              <td> <strong>Lugar de Nacimiento: </strong> <?php echo $personal->IdCiudadNacimiento; ?> </td>
            </tr>
            <tr>
              <td><strong>Nacionalidad: </strong><?php echo $personal->IdNacion; ?></td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Carnet de Identidad: </strong><?php echo " {$personal->IdPersona->CI} {$personal->IdPersona->LugarExpedicion}" ?></td>
              <td><strong>Pasaporte o C.E.: </strong><?php echo $personal->NumeroPasaporte ?></td>
            </tr>
            <tr>
              <td><strong>Religion: </strong><?php echo $personal->IdReligion ?></td>
              <td><strong>Fecha de Bautizmo: </strong><?php echo $personal->FechaBautizmo ?></td>
            </tr>
            <tr>
              <td><strong>Direccion Actual: </strong><?php echo $personal->Direccion ?></td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Telefonos: </strong>
                <?php
                  foreach ($personal->IdPersona->getListaTelefonos() as $telefono)
                  {
                    echo "{$telefono} " ;
                  }
                ?>
              </td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Email: </strong><?php echo $personal->Email ?></td>
              <td></td>
            </tr>
            <?php if ($personal->IdCargo == null): ?>
              <tr>
                <td><strong>Carrera: </strong><?php echo $personal->IdCarrera ?></td>
                <td></td>
              </tr>
            <?php else: ?>
              <tr>
                <td><strong>Cargo: </strong><?php echo $personal->IdCargo ?></td>
                <td></td>
              </tr>
            <?php endif; ?>
            <tr>
              <td><strong>Nombres y Apellidos del Conyugue: </strong><?php echo "{$personal->C_Conyugue->IdPersona->PrimerNombre} {$personal->C_Conyugue->IdPersona->SegundoNombre} {$personal->C_Conyugue->IdPersona->ApellidoPaterno} {$personal->C_Conyugue->IdPersona->ApellidoMaterno} " ?></td>
              <td><strong>Fecha de Nacimiento: </strong><?php echo $personal->C_Conyugue->IdPersona->FechaNacimiento ?></td>
            </tr>
            <tr>
              <td><strong>Fecha de Matrimonio: </strong><?php echo $personal->C_Conyugue->FechaMatrimonio ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $i = 1; ?>
  <div class="row">
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
    <div class="col-xs-10 col-sm-10 col-md-8">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre Completo</th>
              <th>Fecha de Nacimiento</th>
            </tr>
          </thead>
          <tbody>
            <div class="text-center"><strong>HIJOS</strong></div><br>
            <?php foreach ($personal->C_HijosLista as $hijo): ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo "{$hijo->IdPersona->PrimerNombre} {$hijo->IdPersona->SegundoNombre} {$hijo->IdPersona->ApellidoPaterno} {$hijo->IdPersona->ApellidoMaterno} " ?></td>
                <td><?php echo $hijo->IdPersona->FechaNacimiento ?></td>
              </tr>
            <?php $i++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
  </div>
<?php $i = 1; ?>
  <div class="row">
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
    <div class="col-xs-10 col-sm-10 col-md-8">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Cargo</th>
            </tr>
          </thead>
          <tbody>
            <div class="text-center"><strong>CARGOS</strong></div><br>
            <?php foreach ($personal->ListaCargos as $cargo): ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $cargo->NombreCargo ?></td>
              </tr>
            <?php $i++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
  </div>
<?php $i = 1; ?>
  <div class="row">
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
    <div class="col-xs-10 col-sm-10 col-md-8">
      <div class="table-responsive">
        <table class="table table-hover table-center">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre Curso</th>
              <th>Institucion</th>
              <th>Religion Institucion</th>
              <th>Año de Estudio</th>
            </tr>
          </thead>
          <tbody>
            <div class="text-center"><strong>CURSOS ESTUDIADOS</strong></div><br>
            <?php foreach ($personal->ListaCursos as $cursos): ?>
              <tr>
                <td><?php echo $i ?></td>
                <td class="text-center"><?php echo $cursos->CursoEstudiado ?></td>
                <td class="text-center"><?php echo $cursos->NombreInstitucion ?></td>
                <td class="text-center"><?php echo $cursos->ReligionInstitucion ?></td>
                <td class="text-center"><?php echo $cursos->AnhoEstudio ?></td>
              </tr>
            <?php $i++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
  </div>
<?php $i = 1; ?>
  <div class="row">
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
    <div class="col-xs-10 col-sm-10 col-md-8">
      <div class="table-responsive">
        <table class="table table-hover table-center">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre Titulo</th>
              <th>Institucion</th>
              <th>Religion Institucion</th>
              <th>Tiempo de Estudio(Años)</th>
            </tr>
          </thead>
          <tbody>
            <div class="text-center"><strong>TITULOS QUE POSEE</strong></div><br>
            <?php foreach ($personal->ListaTitulos as $titulos): ?>
              <tr>
                <td><?php echo $i ?></td>
                <td class="text-center"><?php echo $titulos->CursoProfesionalEstudiado ?></td>
                <td class="text-center"><?php echo $titulos->NombreInstitucion ?></td>
                <td class="text-center"><?php echo $titulos->ReligionInstitucion ?></td>
                <td class="text-center"><?php echo $titulos->TiempoEstudio ?></td>
              </tr>
            <?php $i++; endforeach; ?>
          </tbody>
        </table>
        <div class="text-left">
          <p><strong>Numero de Registro Profesional: </strong><?php echo $personal->NumeroRegistroProfesional ?></p>
        </div>
      </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"></div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="table-responsive">
        <table class="table table-hover">
          <tbody>
            <div><strong>OTROS DATOS</strong></div><br>
            <tr>
              <td><strong>Deportes que practica: </strong>
                <?php
                  foreach ($personal->ListaDeportes as $deporte)
                  {
                    echo "<br /> - {$deporte->NombreDeporte} " ;
                  }
                ?>
              </td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Lectura de Preferencia: </strong><?php echo $personal->LecturaPreferencial ?></td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Hobby: </strong><?php echo $personal->Hobby ?></td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Enfermedades y/o Alergias</strong>
                <?php
                  foreach ($personal->ListaEnfermedades as $enfermedad)
                  {
                    echo "<br /> - {$enfermedad->NombreEnfermedad} " ;
                  }
                ?>
              </td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Tipo de Sangre: </strong><?php echo $personal->TipoSangre ?></td>
              <td></td>
            </tr>
            <tr>
                <td><strong>En caso de Emregencia Llamar a: </strong><?php echo "{$personal->C_Referencia->IdPersona->PrimerNombre} {$personal->C_Referencia->IdPersona->SegundoNombre} {$personal->C_Referencia->IdPersona->ApellidoPaterno} {$personal->C_Referencia->IdPersona->ApellidoMaterno}" ?></td>
                <td><strong>Numero(s): </strong>
                  <?php foreach ($personal->C_Referencia->IdPersona->getListaTelefonos() as $key => $telefono): ?>
                    <?php echo " {$telefono} " ?>
                  <?php endforeach; ?>
                </td>
            </tr>
            <tr>
              <td><strong>Fecha de Llenado del Formulario: </strong><?php $hoy = getdate(); echo "{$hoy['mday']}-{$hoy['mon']}-{$hoy['year']}";; ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br><br><br>
  <div class="text-center">
    <p>__________________________________</p>
    <p>FIRMA</p>
  </div>
</div>
