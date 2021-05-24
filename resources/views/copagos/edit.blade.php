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
          <h3 class="card-title">VALORES DE COSEGUROS </h3>
        </div>
        
        <form action="{{ route('copagos.update', $copago->id)}}" method="POST">
          <div class="card-body">
            @method('PATCH')
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">COPAGO</label>
              <input type="text" class="form-control" name="copago" value="{{$copago->copago}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">precio</label>
              <input type="number" class="form-control" name="precio" value="{{$copago->precio}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">vencimiento</label>
              <input type="date" class="form-control" name="vencimiento" value="{{$copago->vencimiento}}">
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