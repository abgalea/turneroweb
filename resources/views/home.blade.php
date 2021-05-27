@extends('layouts.app')

@section('content')
<div class="container">
    
    

    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-blue">
            Laboratorios CEBAC 
        </div>
        <img src="/img/cebac.svg" class="card-img-top" alt="...">
      </div>
      {{-- <img src="/img/banner.png" class="img-fluid" alt="..."> --}}
      {{-- <div class="form-inline">
        <form class="form-inline ml-3" action="affiliates">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control" name="search" type="search" placeholder="Buscar DNI" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
        </form>
      </div> --}}
      
        <div class="row">
            @if ($nivel ?? '')
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>00</h3>
  
                  <p>Afiliados en Misiones</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="/affiliates?search=Misiones" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>00</h3>
  
                  <p>Afiliados en Formosa</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="/affiliates?search=Formosa" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3></h3>
  
                  <p>Afiliados en OSPTA</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="/affiliates?search=Formosa" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3></h3>
  
                  <p>Cant orden mes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <a href="/egresos" class="btn btn-warning btn-lg btn-block">Cargar Egresos (Gastos)</a>
            <a href="/rendicion" class="btn btn-success btn-lg btn-block">Cargar Rendiciones</a>
            @if ($nivel == 'admin')
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Ordenes generadas por usuarios en el mes en curso</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Usuario</th>
                        <th>Localidad</th>
                        <th style="width: 40px">Cantidad</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      
                      
                      
                    </tbody>
                  </table>
                </div>
                
              </div>
  
              
            </div>
            @endif
            
              @endif
              
          </div>
          
        
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dirección Bomberos - Policía de la Provincia de Misiones - Ministerio de Gobierno</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <img src='/img/logo_bom.jpg' class="ml-3" />
            <img src='/img/logo_polmis.jpg'class="ml-3" />
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
