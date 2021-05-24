@extends('layouts.app')

@section('content')

{{-- <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">{{ $convenio->id}}</h1>
    <p class="lead">{{ $convenio->id}}</p>
    </div>
  </div> --}}

  <div class="card">
    <div class="card-header bg-primary">
      Prestador N&deg;: {{ $convenio->id}}
    </div>
    <div class="card-body">
      <table width='100%'>
        <tbody>
          <tr>
            <td><img src='/img/logo_bom.png' /></td>
            {{-- <td><h2 class="card-title"></h2></td> --}}
            {{-- <td><img src='/img/logo_polmis.jpg' width='50' /></td> --}}
          </tr>
        </tbody>
      </table>
            <h3>CONVENIO ENTRE <u>{{ $convenio->prestadora}}</u> Y GRUPO MELD SALUD</h3>
            {{-- <div class="rounded float-right">
              @php
                $contents = file_get_contents("https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://policiamisiones.gob.ar/bomberos/index.php?id=".$convenio->id);
                echo '<img class="rounded float-right" src="data:image/png;base64,'. base64_encode($contents) .'">';    
              @endphp
            </div> --}}
            LOCALIDAD: <b>{{ $convenio->localidad}}</b><br> 
            PRESTADORA: <b>{{ $convenio->prestadora}}</b><br> 
            CONVENIO DESDE: <b>{{date('d/m/y', strtotime($convenio->desde))}}</b><br>
            PLAZO FACTURACIÓN: <b>{{ $convenio->plazo}} dias</b><br> 
            CUIT: <b>{{ $convenio->cuit}}</b><br> 
            CBU: <b>{{ $convenio->cbu}}</b><br> 
            
              <br>
              <br>
              <br>
              <br>
              <br>
            {{-- <a target="_blank" href="/imprimir/{{$convenio->id}}"><button type="button" class="btn btn-danger btn-lg"> <i class="fas fa-file-pdf"></i> DESCARGAR PDF</button></a>
            <a target="_blank" href="/ver/{{$convenio->id}}"><button type="button" class="btn btn-success btn-lg"> <i class="fas fa-eye"></i> VER CIU</button></a> --}}
            </p>
          
            
    </div>
  </div>
  {{-- <script>
    window.print();
  </script> --}}
@endsection