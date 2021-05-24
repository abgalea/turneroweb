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
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title">Convenio Médico con Grupo Meld Salud </h3>
        </div>
        
        <form method="POST" action="/convenios">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Localidad</label>
              <input type="text" class="form-control" name="localidad" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Prestadora</label>
              <input type="text" class="form-control" name="prestadora" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Inicio Convenio</label>
              <input type="date" class="form-control" name="desde" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Plazo en días</label>
              <input type="number" class="form-control" name="plazo" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">CUIT</label>
              <input type="number" class="form-control" name="cuit" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">CBU</label>
              <input type="text" class="form-control" name="cbu" aria-describedby="emailHelp">
            </div>
            
            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <button type="submit" class="btn btn-primary">AGREGAR</button>
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