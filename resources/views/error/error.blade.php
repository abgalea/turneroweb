
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card-body">
        <div class="alert alert-{{$tipo}} alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Mensaje!</h5>
          {{$mensaje}}
        </div>
    </div>
</div> 
@endsection

