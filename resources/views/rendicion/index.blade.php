@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-6">
      <div style="padding-bottom: 50px;">
        <a href="rendicion/create"> 
          <button type="button" class="btn btn-success float-left"> <i class="fas fa-plus"></i> AGREGAR NUEVA RENDICION</button>
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
          <h3 class="card-title">LISTADO DE IMPORTES RENDIDOS </h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="convenios/create"><button type="button" class="btn btn-success float-right">Agregar convenios</button></a>--></h2>
   
    <table id="reporte1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">DETALLE</th>
            <th scope="col">USUARIO</th>
            <th scope="col">MONTO</th>
            <th scope="col">FECHA</th>
            <th scope="col">EDITAR</th>
            {{-- <th scope="col">Borrar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $copago)

            <tr>
            <td>{{$copago->id}}</td>
            <td>{{$copago->detalle}}</td>
            <td>{{$copago->usuarios->name}}</td>
            <td><b>$ {{$copago->monto}}</b></td>
            <td>{{date('d/m/y', strtotime($copago->fecha))}}</td>
            
            <td><a href="{{ route('rendicion.edit', $copago->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
      {{-- <div class="row">
        <div class="mx-auto">
          {{ $users->links() }}
        </div>
      </div> --}}
     
</div>
</div>
</div>
</div>
</div>    
@endsection