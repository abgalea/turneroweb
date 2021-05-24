@extends('layouts.app')

@section('content')
<style>
  button.mercadopago-button {
  background-color: #007bff;
  color: #fff;
}
</style>
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header bg-gradient-success">
          <h3 class="card-title">Convenio Médico con Grupo Meld Salud </h3>
        </div>
        
        <form action="{{ route('convenios.update', $convenio->id)}}" method="POST">
          <div class="card-body">
            @method('PATCH')
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Localidad</label>
              <select class="form-control" name="localidad" >
                <option selected value="{{$convenio->localidad}}" >{{$convenio->localidad}}</option>
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
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Prestadora</label>
              <input type="text" class="form-control" name="prestadora" value="{{$convenio->prestadora}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Inicio Convenio</label>
              <input type="date" class="form-control" name="desde" value="{{$convenio->desde}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Plazo en días</label>
              <input type="number" class="form-control" name="plazo" value="{{$convenio->plazo}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">CUIT</label>
              <input type="number" class="form-control" name="cuit" value="{{$convenio->cuit}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">CBU</label>
              <input type="number" class="form-control" name="cbu" value="{{$convenio->cbu}}">
            </div>
            
            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <button type="submit" class="btn btn-primary">EDITAR</button>
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