@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-gradient-olive">
          <h3 class="card-title">Buscador de Certificados Anteriores</h3>
        </div>
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
      <div class="card">
        <div class="card-header bg-gradient-olive">
          <h3 class="card-title">Lista de Certificados - CIU Viejos</h3>
        </div>
        <div class="card-body">
    
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th scope="col">CIU</th>
            <th scope="col">Info Certificado</th>
            <th scope="col">Fecha Válida</th>
            <th scope="col">Comercio</th>
            <th scope="col">Rubro</th>
            {{-- <th scope="col">Comercio</th> --}}
            <th scope="col">Previa</th>
            <th scope="col">Lugar Emisión</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)

            <tr>
            <th scope="row">CIU{{$certificado->id}}</th>
            <td>
              Nro: <b>{{$certificado->certificado}}</b><br>
              Emitido: <b>{{$certificado->fecha}}</b>
            </td>
            <td>DESDE: <b>{{$certificado->desde}}</b> <br> 
               HASTA: <b>{{$certificado->hasta}} </b></td>
            <td>Comercio: <b>{{$certificado->comercio}}</b><br>
              Titular: <b>{{$certificado->nombre}}</b></td>
            <td>{{$certificado->actividad}}</td>
            {{-- <td>{{$certificado->comercio}}</td> --}}
            <td>
              {{$certificado->previa}}
            </td>
            <td>
              Por: <b>{{$certificado->lugar}}</b><br>
              Legajo: <b>{{$certificado->legajo}}</b>
            </td>
            <td><a href="{{ route('ciuviejo.show', $certificado->id) }}"><button type="button" class="btn btn-secondary">CIU</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
          {{ $certificados->links() }}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
@endsection