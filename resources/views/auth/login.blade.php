
@extends('layouts.log')
<div class="login-box">
    <!-- /.login-logo -->
    
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="{{URL('/img/cebac.svg')}}" width="100%">
      </div>
      <div class="card-body">
        <p class="login-box-msg">Debe iniciar para poder usar el sistema</p>
  
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="input-group mb-3">
            <input id="email" placeholder="Ingrese Usuario" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @if ($errors->has('username'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group mb-3">
            <input id="password" placeholder="*****" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="icheck-primary">
               
              </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
<div class="container">
    
</div>


