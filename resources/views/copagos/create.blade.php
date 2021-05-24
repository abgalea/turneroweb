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
          <h3 class="card-title">Agregar Valores Copago Nuevo </h3>
        </div>
        
        <form method="POST" action="/copagos">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Copago</label>
              <input type="text" class="form-control" name="copago" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Precio</label>
              <input type="number" class="form-control" name="precio" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Vencimiento</label>
              <input type="date" class="form-control" name="vencimiento" aria-describedby="emailHelp">
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