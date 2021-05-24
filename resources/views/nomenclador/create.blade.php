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
    @if (\Session::has('success'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif  
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header bg-gradient-primary">
          <h3 class="card-title">AGREGAR NUEVAS PRÁCTICAS </h3>
        </div>
        
        <form method="POST" action="/practicas">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">CODIGO</label>
              <input type="text" class="form-control" name="codigo" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">GRUPO</label>
              <input type="text" class="form-control" name="grupo" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">PRACTICA</label>
              <input type="text" class="form-control" name="practica" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">PRECIO</label>
              <input type="number" value="0" class="form-control" name="precio" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">OBSERVACIÓN</label>
              <input type="text" class="form-control" name="obs" aria-describedby="emailHelp">
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