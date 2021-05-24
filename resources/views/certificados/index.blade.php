@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
   
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
          <h3 class="card-title">Lista de Certificados - CIU (<b>Código de Identificación Único</b>)</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a>--></h2>
   
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">CIU</th>
            <th scope="col">Info Certificado</th>
            <th scope="col">Fecha Válida</th>
            <th scope="col">Titular</th>
            {{-- <th scope="col">Rubro</th>
            <th scope="col">Comercio</th> --}}
            <th scope="col">Observacion</th>
            <th scope="col">Lugar Emisión</th>
            <th scope="col">Acciones</th>
            {{-- <th scope="col">Borrar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)

            <tr>
            <th scope="row">CIU-{{$certificado->id}}</th>
            <td>
              Nro: <b>{{$certificado->nro_certificado}}</b><br>
              
            </td>
            <td>DESDE: <b>{{date('d/m/y', strtotime($certificado->desde))}}</b> <br> 
               HASTA: <b style="color: crimson">{{date('d/m/y', strtotime($certificado->hasta))}} </b></td>
            <td>Titular: <b>{{$certificado->nombre_comerciante}}</b><br>
            Comercio: <b>{{$certificado->nombre_comercio}}</b><br>
            Rubro: <b>{{$certificado->rubro}}</b><br>
            Tel: <b>{{$certificado->telefono_contacto}}</b><br>
            Mail: <b><a href="mailto:{{$certificado->correo_contacto}}">{{$certificado->correo_contacto}}</a></b><br>
            </td>
            {{-- <td>{{$certificado->rubro}}</td>
            <td>{{$certificado->nombre_comercio}}</td> --}}
            <td>
              {{$certificado->observaciones}}<br>
              PREVIA: <b>{{$certificado->previa}}</b>
            </td>
            <td>
              Emisión: <b>{{date('d/m/y', strtotime($certificado->fecha))}}</b><br>
              Localidad: <br><b>{{$certificado->localidad}}</b><br>
              Dpencia: <br><b>{{$certificado->dependencia}}</b>
            </td>
            {{--  <td></td> --}}
            <td>
                
                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST" class="form-inline" id="miFormulario">
                  <a title="Generar PDF" href="/imprimir/{{$certificado->id}}"><button type="button" class="btn btn-danger"><i class="fas fa-file-pdf"></i></button></a>
                  <a title="Ver en Pantalla" href="{{ route('certificados.show', $certificado->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-print"></i></button></a>
                  @method('DELETE')
                  @csrf
                  <button title="Borrar" type="submit" class="btn btn-warning"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
          {{ $certificados->links() }}
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