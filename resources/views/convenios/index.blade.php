@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-6">
      <div style="padding-bottom: 50px;">
        <a href="convenios/create"> 
          <button type="button" class="btn btn-success float-left"> <i class="fas fa-plus"></i> AGREGAR NUEVO CONVENIO</button>
        </a>
      </div>
    </div>
    
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                
                <input class="form-control form-control-sidebar" name="search" type="search" placeholder="Buscador" aria-label="Search">
                <br>
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">CONVENIOS CON PRESTADORES </h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="convenios/create"><button type="button" class="btn btn-success float-right">Agregar convenios</button></a>--></h2>
   
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Localidad</th>
            <th scope="col">Prestadora</th>
            <th scope="col">Fecha Desde</th>
            <th scope="col">Plazo</th>
            <th scope="col">CUIT</th>
            <th scope="col">CBU</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            {{-- <th scope="col">Borrar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($convenios as $convenio)

            <tr>
            <td>{{$convenio->id}}</td>
            <td>{{$convenio->localidad}}</td>
            <td>{{$convenio->prestadora}}</td>
            <td>{{date('d/m/y', strtotime($convenio->desde))}}</td>
            <td>{{$convenio->plazo}}</td>
            <td>{{$convenio->cuit}}</td>
            <td>{{$convenio->cbu}}</td>
            <td>
                <form action="{{ route('convenios.destroy', $convenio->id) }}" method="POST" class="form-inline" id="miFormulario">
                  <a title="Ver" href="{{ route('convenios.show', $convenio->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-eye"></i></button></a>
                  @method('DELETE')
                  @csrf
                  {{-- <button title="Borrar" type="submit" class="btn btn-warning"><i class="far fa-trash-alt"></i></button> --}}
                </form>
            </td>
            <td><a href="{{ route('convenios.edit', $convenio->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
      {{-- <div class="row">
        <div class="mx-auto">
          {{ $convenios->links() }}
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