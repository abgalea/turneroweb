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
                    <input type="date" name="desde"  id="disabledTextInput" value="{{$desde}}" class="form-control" placeholder="Fecha Desde">
                  </div>
                  
                  <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Fecha Hasta</label>
                    <input type="date" name="hasta"  id="disabledTextInput" value="{{$hasta}}" class="form-control" placeholder="Fecha Hasta">
                  </div>

                  
                  
                  <button type="submit" class="btn btn-primary">Buscar</button>
                </fieldset>
              </form>
        </div>
      </div>
        </div>
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">Montos que deben rendir los vendedores desde: {{$desde}} hasta {{$hasta}}</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a>--></h2>
   
          
          <!-- /.card-header -->
          <table id="reporte1" name="reporte1" class="table table-striped table-condensed table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Usuario</th>
                  <th>Localidad</th>
                  <th style="width: 150px">Total</th>
                  <th style="width: 150px">Egreso</th>
                  <th style="width: 150px">Rendido</th>
                  <th style="width: 150px">Efectivo</th>
                  <th style="width: 150px">MP</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($usuarios as $item)
                <tr>
                  <td>{{$item->users_id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->localidad}}</td>
                  <td><span class="badge bg-success">${{$item->monto}}</span></td>
                  
                  <td>
                    @foreach ($egreso as $salida)
                        @php
                         if ($salida->usuario == $item->users_id) {
                           echo '$ '.$salida->egreso;
                         }   
                        @endphp
                    @endforeach
                  </td>

                  <td>
                    @foreach ($rendido as $enviado)
                        @php
                         if ($enviado->usuario == $item->users_id) {
                           echo '$ '.$enviado->rendido;
                         }   
                        @endphp
                    @endforeach
                  </td>

                  <td>
                    @foreach ($efectivo as $eft)
                        @php
                         if ($eft->users_id == $item->users_id) {
                          echo '$ '. $eft->monto;
                         }   
                        @endphp
                    @endforeach
                  </td>
                  <td>
                    @foreach ($electronico as $ele)
                        @php
                         if ($ele->users_id == $item->users_id) {
                          echo '$ '. $ele->monto;
                         }   
                        @endphp
                    @endforeach
                  </td>
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