@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
   
    <div class="col-lg-12">
        <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
            <form>
                <fieldset>
                  <legend>Buscar por Fecha</legend>
                  <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Fecha Desde</label>
                    <input type="date" name="desde" value="{{$desde}}" id="disabledTextInput" class="form-control" placeholder="Fecha Desde">
                  </div>
                  
                  <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Fecha Hasta</label>
                    <input type="date" name="hasta" value="{{$hasta}}" id="disabledTextInput" class="form-control" placeholder="Fecha Hasta">
                  </div>

                  {{-- <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Por Usuarios</label>
                    <select class="form-control" name="usuario">
                        <option value="">Seleccionar una Opción</option>
                      @foreach ($usuarios as $usuario)
                        <option value='{{$usuario->id}}'>{{$usuario->name}}</option>
                      @endforeach
                    
                    </select>
                  </div> --}}
                  
                  <button type="submit" class="btn btn-primary">Buscar</button>
                  
                </fieldset>
              </form>
        </div>
      </div>
        </div>
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">Ordenes generadas por usuarios en el mes en curso</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a>--></h2>
   
          
          <!-- /.card-header -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Fecha</th>
                  <th>Usuario</th>
                  <th>Localidad</th>
                  <th>Copago</th>
                  <th style="width: 40px">Coseguro</th>
                  <th style="width: 40px">Medio Pago</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($usuarios as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->fecha}}</td>
                  <td>{{$item->usuarios->name}}</td>
                  <td>{{$item->usuarios->localidad}}</td>
                  <td>{{$item->copago->copago}}</td>
                  <td><span class="badge bg-success">${{$item->copago->precio}}</span></td>
                  <td><span class="badge bg-primary">{{$item->medio_pago->nombre}}</span></td>
                </tr> 
                @endforeach
                
                
              </tbody>
            </table>
          
        <!-- /.card -->

        
      
    <div class="row">
        <div class="mx-auto">
          {{-- {{ $total_orde_porUsuario->links() }} --}}
        </div>
      </div>
      <script type="text/javascript">
        (function() {
          var form = document.getElementById('miFormulario');
          form.addEventListener('submit', function(event) {
            // si es false entonces que no haga el submit
            if (!confirm('Realmente desea eliminar?')) {
              event.preventDefault();
            }
          }, false);
        })();
      </script>
</div>
</div>
</div>
</div>
</div>    
@endsection