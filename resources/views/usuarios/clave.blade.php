@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Editar Usuarios</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Create Post Form -->  
        <form action="{{ route('usuarios.update', $user->id)}}" method="POST">
            @method('PATCH')
              @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Clave</label>
                    <input type="password" class="form-control" name="password" aria-describedby="emailHelp">
                  </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                {{-- <button type="reset" class="btn btn-danger">Cancelar</button> --}}
              </form>
        </div>
    </div>
</div>
    
@endsection