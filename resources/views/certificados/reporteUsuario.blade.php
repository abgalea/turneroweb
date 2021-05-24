@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-3">
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
    <div class="col-3">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>$ {{$monto}} EFT <br>
            $ {{$electronico}} MP
          </h3>

          <p>Monto recaudado entre las fechas {{date('d/m', strtotime($desde))}} y {{date('d/m', strtotime($hasta))}}</p>
        </div>
        <div class="icon">
          {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
          <i class="fas fa-file-invoice-dollar"></i>
        </div>
        
      </div>
    </div>
    <div class="col-3">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>$ {{$gastado}}</h3>

          <p>Egresos entre las fechas {{date('d/m', strtotime($desde))}} y {{date('d/m', strtotime($hasta))}}</p>
        </div>
        <div class="icon">
          {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
          <i class="fas fa-file-invoice-dollar"></i>
        </div>
        
      </div>
    </div>
    <div class="col-3">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>$ {{$saldo}}</h3>

          <p>Saldo pendiente entre las fechas {{date('d/m', strtotime($desde))}} y {{date('d/m', strtotime($hasta))}}</p>
        </div>
        <div class="icon">
          {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
          <i class="fas fa-file-invoice-dollar"></i>
        </div>
        
      </div>
    </div>
   
    <div class="col-12">
        
        
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">Ordenes generadas por usuarios en el mes en curso</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a>--></h2>
   
          
          <!-- /.card-header -->
          <table id="reporte1" name="reporte1" class="table table-striped table-condensed table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 40px">Estado</th>
                  <th>Fecha</th>
                  <th>Usuario</th>
                  <th>Localidad</th>
                  <th>Copago</th>
                  <th>Detalle</th>
                  <th style="width: 40px">Coseguro</th>
                  <th style="width: 40px">Medio Pago</th>
                  <th style="width: 40px">Anular Orden</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($usuarios as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  @if ($item->anular == 1)
                  <td><span class="badge bg-danger">ANULADO</span></td>
                  @else
                  <td><span class="badge bg-success">OK</span></td>
                  @endif
                  <td>{{date('d/m/y', strtotime($item->fecha))}}</td>
                  <td>{{$item->usuarios->name}}</td>
                  <td>{{$item->usuarios->localidad}}</td>
                  <td>{{$item->copago->copago}}</td>
                  <td>{{$item->detalle}}</td>
                  <td><span class="badge bg-success">${{$item->precio}}</span></td>
                  <td><span class="badge bg-primary">{{$item->medio_pago->nombre}}</span></td>
                  <td><span class="badge bg-primary"> <a href="anularOrden/{{$item->id}}">Anular <i class="fas fa-minus-circle"></i></a></span></td>
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