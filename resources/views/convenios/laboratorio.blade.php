@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header bg-gradient-success">
          <h3 class="card-title">Orden Médica Electrónica - Solicitud de Laboratorio {{$afiliado->autorizacion}}</h3>
        </div>
            <form action="/certificados" method="POST" id="quickForm">
              <div class="card-body">
                @csrf
                <div class="form-group row" style="{{$afiliado->style_mostrar_auto}}: {{$afiliado->mostrar_auto}}">
                  <label class="col-sm-4 col-form-label">Codigo Autorización</label>
                  <div class="col-sm-6">
                    <input  type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingresar el código del Auditor" aria-describedby="emailHelp">
                    
                  </div>
                  <div class="col-sm-2">
                    <button type="button" onclick="habilitar()" class="btn btn-primary">Autorizar</button>  
                  </div>

                  
                </div>
                <div class="alert alert-danger" role="alert" id="alerta" style="display: none">
                  El codigo ingresado no es válido, solicite al auditor la autorización
                </div>
                <div class="form-group row" id="ocultar" style="visibility: {{$afiliado->oculto}}">
                    <label class="col-sm-4 col-form-label">Titular</label>
                    <div class="col-sm-8">
                    <input required type="text" class="form-control" name="orden" value="{{$afiliado->nro_doc}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row" id="ocultar2" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">Beneficiario</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" placeholder="Nro del Certificado" value="{{$afiliado->nom_beneficiario}}"  aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row" id="ocultar3" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">Fecha de Emisión</label>
                  <div class="col-sm-8">
                  <input required type="date" disabled class="form-control" value="<?php echo  date('Y-m-d') ?>" aria-describedby="emailHelp">
                  <input required type="hidden" class="form-control"  value="<?php echo  date('Y-m-d') ?>" name="fecha">
                  </div>
                </div>
                
                <div class="form-group row" id="ocultar4" style="visibility: {{$afiliado->oculto}}">
                    <label class="col-sm-4 col-form-label">Válido Hasta</label>
                    <div class="col-sm-8">
                    <input required type="date" disabled class="form-control" name="hasta" value="<?php echo  date('Y-m-d', strtotime('+1 month')); ?>" aria-describedby="emailHelp">
                    <input required type="hidden" name="vencimiento" value="<?php echo  date('Y-m-d', strtotime('+1 month')); ?>">
                    </div>
                </div>
                <div class="form-group row" id="ocultar5" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">CUIL Beneficiario</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="nombre_comerciante" value="{{$afiliado->cuil_beneficiario}}" placeholder="Titular del Comercio" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row" id="ocultar6" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">Grupo Familiar</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="nombre_comercio" value="{{$afiliado->nro_gru_familiar}}" placeholder="Nombre del Comercio" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="form-group row" id="ocultar7" style="visibility: {{$afiliado->oculto}}">
                    <label class="col-sm-4 col-form-label">Fecha Nac.</label>
                    <div class="col-sm-8">
                    <input required type="date" value="{{$afiliado->nacimiento}}" class="form-control" name="rubro" placeholder="Rubro Comercial o Actividad" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row" id="ocultar8" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">Copagos</label>
                  <div class="col-sm-8">
                  {{-- <select required class="select2 form-control" id="select2" name="localidad" style="width: 100%;"> --}}
                    <select class="form-control" name="copago" id="ddlViewBy" onchange="cambiar()">
                      <option value="">Seleccionar una Opción</option>
                    @foreach ($copagos as $copago)
                      <option value='{{$copago->id}}'>{{$copago->copago}} - ${{$copago->precio}}</option>
                    @endforeach
                  
                  </select>
                  </div>
                </div>
                
                <div class="form-group row" id="ocultar9" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">Prácticas</label>
                  <div class="col-sm-8">
                  {{-- <select required class="select2 form-control" id="select2" name="localidad" style="width: 100%;"> --}}
                    <select class="form-control select2-single" name="practica[]" id="practica" multiple="multiple">
                      <option value="">Seleccionar una Opción</option>
                    @foreach ($nomenclaturas as $nomenclatura)
                    <option value='{{$nomenclatura->id}}'>{{$nomenclatura->codigo}} - {{$nomenclatura->grupo}} - {{$nomenclatura->practica}}</option>
                    @endforeach
                  
                  </select>
                  </div>
                </div>

                <div class="form-group row" id="ocultar10" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">Cantidad</label>
                  <div class="col-sm-8">
                  <input required type="number" class="form-control" name="cantidad" placeholder="Cantidad" aria-describedby="emailHelp">
                  </div>
                </div>
                
                
                <hr>
                <div class="form-group row" id="ocultar13" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label" style="background-color: chartreuse;">Medio Pago</label>
                  <div class="col-sm-8">
                    <select class="form-control select2-single" name="medio_pagos" id="medio_pagos">
                      <option value="">Seleccionar una Opción</option>
                    @foreach ($medio_pagos as $medio_pago)
                    <option value='{{$medio_pago->id}}'>{{$medio_pago->nombre}}</option>
                    @endforeach
                  
                  </select>
                  </div>
                </div>
                <hr>
                <div class="form-group row" id="ocultar11" style="visibility: {{$afiliado->oculto}}">
                  <label class="col-sm-4 col-form-label">Usuario</label>
                  <div class="col-sm-8">
                    <input type="text" value="{{ auth()->user()->name }}" class="form-control" disabled>
                  
                    <input type="hidden" class="form-control" value="{{ auth()->user()->id }}" name="user_id">
                    <input type="hidden" class="form-control" value="2" name="tipo_orden">
                    <input type="hidden" class="form-control" value="{{ $afiliado->nro_doc }}" name="id_afiliado">
                  </div>
                </div>
              <!-- /.card-body -->
              <div class="card-footer" id="ocultar12" style="visibility: {{$afiliado->oculto}}">
                
                <button type="submit" class="btn btn-primary">Generar Orden</button>
              </div>
              </div>
            </form>
          </div>
          
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <div class="card">
          <h5 class="card-header">Ordenes</h5>
          <div class="card-body">
            <h5 class="card-title">Mes actual: {{date('M/Y')}}</h5>
            <p class="card-text">El paciente con <b>{{$cant_ordenes}} </b> orden generada</p>
            @foreach ($ordenes as $orden)
              <li class="list-group-item"> El día: {{date('d/m/Y', strtotime($orden->fecha))}}  - <a href="/imprimir/{{$orden->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
              </li>
            @endforeach
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            <ul class="list-group">
            
            </ul>
          </div>
        </div>
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-file-invoice-dollar"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Monto a cobrar coseguro</span>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" class="form-control" id="elmonto" value="">
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <div class="alert alert-info" role="alert">
          Laboratorio es hasta 6 prácticas
        </div>
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
  <script type="text/javascript">
   
    function cambiar() {
      var e = document.getElementById("ddlViewBy");
      var practica = document.getElementById("practica");
      console.log('practica',practica)
      var strUser = e.value;
      console.log('valor',strUser)
      switch(strUser) {
        @foreach ($copagos as $copago)
        case '{{$copago->id}}':
          document.getElementById("elmonto").value = '{{$copago->precio}}'
          break;
        @endforeach
        default:
          document.getElementById("elmonto").value = 214
      }
      
      
    }
    function habilitar() {
        let codig = document.getElementById("codigo").value
        if(codig == '{{$afiliado->autorizacion}}'){
          document.getElementById("alerta").style.display= 'none';
          console.log('imprimio')
          document.getElementById("ocultar").style.visibility = 'visible';
          document.getElementById("ocultar2").style.visibility = 'visible';
          document.getElementById("ocultar3").style.visibility = 'visible';
          document.getElementById("ocultar4").style.visibility = 'visible';
          document.getElementById("ocultar5").style.visibility = 'visible';
          document.getElementById("ocultar6").style.visibility = 'visible';
          document.getElementById("ocultar7").style.visibility = 'visible';
          document.getElementById("ocultar8").style.visibility = 'visible';
          document.getElementById("ocultar9").style.visibility = 'visible';
          document.getElementById("ocultar10").style.visibility = 'visible';
          document.getElementById("ocultar11").style.visibility = 'visible';
          document.getElementById("ocultar12").style.visibility = 'visible';
          


        }else{
          console.log('NO imprimio', codig);
          document.getElementById("alerta").style.display = 'block';
          document.getElementById("ocultar").style.visibility = 'hidden';
          document.getElementById("ocultar2").style.visibility = 'hidden';
          document.getElementById("ocultar3").style.visibility = 'hidden';
          document.getElementById("ocultar4").style.visibility = 'hidden';
          document.getElementById("ocultar5").style.visibility = 'hidden';
          document.getElementById("ocultar6").style.visibility = 'hidden';
          document.getElementById("ocultar7").style.visibility = 'hidden';
          document.getElementById("ocultar8").style.visibility = 'hidden';
          document.getElementById("ocultar9").style.visibility = 'hidden';
          document.getElementById("ocultar10").style.visibility = 'hidden';
          document.getElementById("ocultar11").style.visibility = 'hidden';
          document.getElementById("ocultar12").style.visibility = 'hidden';
        }
        element.style.display='block';
        element = document.getElementById("search")
        element.style.display='none';
        let nro_revista = document.getElementById("revista").value
    }
    
  </script>
  <script>
    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          alert( "Form successful submitted!" );
        }
      });
      $('#quickForm').validate({
        rules: {
          codigo: {
            required: true,
          },
          // password: {
          //   required: true,
          //   minlength: 5
          // },
          // terms: {
          //   required: true
          // },
        },
        messages: {
          codigo: {
            required: "Por favor ingresa un codigo de autorización",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endsection