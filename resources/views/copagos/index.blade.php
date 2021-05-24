@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-6">
      <div style="padding-bottom: 50px;">
        <a href="copagos/create"> 
          <button type="button" class="btn btn-success float-left"> <i class="fas fa-plus"></i> AGREGAR NUEVO COPAGO</button>
        </a>
      </div>
      <div style="padding-bottom: 50px;">
        <a target="_blank" href="https://www.argentina.gob.ar/sssalud/valores-copagos"> 
          <button type="button" class="btn btn-primary float-left"> <i class="fas fa-link"></i> VER TABLA COPAGO</button>
        </a>
      </div>
    </div>
    {{-- <div class="col-6">
      <div style="padding-bottom: 50px;">
        <a href="convenios/create"> 
          <button type="button" class="btn btn-success float-left"> <i class="fas fa-plus"></i> AGREGAR NUEVO COSEGURO</button>
        </a>
      </div>
    </div> --}}
    
    <div class="col-lg-12">
      @if ($nivel ?? '')
      <div class="card">
        <div class="card-body">
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscador"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>
      @endif
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">LISTADO DE COSEGUROS </h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="convenios/create"><button type="button" class="btn btn-success float-right">Agregar convenios</button></a>--></h2>
   
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">COPAGO</th>
            <th scope="col">PRECIO</th>
            <th scope="col">Fecha VENCIMIENTO</th>
            <th scope="col">Editar</th>
            {{-- <th scope="col">Borrar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($copagos as $copago)

            <tr>
            <td>{{$copago->id}}</td>
            <td>{{$copago->copago}}</td>
            <td><b>$ {{$copago->precio}}</b></td>
            <td>{{date('d/m/y', strtotime($copago->vencimiento))}}</td>
            
            <td><a href="{{ route('copagos.edit', $copago->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
      {{-- <div class="row">
        <div class="mx-auto">
          {{ $copagos->links() }}
        </div>
      </div> --}}
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