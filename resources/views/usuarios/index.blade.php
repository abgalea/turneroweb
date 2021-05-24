@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">Lista de Usuarios</h3>
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
          <table id="reporte1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Rol</th>
                  <th scope="col">Opcion</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <th>{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->nivel}}</td>
                  <td>
                  
                  <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                    <a href="{{ route('usuarios.show', $user->id) }}"><button type="button" class="btn btn-secondary">Ver</button></a>
                    <a href="{{ route('usuarios.edit', $user->id) }}"><button type="button" class="btn btn-info">Editar</button></a>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                  </form>
                  </td>
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