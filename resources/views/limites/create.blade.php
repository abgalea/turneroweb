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
          <h3 class="card-title">Agregar Valores de limites </h3>
        </div>
        
        <form method="POST" action="/limites">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Cantidad</label>
              <input type="number" class="form-control" name="cantidad" aria-describedby="emailHelp">
            </div>
            
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