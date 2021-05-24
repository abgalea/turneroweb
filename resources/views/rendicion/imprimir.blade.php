<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CIU {{ $certificados->id}} - {{ $certificados->nombre_comerciante}}</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 15px;
        padding-top: 5px;
        }
    </style>
    </head>
    <body>
        <div class="contenido">
            <div class="card">
                {{-- <div class="card-header bg-gradient-maroon">
                  Certificado de Identificacion Unica (CIU)N&deg;: {{ $certificados->id}}
                </div> --}}
                <div class="card-body">
                  <table width='100%'>
                    <tbody>
                      <tr>
                        <td ><img src='{{ public_path() . '/img/logo_bom.jpg' }}' width='50' /></td>
                        <td ><h2>CERTIFICADO CIU N° {{ $certificados->id}} - ORIGINAL</h2></td>
                        {{-- <td ><img src={{ public_path() .'/img/logo_polmis.jpg'}} width='50' /></td> --}}
                        <td align="right">
                            @php
                            $contents = file_get_contents("https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=https://policiamisiones.gob.ar/bomberos/index.php?id=".$certificados->id);
                            echo '<img class="rounded float-right" src="data:image/png;base64,'. base64_encode($contents) .'">';    
                            @endphp
                        </td>
                      </tr>
                    </tbody>
                  </table>
                        <h3>EL FUNCIONARIO DE POLICIA QUE SUSCRIBE CERTIFICA QUE: EL USO / LOCAL</h3>
                        {{-- CIU NRO: {{ $certificados->id}}--}} 
                        Titular: <b>{{ $certificados->nombre_comerciante}}.</b><br> 
                        Comercio: <b>{{ $certificados->nombre_comercio}}.</b><br> 
                        Rubro: <b>{{ $certificados->rubro}}.</b><br>
                        Domicilio: <b>{{ $certificados->direccion}}.</b><br> 
                        PRESENTÓ TODAS LAS DOCUMENTACIONES REFERIDAS AL SISTEMA DE PROTECCIÓN CONTRA INCENDIOS, ACORDE AL PROYECTO PRESENTADO OPORTÚNAMENTE.<br> 
                        Observaciones: <b>{{ $certificados->observaciones}}.</b> | Nro Certificado: <b>{{ $certificados->nro_certificado}}</b><br> 
                        Nro Previa: <b>{{ $certificados->previa}}</b><br> 
                        Valido Desde: <b>{{date('d/m/y', strtotime($certificados->desde))}}</b> Hasta: <b>{{date('d/m/y', strtotime($certificados->hasta))}}</b>
                        <br>Emitido: <b>{{date('d/m/y', strtotime($certificados->fecha))}}</b> <br> <b>Puede Validar los Datos del Presente 
                          Certificado en la Siguiente URL - <a href="https://policiamisiones.gob.ar/bomberos/index.php?id={{$certificados->id}}">https://policiamisiones.gob.ar/bomberos/</a></b>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                        <p></p>
                      <hr style='border:dashed #000 1px'>
                      <table width='100%'>
                        <tbody>
                          <tr>
                            <td ><img src='{{ public_path() . '/img/logo_bom.jpg' }}' width='50' /></td>
                            <td ><h2>CERTIFICADO CIU N° {{ $certificados->id}} - DUPLICADO</h2></td>
                            {{-- <td ><img src={{ public_path() .'/img/logo_polmis.jpg'}} width='50' /></td> --}}
                            <td align="right">
                                @php
                                $contents = file_get_contents("https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=https://policiamisiones.gob.ar/bomberos/index.php?id=".$certificados->id);
                                echo '<img class="rounded float-right" src="data:image/png;base64,'. base64_encode($contents) .'">';    
                                @endphp
                            </td>
                          </tr>
                        </tbody>
                      </table>
                        <b>EL FUNCIONARIO DE POLICIA QUE SUSCRIBE CERTIFICA QUE: EL USO / LOCAL</b><br>
                        {{-- CIU NRO: <b>{{ $certificados->id}}</b><br> --}}
                        Titular: <b>{{ $certificados->nombre_comerciante}}.</b><br> 
                        Comercio: <b>{{ $certificados->nombre_comercio}}.</b><br> 
                        Rubro: <b>{{ $certificados->rubro}}.</b><br>
                        Domicilio: <b>{{ $certificados->direccion}}.</b><br>  
                        PRESENTÓ TODAS LAS DOCUMENTACIONES REFERIDAS AL SISTEMA DE PROTECCIÓN CONTRA INCENDIOS, ACORDE AL PROYECTO PRESENTADO OPORTÚNAMENTE.<br> 
                        Observaciones: <b>{{ $certificados->observaciones}}.</b> | Nro Certificado: <b>{{ $certificados->nro_certificado}}</b><br> 
                        Nro Previa: <b>{{ $certificados->previa}}</b><br> 
                        Valido Desde: <b>{{date('d/m/y', strtotime($certificados->desde))}}</b> Hasta: <b>{{date('d/m/y', strtotime($certificados->hasta))}}</b>
                        <br>Emitido: <b>{{date('d/m/y', strtotime($certificados->fecha))}}</b> <br> <b>Puede Validar los Datos del Presente 
                            Certificado en la Siguiente URL - <a href="https://policiamisiones.gob.ar/bomberos/index.php?id={{$certificados->id}}">https://policiamisiones.gob.ar/bomberos/</a></b>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                          <p></p>                      
                      {{-- <hr style='border:dashed #000 1px'> --}}
                      <table width='100%' style='border-top:dashed #000 1px'>
                        <tbody>
                          <tr>
                            <td ><img src='{{ public_path() . '/img/logo_bom.jpg' }}' width='50' /></td>
                            <td ><h2>CERTIFICADO CIU N° {{ $certificados->id}} - TRIPLICADO</h2></td>
                            {{-- <td ><img src={{ public_path() .'/img/logo_polmis.jpg'}} width='50' /></td> --}}
                            <td align="right">
                                @php
                                $contents = file_get_contents("https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=https://policiamisiones.gob.ar/bomberos/index.php?id=".$certificados->id);
                                echo '<img class="rounded float-right" src="data:image/png;base64,'. base64_encode($contents) .'">';    
                                @endphp
                            </td>
                          </tr>
                        </tbody>
                      </table>
                        <b>EL FUNCIONARIO DE POLICIA QUE SUSCRIBE CERTIFICA QUE: EL USO / LOCAL</b><br>
                          {{-- CIU NRO: <b>{{ $certificados->id}}</b><br> --}}
                        Titular: <b>{{ $certificados->nombre_comerciante}}.</b><br> 
                        Comercio: <b>{{ $certificados->nombre_comercio}}.</b><br> 
                        Rubro: <b>{{ $certificados->rubro}}.</b><br>
                        Domicilio: <b>{{ $certificados->direccion}}.</b><br> 
                        PRESENTÓ TODAS LAS DOCUMENTACIONES REFERIDAS AL SISTEMA DE PROTECCIÓN CONTRA INCENDIOS, ACORDE AL PROYECTO PRESENTADO OPORTÚNAMENTE.<br> 
                        Observaciones: <b>{{ $certificados->observaciones}}.</b> | Nro Certificado: <b>{{ $certificados->nro_certificado}}</b><br> 
                        Nro Previa: <b>{{ $certificados->previa}}</b><br> 
                        Valido Desde: <b>{{date('d/m/y', strtotime($certificados->desde))}}</b> Hasta: <b>{{date('d/m/y', strtotime($certificados->hasta))}}</b>
                        <br>Emitido: <b>{{date('d/m/y', strtotime($certificados->fecha))}}</b> <br> <b>Puede Validar los Datos del Presente 
                            Certificado en la Siguiente URL - <a href="https://policiamisiones.gob.ar/bomberos/index.php?id={{$certificados->id}}">https://policiamisiones.gob.ar/bomberos/</a></b>
                        <br><br></p>
                      
                </div>
              </div>

        </div>
    </body>
</html>