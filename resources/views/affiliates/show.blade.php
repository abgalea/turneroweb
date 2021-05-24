@extends('layouts.app')

@section('content')

{{-- <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">{{ $certificados->id}}</h1>
    <p class="lead">{{ $certificados->id}}</p>
    </div>
  </div> --}}

  <div class="card">
    <div class="card-header bg-primary">
      Sistema de Control de Afiliados DNI:{{ $certificados->nro_doc}}
    </div>
    <div class="card-body">
      <table width='100%'>
        <tbody>
          <tr>
            @if ($certificados->plan == 'GRUPO MELD SALUD MISIONES')
              <td><img src='{{URL('/img/ospta_meld.jpg')}}' width="20%" /></td>
            @else
              <td><img src='{{URL('/img/banner.jpg')}}'  /></td>
            @endif
            
            
            {{-- <td><img src='/img/logo_polmis.jpg' width='50' /></td> --}}
          </tr>
        </tbody>
      </table>
            {{-- <h3>EL FUNCIONARIO DE POLICIA QUE SUSCRIBE CERTIFICA QUE: EL USO / LOCAL</h3> --}}
            <div class="rounded float-right">
              @php
                // $contents = file_get_contents("https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://policiamisiones.gob.ar/bomberos/index.php?id=".$certificados->id);
                // echo '<img class="rounded float-right" src="data:image/png;base64,'. base64_encode($contents) .'">';    
              @endphp
            </div>
            Nombre Titular: <b>{{ $certificados->nom_titular}}</b><br> 
            CUIL Titular: <b>{{ $certificados->cuil_titular}}</b><br> 
            {{-- Tipo Familiar: <b>{{ $certificados->tipo_familia}}</b><br> --}}
            Nro. Carnet: <b>{{ $certificados->nro_gru_familiar}}</b><br> 
            Nro. Credencial: <b>{{ $certificados->credencial}}</b><br> 
            Nro. Teléfono: <b>{{ $certificados->telefono}}</b><br> 
            Plan: <b>{{ $certificados->plan}}</b><br> 
            Codigo Ingreso: <b>{{ $certificados->codigo_ingreso}}</b><br> 
            <hr>
            Nombre Beneficiario: <b>{{ $certificados->nom_beneficiario}}</b><br> 
            CUIL Beneficiario: <b>{{ $certificados->cuil_beneficiario}}</b><br> 
            Tipo Familiar: <b>{{ $certificados->tipo_familia}}</b><br>
            Fecha Nacimiento: <b>{{date('d/m/Y', strtotime($certificados->nacimiento))}}</b><br> 
            Sexo: <b>
                @if($certificados->sexo == 'F')  
                  Femenino
                @else
                  Masculino
                @endif
            </b><br>
              <br>
              <br>
              <br>
              <br>
              <br>
            <a target="_blank" href="{{URL('nueva_orden/'.$certificados->nro_doc)}}"><button type="button" class="btn btn-primary btn-lg"> <i class="fas fa-file-pdf"></i> Orden con Recetario</button></a>
            <a target="_blank" href="{{URL('laboratorio/'.$certificados->nro_doc)}}"><button type="button" class="btn btn-primary btn-lg"> <i class="fas fa-flask"></i> Orden Laboratorio</button></a>
            <a target="_blank" href="{{URL('practica/'.$certificados->nro_doc)}}"><button type="button" class="btn btn-primary btn-lg"> <i class="fab fa-product-hunt"></i> Orden de Practicas</button></a>
            <a target="_blank" href="{{URL('solorecetario/'.$certificados->nro_doc)}}"><button type="button" class="btn btn-primary btn-lg"> <i class="fas fa-file-pdf"></i> Solo Recetario</button></a>
            </p>
          {{-- <br><p></p><hr style='border:dashed #000 1px'> --}}
        {{-- <table width='100%'><tbody>
          <tr>
            <td><img src='/img/logo_bom.jpg' width='40' /></td>
            <td><h3>Certificado de Identificacion Unica (CIU)N°: {{ $certificados->id}} - DUPLICADO</h3></td>
            <td><img src='/img/logo_polmis.jpg' width='40' /></td>
          </tr>
        </tbody>
      </table>
            <b>EL FUNCIONARIO DE POLICIA QUE SUSCRIBE CERTIFICA QUE: EL USO / LOCAL</b><br>
            <div class="rounded float-right">{!!QrCode::size(200)->generate("https://policiamisiones.gob.ar/bomberos/index.php?id={{$certificados->id}}") !!}</div>
            Titular: <b>{{ $certificados->nombre_comerciante}}.</b><br> 
            Comercio: <b>{{ $certificados->nombre_comercio}}.</b><br> 
            Rubro: <b>{{ $certificados->rubro}}.</b><br>
            Domicilio: <b>{{ $certificados->direccion}}.</b><br>  
            PRESENTÓ TODAS LAS DOCUMENTACIONES REFERIDAS AL SISTEMA DE PROTECCIÓN CONTRA INCENDIOS, ACORDE AL PROYECTO PRESENTADO OPORTÚNAMENTE.<br> 
            Observaciones: <b>{{ $certificados->observaciones}}.</b> | Nro Certificado: <b>{{ $certificados->nro_certificado}}</b><br> 
            Nro Previa: <b>{{ $certificados->previa}}</b><br> 
            Valido Desde: <b>{{date('d/m/y', strtotime($certificados->desde))}}</b> Hasta: <b>{{date('d/m/y', strtotime($certificados->hasta))}}</b>
            <p>Emitido: <b>{{date('d/m/y', strtotime($certificados->fecha))}}</b> <br> <b>Puede Validar los Datos del Presente 
              Certificado en la Siguiente URL - <a href="https://policiamisiones.gob.ar/bomberos/index.php?id={{$certificados->id}}">https://policiamisiones.gob.ar/CIU/</a></b>
              <br><br><br><br><br></p>
          
          <br><p></p><hr style='border:dashed #000 1px'><table width='100%'>
        <tbody>
          <tr>
            <td><img src='/img/logo_bom.jpg' width='40' /></td>
            <td><h3>Certificado de Identificacion Unica (CIU)N°: {{ $certificados->id}} - TRIPLICADO</h3></td>
            <td><img src='/img/logo_polmis.jpg' width='40' /></td>
          </tr>
        </tbody>
      </table>
            <b>EL FUNCIONARIO DE POLICIA QUE SUSCRIBE CERTIFICA QUE: EL USO / LOCAL</b><br>
            <div class="rounded float-right">{!!QrCode::size(200)->generate("https://policiamisiones.gob.ar/bomberos/index.php?id={{$certificados->id}}") !!}</div>
            Titular: <b>{{ $certificados->nombre_comerciante}}.</b><br> 
            Comercio: <b>{{ $certificados->nombre_comercio}}.</b><br> 
            Rubro: <b>{{ $certificados->rubro}}.</b><br>
            Domicilio: <b>{{ $certificados->direccion}}.</b><br> 
            PRESENTÓ TODAS LAS DOCUMENTACIONES REFERIDAS AL SISTEMA DE PROTECCIÓN CONTRA INCENDIOS, ACORDE AL PROYECTO PRESENTADO OPORTÚNAMENTE.<br> 
            Observaciones: <b>{{ $certificados->observaciones}}.</b> | Nro Certificado: <b>{{ $certificados->nro_certificado}}</b><br> 
            Nro Previa: <b>{{ $certificados->previa}}</b><br> 
            Valido Desde: <b>{{date('d/m/y', strtotime($certificados->desde))}}</b> Hasta: <b>{{date('d/m/y', strtotime($certificados->hasta))}}</b>
            <p>Emitido: <b>{{date('d/m/y', strtotime($certificados->fecha))}}</b> <br> <b>Puede Validar los Datos del Presente 
              Certificado en la Siguiente URL - <a href="https://policiamisiones.gob.ar/bomberos/index.php?id={{$certificados->id}}">https://policiamisiones.gob.ar/CIU/</a></b>
            <br><br><br><br><br></p> --}}
            
    </div>
  </div>
  {{-- <script>
    window.print();
  </script> --}}
@endsection