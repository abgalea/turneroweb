@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header bg-gradient-success">
          <h3 class="card-title">Orden Médica Electrónica - Control</h3>
        </div>
            <form action="/certificados" method="POST" id="quickForm" >
              <div class="card-body">
                @csrf
                

                <div class="form-group row" id="ocultar" >
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>DNI</label>
                      <input readonly type="text" class="form-control" name="orden" value="{{$afiliado->nro_doc}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Beneficiario</label>
                      <input readonly type="text" class="form-control"  value="{{$afiliado->nom_beneficiario}}" >
                    </div>
                  </div>
                </div>

               

                <div class="form-group row" id="ocultar2" >
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>CUIL Beneficiario</label>
                      <input readonly type="text" class="form-control" value="{{$afiliado->cuil_beneficiario}}" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Grupo Familiar</label>
                      <input readonly type="text" class="form-control" value="{{$afiliado->nro_gru_familiar}}">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Fecha Nac</label>
                      <input readonly type="date" class="form-control" value="{{$afiliado->nacimiento}}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Edad</label>
                      <input readonly type="text" class="form-control" value="{{$afiliado->edad}}">
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Localidad</label>
                      <input readonly type="text" class="form-control" value="{{$afiliado->localidad}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Estado</label>
                      <input readonly type="text" class="form-control" value="{{$afiliado->codigo_ingreso}}">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Plan</label>
                      <input readonly type="text" class="form-control" value="{{$afiliado->plan}}">
                    </div>
                  </div>
                </div>




                <hr>
                <h4>Datos de la Orden</h4>

                <div class="form-group row" id="ocultar3" >
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Fecha de Emisión</label>
                      <input required type="date" readonly class="form-control"  value="<?php echo  date('Y-m-d') ?>" name="fecha">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Fecha Vencimiento</label>
                      <input required type="date" readonly name="vencimiento" class="form-control" value="<?php echo  date('Y-m-d', strtotime('+1 month')); ?>">
                    </div>
                  </div>
                </div>
                
                
                

                
                
                

                <div class="form-group row" id="ocultar6" >
                  <label class="col-sm-4 col-form-label">Cantidad</label>
                  <div class="col-sm-8">
                  <input required type="number" class="form-control" name="cantidad" placeholder="Cantidad" aria-describedby="emailHelp">
                  </div>
                </div>
                <hr>
                <div class="form-group row" id="ocultar7" >
                  <label class="col-sm-4 col-form-label">Nombre Médico</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="medico" placeholder="nombre del médico">
                  </div>
                </div>

                <div class="form-group row" id="ocultar8" >
                  <label class="col-sm-4 col-form-label">Especialidad</label>
                  <div class="col-sm-8">
                  <input required type="text" class="form-control" name="especialista" placeholder="nombre de la especialidad. EJ. GINECÓLOGO">
                  </div>
                </div>

                <hr>

                
                

                
                
                <hr>
                <div class="form-group row" id="ocultar10" >
                  <div class="col-sm-12">
                    {{-- <input type="text" value="{{ auth()->user()->name }}" class="form-control" disabled> --}}
                  
                    <input type="hidden" class="form-control" value="{{ auth()->user()->id }}" name="user_id">
                    <input type="hidden" class="form-control" value="1" name="tipo_orden">
                    <input type="hidden" class="form-control" value="{{ $afiliado->nro_doc }}" name="id_afiliado">
                  </div>
                  <div class="card-footer" id="ocultar12" >
                
                
                
                
                    <div id="btnOrden" class="inline" >
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    
                </div>
                <hr>
                
                </div>
              <!-- /.card-body -->
              
              </div>
            </form>
          </div>
          
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        
        
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
  <script type="text/javascript">
  function mostrarBtn(){
    let e = document.getElementById('medio_pagos');
    console.log('cambio boton', e.value)
    // if(e.value == 1){
    //   document.getElementById("btnPago").style.visibility = 'hidden';
    //   document.getElementById("btnOrden").style.visibility = 'visible';
    // }else{
    //   document.getElementById("btnPago").style.visibility = 'visible';
    //   document.getElementById("btnOrden").style.visibility = 'hidden';
    // }
  }
    function mostrarbtnorden(){
      document.getElementById("btnOrden").style.visibility = 'visible';
      document.getElementById("btnPago").style.visibility = 'hidden';
    }
    function cambiar() {
      var e = document.getElementById("ddlViewBy");
      var practica = document.getElementById("practica");
      console.log('practica',practica)
      var strUser = e.value;
      console.log('valor',strUser)
      
      
      
    }

    function cambiarMonto() {
      var e = document.getElementById("elmonto");
      
      console.log('Precio',e.value)
      var strUser = e.value;
      if(e.value == 0)
      {
        document.getElementById("detalle").style.visibility = 'visible';
        document.getElementById("detalle_input").required = true;
      }else{
        document.getElementById("detalle").style.visibility = 'hidden';
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
          document.getElementById("ocultar13").style.visibility = 'visible';
          document.getElementById("ocultar14").style.visibility = 'visible';
          document.getElementById("ocultar15").style.visibility = 'visible';
          document.getElementById("ocultar16").style.visibility = 'visible';
          document.getElementById("ocultar17").style.visibility = 'visible';
          


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
          document.getElementById("ocultar13").style.visibility = 'hidden';
          document.getElementById("ocultar14").style.visibility = 'hidden';
          document.getElementById("ocultar15").style.visibility = 'hidden';
          document.getElementById("ocultar16").style.visibility = 'hidden';
          document.getElementById("ocultar17").style.visibility = 'hidden';
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
