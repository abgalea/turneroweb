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
          <h3 class="card-title">AGREGAR UNA NUEVA SALIDA </h3>
        </div>
        
        <form method="POST" action="/egresos">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Fecha</label>
              <input type="date" class="form-control" name="fecha" value="{{date('Y-m-d')}}" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tipo Movimiento</label>
              <select required class="form-control" name="tipo_mov_id" id="tipo_mov_id">
                <option value="">Seleccionar una Opción</option>
              @foreach ($tipo_movi as $tipo_mov)
              <option value='{{$tipo_mov->id}}'>{{$tipo_mov->nombre}}</option>
              @endforeach
            
            </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tipo Comprobante</label>
              <select required class="form-control" name="tipo_comprobante_id" id="tipo_mov_id">
                <option value="">Seleccionar una Opción</option>
              @foreach ($tipo_comp as $tipo_com)
              <option value='{{$tipo_com->id}}'>{{$tipo_com->nombre}}</option>
              @endforeach
            
            </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">N° Comprobante</label>
              <input type="text"  class="form-control" name="num_comprobante" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Concepto</label>
              <input type="text" class="form-control" name="concepto" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Monto</label>
              <input type="text" class="form-control" name="monto" onkeypress="return filterFloat(event,this);">
              
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Autorizado por?</label>
              <input type="text" class="form-control" name="autorizado" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Usuario</label>
              <input type="text" class="form-control" disabled value="{{ auth()->user()->name }}"  aria-describedby="emailHelp">
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
  <script type="text/javascript">
    <!--
    function filterFloat(evt,input){
        // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
        var key = window.Event ? evt.which : evt.keyCode;    
        var chark = String.fromCharCode(key);
        var tempValue = input.value+chark;
        if(key >= 48 && key <= 57){
            if(filter(tempValue)=== false){
                return false;
            }else{       
                return true;
            }
        }else{
              if(key == 8 || key == 13 || key == 0 || key == 45) {     
                  return true;              
              }else if(key == 46){
                    if(filter(tempValue)=== false){
                        return false;
                    }else{       
                        return true;
                    }
              }else{
                  return false;
              }
        }
    }
    function filter(__val__){
        var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
        if(preg.test(__val__) === true){
            return true;
        }else{
           return false;
        }
        
    }
    -->
    </script>
@endsection