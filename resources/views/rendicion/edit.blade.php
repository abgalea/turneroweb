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
          <h3 class="card-title">EDITAR VALORES DE RENDICION </h3>
        </div>
        
        
        <form action="{{ route('rendicion.update', $rendicion->id)}}" method="POST">
          <div class="card-body">
            @method('PATCH')
            @csrf
            {{-- <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">USUARIO</label>
              <select required class="form-control" name="users_id" id="ddlViewBy" >
                <option value="">Seleccionar una Opción</option>
                @foreach ($usuarios as $usuario)
                  @if ($usuario->id == $rendicion->users_id)
                  <option selected value='{{$usuario->id}}'>{{$usuario->name}} | {{$usuario->localidad}}</option>    
                  @endif
                  <option value='{{$usuario->id}}'>{{$usuario->name}} | {{$usuario->localidad}}</option>
                @endforeach
            
              </select>
            </div> --}}
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Usuario</label>
              <input type="text" class="form-control" disabled value="{{ auth()->user()->name }}"  aria-describedby="emailHelp">
              <input type="hidden" class="form-control" name="users_id" value="{{ auth()->user()->id }}"  aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">MONTO</label>
              <input type="number" class="form-control" name="monto" value="{{$rendicion->monto}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">FECHA</label>
              <input type="date" class="form-control" name="fecha" value="{{$rendicion->fecha}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">DETALLE</label>
              <textarea class="form-control" name="detalle" aria-describedby="emailHelp">{{$rendicion->detalle}}</textarea>
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