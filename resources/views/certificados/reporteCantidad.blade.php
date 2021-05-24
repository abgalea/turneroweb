@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-4">
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

    <div class="col-4">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$total->count()}}</h3>
  
            <p>ORDENES EN TOTAL</p>
          </div>
          <div class="icon">
            {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
            <i class="fas fa-sort-amount-down"></i>
          </div>
          
        </div>
      </div>
    
    <div class="col-12">
        
        
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">CANTIDAD DE ORDENES POR AFILIADO.</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a>--></h2>
   
          
          <!-- /.card-header -->
            <table id="reporte1" name="reporte1" class="table table-striped table-condensed table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width: 10px">Nro Doc</th>
                  <th>Afiliado</th>
                  <th>Tipo de Orden</th>
                  <th>Cantidad</th>
                  
                  {{-- <th style="width: 40px">Coseguro</th>
                  <th style="width: 40px">Medio Pago</th> --}}
                </tr>
              </thead>
              <tbody>
                
                @foreach ($usuarios as $item)
                <tr>
                  <td>{{$item->nro_doc}}</td>
                  <td>{{$item->nom_beneficiario}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->cantidades}}</td>
                  
                  {{-- <td><span class="badge bg-success">${{$item->precio}}</span></td>
                  <td><span class="badge bg-primary">{{$item->medio_pago->nombre}}</span></td> --}}
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