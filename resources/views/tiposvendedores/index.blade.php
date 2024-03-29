@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-6">
      <div style="padding-bottom: 50px;">
        <a href="egresos/create"> 
          <button type="button" class="btn btn-success float-left"> <i class="fas fa-plus"></i> AGREGAR NUEVO TIPO VENDEDOR</button>
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
          <h3 class="card-title">LISTADO DE TIPO DE VENDEDORES</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="convenios/create"><button type="button" class="btn btn-success float-right">Agregar convenios</button></a>--></h2>
   
    <table id="reporte1" name="reporte1" class="table table-striped table-condensed table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th style="width: 40px">ID</th>
            <th scope="col">NOMBRE</th>
            <th style="width: 40px">EDITAR</th>
            {{-- <th scope="col">Borrar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos as $tipo)

            <tr>
            <td>{{$tipo->id}}</td>
            <td>{{$tipo->nombre}}</td>
            <td><a href=""><button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="row">
      <div class="mx-auto">
        {{ $categorias->links() }}
      </div>
    </div> --}}
      
</div>
</div>
</div>
</div>
</div>    


@endsection
