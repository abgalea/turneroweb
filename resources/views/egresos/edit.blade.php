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
          <h3 class="card-title">Editar Egreso </h3>
        </div>
        
        
          <form action="{{ route('egresos.update', $egreso->id)}}" method="POST">
          <div class="card-body">
            @method('PATCH')
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Fecha</label>
              <input type="date" class="form-control" name="fecha" value="{{$egreso->fecha}}" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tipo Movimiento</label>
              <select required class="form-control" name="tipo_mov_id" id="tipo_mov_id">
                <option value="">Seleccionar una Opción</option>
              @foreach ($tipo_movi as $tipo_mov)
                @if ($egreso->tipo_mov_id == $tipo_mov->id)
                  <option selected value='{{$tipo_mov->id}}'>{{$tipo_mov->nombre}}</option>
                @endif
              <option value='{{$tipo_mov->id}}'>{{$tipo_mov->nombre}}</option>
              @endforeach
            
            </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tipo Comprobante</label>
              <select required class="form-control" name="tipo_comprobante_id" id="tipo_mov_id">
                <option value="">Seleccionar una Opción</option>
              @foreach ($tipo_comp as $tipo_com)
                @if ($egreso->tipo_comprobante_id == $tipo_com->id)
                  <option selected value='{{$tipo_com->id}}'>{{$tipo_com->nombre}}</option>
                @endif
              <option value='{{$tipo_com->id}}'>{{$tipo_com->nombre}}</option>
              @endforeach
            
            </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">N° Comprobante</label>
              <input type="text" onkeypress="return filterFloat(event,this);" class="form-control" value="{{$egreso->num_comprobante}}" name="num_comprobante" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Concepto</label>
              <input type="text" class="form-control" name="concepto" aria-describedby="emailHelp" value="{{$egreso->concepto}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Monto</label>
              <input type="text" class="form-control" name="monto" onkeypress="return filterFloat(event,this);" value="{{$egreso->monto}}">
              
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Autorizado por?</label>
              <input type="text" class="form-control" name="autorizado" aria-describedby="emailHelp" value="{{$egreso->autorizado}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Usuario</label>
              <input type="text" class="form-control" disabled value="{{ auth()->user()->name }}"  aria-describedby="emailHelp">
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