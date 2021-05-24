@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="/certificados" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nro Orden</label>
                    <input type="text" class="form-control" name="orden" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nro Certificado</label>
                  <input type="text" class="form-control" name="nro_certificado" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Fecha de Emisión</label>
                  <input type="date" class="form-control" name="fecha" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Válido desde</label>
                  <input type="date" class="form-control" name="desde" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Válido Hasta</label>
                    <input type="date" class="form-control" name="hasta" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre Titular</label>
                  <input type="text" class="form-control" name="nombre_comerciante" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del Comercio</label>
                  <input type="text" class="form-control" name="nombre_comercio" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rubro</label>
                    <input type="text" class="form-control" name="rubro" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Dirección</label>
                  <input type="text" class="form-control" name="direccion" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Detalle - Observaciones</label>
                  <input type="text" class="form-control" name="observaciones" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Previa</label>
                  <input type="text" class="form-control" name="previa" value="0" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Localidad</label>
                  <select class="form-control" name="localidad" >
                    <option selected disabled>SELECCIONAR UNA OPCIÓN</option>
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
                <div class="form-group">
                  <label for="exampleInputPassword1">Usuario</label>
                  <input type="text" value="{{ auth()->user()->name }}" class="form-control" disabled>
                  <input type="hidden" class="form-control" value="{{ auth()->user()->username }}" name="usuario">
                  <input type="hidden" class="form-control" value="{{ auth()->user()->dependencia }}" name="dependencia">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
              </form>
        </div>
    </div>
</div>
    
@endsection