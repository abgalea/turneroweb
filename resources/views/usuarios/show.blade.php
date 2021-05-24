@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="card">
    
      <h5 class="card-header"> Grupo MELD Salud S.A.</h5>
      <div class="card-body">
          <img src="/img/profile.png" class="rounded float-right" alt="User Image">
          Nombre: <b>{{ $user->name }} </b><br>
          Dependencia: <b>{{ $user->dependencia }}</b><br>
          Usuario: <b>{{ $user->username}}</b><br>
          Correo Electrónico: <b>{{ $user->email}}</b>

          
      </div>
    </div>
</div>


    
@endsection