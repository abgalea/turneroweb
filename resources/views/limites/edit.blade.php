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
          <h3 class="card-title">VALORES DE LIMITES </h3>
        </div>
        
        <form action="{{ route('limites.update', $copago->id)}}" method="POST">
          <div class="card-body">
            @method('PATCH')
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">NOMBRE</label>
              <input type="text" class="form-control" name="nombre" value="{{$copago->nombre}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">LIMITE</label>
              <input type="number" class="form-control" name="cantidad" value="{{$copago->cantidad}}">
            </div>
           
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