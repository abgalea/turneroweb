@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    
    <div class="col-lg-12">
      <h1>Lista de Afiliados </h1>
      
      <div class="card">
        <div class="card-body">
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                
                <input class="form-control form-control-sidebar" name="search" type="search" placeholder="Buscador de afiliado" aria-label="Search">
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
          <h3 class="card-title">Lista de Afiliados - {{ $cantidad_afiliados }}</h3>
        </div>
        <div class="card-body">
    
   
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">DNI</th>
            <th scope="col">GPO FAMILIAR</th>
            <th scope="col">TIPO FAMILIAR</th>
            <th scope="col">APELLIDO Y NOMBRE</th>
            <th scope="col">N CARNET</th>
            <th scope="col">EDAD</th>
            <th scope="col">CUIL</th>
            <th scope="col">ESTADO</th>
            <th scope="col">LOCALIDAD</th>
            <th scope="col">VER</th>
            <th scope="col">ORDEN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)

            <tr>
            <td>{{$certificado->nro_doc}}</td>
            <td>{{$certificado->nro_gru_familiar}}</td>
            <td>{{$certificado->tipo_familia}}</td>
            <td>{{$certificado->nom_beneficiario}}</td>
            <td>{{$certificado->credencial}}</td>
            <td>{{$certificado->edad}}</td>
            <td>{{$certificado->cuil_beneficiario}}</td>
            {{-- <td>{{$certificado->empresa}}</td> --}}
            
            @if (trim($certificado->codigo_ingreso) == 'DERIV.ROISA') 
             <td><span class="badge bg-warning">{{$certificado->codigo_ingreso}}</span></td>
            @else
            <td><span class="badge bg-success">{{$certificado->codigo_ingreso}}</span></td>
            @endif
            <td>{{$certificado->localidad}}</td>

            {{-- <td>{{date('d/m/Y', strtotime($certificado->nacimiento))}}</td>
            <td>{{$certificado->edad}}</td>
            <td><b style="color: crimson">{{date('d/m/Y', strtotime($certificado->vigencia))}} </b></td>
            <td>{{$certificado->plan}}</td> --}}
            {{-- <td>{{$certificado->plan}}</td> --}}
            <td> <a href="{{URL('showAfi/'.$certificado->nro_doc)}}" class="btn btn-primary"> <i class="fas fa-user-circle"></i>  </a> </td>
            <td>
              <!-- Example single danger button -->
              <div class="btn-group">
                <button type="button" class="btn btn-success">Orden</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                  <a target="_blank" class="dropdown-item" href="{{URL('nueva_orden/'.$certificado->nro_doc)}}">Con recetario</a>
                  <div class="dropdown-divider"></div>
                  <a target="_blank" class="dropdown-item" href="{{URL('laboratorio/'.$certificado->nro_doc)}}">Para Laboratorio</a>
                  <div class="dropdown-divider"></div>
                  <a target="_blank" class="dropdown-item" href="{{URL('practica/'.$certificado->nro_doc)}}">Practicas</a>
                  <div class="dropdown-divider"></div>
                  <a target="_blank" class="dropdown-item" href="{{URL('solorecetario/'.$certificado->nro_doc)}}">Solo Receta</a>
                  {{-- <a class="dropdown-item" href="#">Separated link</a> --}}
                </div>
              </div>
              
              {{-- <a class="btn btn-primary" href="{{URL('nueva_orden/'.$certificado->nro_doc)}}" role="button"><i class="fa fa-file" aria-hidden="true"></i></a></td> --}}
            
            
{{--             
            <td>
                
                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST" class="form-inline" id="miFormulario">
                  <a title="Generar PDF" href="/imprimir/{{$certificado->id}}"><button type="button" class="btn btn-danger"><i class="fas fa-file-pdf"></i></button></a>
                  <a title="Ver en Pantalla" href="{{ route('certificados.show', $certificado->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-print"></i></button></a>
                  @method('DELETE')
                  @csrf
                  <button title="Borrar" type="submit" class="btn btn-warning"><i class="far fa-trash-alt"></i></button>
                </form>
            </td> --}}
            
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