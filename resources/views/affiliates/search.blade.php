@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-9">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header bg-gradient-danger">
          <h3 class="card-title">Nuevo Certificado</h3>
        </div>
            <form action="/certificados" method="POST">
              <div class="card-body">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Orden</label>
                    <div class="col-sm-8">
                    <input required type="text" class="form-control" name="orden" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nro Certificado</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" placeholder="Nro del Certificado" name="nro_certificado" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Fecha de Emisión</label>
                  <div class="col-sm-8">
                  <input required type="date" class="form-control" name="fecha" value="<?php echo  date('Y-m-d') ?>" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Válido desde</label>
                  <div class="col-sm-8">
                  <input required type="date" class="form-control" name="desde" value="<?php echo  date('Y-m-d') ?>" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Válido Hasta</label>
                    <div class="col-sm-8">
                    <input required type="date" class="form-control" name="hasta" value="<?php echo  date('Y-m-d', strtotime('+1 year')); ?>" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nombre Titular</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="nombre_comerciante" placeholder="Titular del Comercio" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nombre del Comercio</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="nombre_comercio" placeholder="Nombre del Comercio" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Rubro</label>
                    <div class="col-sm-8">
                    <input required type="text" class="form-control" name="rubro" placeholder="Rubro Comercial o Actividad" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Dirección</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="direccion" placeholder="Dirección del Comercio" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Detalle - Observaciones</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="observaciones" placeholder="Algun detalle para aclarar" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Previa</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="previa" value="0" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Localidad</label>
                  <div class="col-sm-8">
                  <select required class="form-control" name="localidad" >
                  <option selected value="{{Auth::user()->localidad}}" >Localidad: {{Auth::user()->localidad}}</option>
                    <option value='25 de Mayo'>25 de Mayo</option>
                    <option value='9 de Julio'>9 de Julio</option>
                    <option value='Alba Posse'>Alba Posse</option>
                    <option value='Almafuerte'>Almafuerte</option>
                    <option value='Ameghino'>Ameghino</option>
                    <option value='Apostoles'>Apostoles</option>
                    <option value='Aristobulo del Valle'>Aristobulo del Valle</option>
                    <option value='Arroyo del Medio'>Arroyo del Medio</option>
                    <option value='Azara'>Azara</option>
                    <option value='Bernardo de Irigoyen'>Bernardo de Irigoyen</option>
                    <option value='Bompland'>Bompland</option>
                    <option value='Caa Yari'>Caa Yari</option>
                    <option value='Campo Grande'>Campo Grande</option>
                    <option value='Campo Ramon'>Campo Ramon</option>
                    <option value='Campo Viera'>Campo Viera</option>
                    <option value='Candelaria'>Candelaria</option>
                    <option value='Capiovi'>Capiovi</option>
                    <option value='Caraguatay'>Caraguatay</option>
                    <option value='Cerro Azul'>Cerro Azul</option>
                    <option value='Cerro Cora'>Cerro Cora</option>
                    <option value='Colonia Alberdi'>Colonia Alberdi</option>
                    <option value='Colonia Aurora'>Colonia Aurora</option>
                    <option value='Colonia Delicia'>Colonia Delicia</option>
                    <option value='Colonia Polana'>Colonia Polana</option>
                    <option value='Colonia Victoria'>Colonia Victoria</option>
                    <option value='Colonia Wanda'>Colonia Wanda</option>
                    <option value='Comandante Andresito'>Comandante Andresito</option>
                    <option value='Concepcion de la Sierra'>Concepcion de la Sierra</option>
                    <option value='Corpus'>Corpus</option>
                    <option value='Dos Arroyos'>Dos Arroyos</option>
                    <option value='Dos de Mayo'>Dos de Mayo</option>
                    <option value='El Alcazar'>El Alcazar</option>
                    <option value='El Soberbio'>El Soberbio</option>
                    <option value='Eldorado'>Eldorado</option>
                    <option value='Fachinal'>Fachinal</option>
                    <option value='Garuhape'>Garuhape</option>
                    <option value='Garupa'>Garupa</option>
                    <option value='General Alvear'>General Alvear</option>
                    <option value='General Urquiza'>General Urquiza</option>
                    <option value='Gobernador Lopez'>Gobernador Lopez</option>
                    <option value='Gobernador Roca'>Gobernador Roca</option>
                    <option value='Guarani'>Guarani</option>
                    <option value='Hipolito Irigoyen'>Hipolito Irigoyen</option>
                    <option value='Itacaruare'>Itacaruare</option>
                    <option value='Jardin America'>Jardin America</option>
                    <option value='Leandro N. Alem'>Leandro N. Alem</option>
                    <option value='Loreto'>Loreto</option>
                    <option value='Los Helechos'>Los Helechos</option>
                    <option value='Martires'>Martires</option>
                    <option value='Mojon Grande'>Mojon Grande</option>
                    <option value='Montecarlo'>Montecarlo</option>
                    <option value='Obera'>Obera</option>
                    <option value='Olegario V. Andrade'>Olegario V. Andrade</option>
                    <option value='Panambi'>Panambi</option>
                    <option value='Posadas'>Posadas</option>
                    <option value='Pozo Azul'>Pozo Azul</option>
                    <option value='Profundidad'>Profundidad</option>
                    <option value='Puerto Esperanza'>Puerto Esperanza</option>
                    <option value='Puerto Iguazu'>Puerto Iguazu</option>
                    <option value='Puerto Leoni'>Puerto Leoni</option>
                    <option value='Puerto Libertad'>Puerto Libertad</option>
                    <option value='Puerto Piray'>Puerto Piray</option>
                    <option value='Puerto Rico'>Puerto Rico</option>
                    <option value='Ruiz de Montoya'>Ruiz de Montoya</option>
                    <option value='San Antonio'>San Antonio</option>
                    <option value='San Ignacio'>San Ignacio</option>
                    <option value='San Javier'>San Javier</option>
                    <option value='San Jose'>San Jose</option>
                    <option value='San Martin'>San Martin</option>
                    <option value='San Pedro'>San Pedro</option>
                    <option value='San Vicente'>San Vicente</option>
                    <option value='Santa Ana'>Santa Ana</option>
                    <option value='Santa Maria'>Santa Maria</option>
                    <option value='Santiago de Liniers'>Santiago de Liniers</option>
                    <option value='Santo Pipo'>Santo Pipo</option>
                    <option value='Tres Capones'>Tres Capones</option>
                  </select>
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label bg-gradient-danger">Teléfono Contacto</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="telefono_contacto" placeholder="Nro de Teléfono celular" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label bg-gradient-danger">Correo Electrónico</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="correo_contacto" placeholder="Correo Electrónico para contacto" aria-describedby="emailHelp">
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Usuario</label>
                  <div class="col-sm-8">
                    <input type="text" value="{{ auth()->user()->name }}" class="form-control" disabled>
                  
                    <input type="hidden" class="form-control" value="{{ auth()->user()->username }}" name="usuario">
                    <input type="hidden" class="form-control" value="{{ auth()->user()->dependencia }}" name="dependencia">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Generar Certificado</button>
              </div>
            </form>
          </div>
          
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
    
@endsection