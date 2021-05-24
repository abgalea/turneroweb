@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-6">
      <div style="padding-bottom: 50px;">
        <a href="egresos/create"> 
          <button type="button" class="btn btn-success float-left"> <i class="fas fa-plus"></i> AGREGAR NUEVA SALIDA $</button>
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
          <h3 class="card-title">LISTADO DE EGRESOS DEL USUARIO</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="convenios/create"><button type="button" class="btn btn-success float-right">Agregar convenios</button></a>--></h2>
   
    <table id="reporte1" name="reporte1" class="table table-striped table-condensed table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">FECHA</th>
            <th scope="col">TIPO MOV</th>
            <th scope="col">TIPO COMPROB</th>
            <th scope="col">N° COMPROBANTE</th>
            <th scope="col">CONCEPTO</th>
            <th scope="col">MONTO</th>
            <th scope="col">AUTORIZACIÓN</th>
            <th scope="col">USUARIO</th>
            <th scope="col">EDITAR</th>
            {{-- <th scope="col">Borrar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($egresos as $egreso)

            <tr>
            <td>{{$egreso->id}}</td>
            <td>{{$egreso->fecha}}</td>
            <td>{{$egreso->tipomov->nombre}}</td>
            <td>{{$egreso->tipocomp->nombre}}</td>
            <td>{{$egreso->num_comprobante}}</td>
            <td>{{$egreso->concepto}}</td>
            <td><b>$ {{$egreso->monto}}</b></td>
            <td>{{$egreso->autorizado}}</td>
            <td>{{$egreso->nomusu->name}}</td>
            <td><a href="{{ route('egresos.edit', $egreso->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="row">
      <div class="mx-auto">
        {{ $egresos->links() }}
      </div>
    </div> --}}
      
</div>
</div>
</div>
</div>
</div>    


  <script>    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [

            {extend:'excel',action:newExportAction}
        ],
           "processing": true,
         "serverSide": true,
        

    } );
  
</script>

@endsection
@section('js') 
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
@stop