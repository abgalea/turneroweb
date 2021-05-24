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
          <h3 class="card-title">ANULAR ORDEN {{$orden->id}} </h3>
        </div>
        
        <form action="{{ route('certificados.update', $orden->id)}}" method="POST">
          <div class="card-body">
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">AFILIADO DNI</label>
                <div class="col-sm-8">
                    <input type="text" disabled class="form-control" value="{{$afiliado->nro_doc}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">ORDEN N°</label>
                <div class="col-sm-8">
                    <input type="text" disabled class="form-control" value="{{$orden->id}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">EMISIÓN</label>
                <div class="col-sm-8">
                    <input type="text" disabled class="form-control" value="{{date('d/m/Y', strtotime($orden->fecha))}}">
                </div>
            </div>
            
                
            <hr>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">ANULAR</label>
              <select name="anular" required class="form-control">
                  <option disabled selected>Seleccionar Opción</option>
                  <option value="1">SI</option>
                  <option value="">NO</option>
              </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">MOTIVO ANULACIÓN</label>
                <textarea name="motivo" class="form-control" placeholder="Motivo de la anulación de orden" required></textarea>
                <input type="hidden" name="tipo_edicion" value="1">
            </div>
            
            
            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <button type="submit" class="btn btn-primary">ANULAR</button>
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