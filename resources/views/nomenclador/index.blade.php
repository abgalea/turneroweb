@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                
                <input class="form-control form-control-sidebar" name="search" type="search" placeholder="Buscar prácticas" aria-label="Search">
                <br>
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>
  <div class="row"> 
    <div class="col-6">
      <div style="padding-bottom: 50px;">
        <a href="practicas/create"> 
          <button type="button" class="btn btn-success float-left"> <i class="fas fa-plus"></i> AGREGAR NUEVA PRACTICA</button>
        </a>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">Lista de Prácticas</h3>
        </div>
        <div class="card-body">
         
          <h6>
            @if ($search)
            <div class="alert alert-primary" role="alert">
              Los resultado de tu busqueda '{{ $search }}' son:
            </div>
            @endif
            @if (session('status'))
              <div class="alert alert-info">
                  {{ session('status') }}
              </div>
            @endif
          </h6>
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Código</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Practica</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <th>{{$user->id}}</th>
                  <td>{{$user->codigo}}</td>
                  <td>{{$user->grupo}}</td>
                  <td>{{$user->practica}}</td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row">
              <div class="mx-auto">
                {{ $users->links() }}
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        </div>    
@endsection