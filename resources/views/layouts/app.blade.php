<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema Ingral Obra Social</title>

    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL ('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL('/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL('/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{URL('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{URL('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
  <link rel="icon" href="{{ asset('img/logo_bom.png')}}" sizes="32x32" />
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico')}}">

 



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                {{-- <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscador"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}

                <!-- Right navbar links -->
                
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                           
                            Usuario: {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                {{-- <div class="dropdown-divider"></div> --}}
                                        <a href="{{ route('usuarios.edit', Auth::user()->id) }}" class="dropdown-item">
                                            <i class="fas fa-user-circle"></i> Actualizar clave
                                            
                                        </a>
                                <div class="media">
                                    
                                    {{-- <div class="media-body"> --}}
                                        
                                        
                                    {{-- </div> --}}
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            <div class="dropdown-divider"></div>
                            {{-- <a href="#" class="dropdown-item"> --}}
                                <!-- Message Start -->
                                {{-- <div class="media">
                                    <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div> --}}
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            {{-- <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> --}}
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li> --}}
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset('/img/logo_meld_grande.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Grupo MELD</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> --}}
                        
                        {{-- <div class="image">
                            <img src="{{  $obj[0]["foto"] }}" class="img-circle elevation-2" alt="User Image">
                        </div> --}}
                        {{-- <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                
                                {{ $obj[0]["jerarquia"] }} {{ $obj[0]["apellido"] }}
                                {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a> 

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div> --}}
                    {{-- </div> --}}

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            


                            <li class="nav-item">
                                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('affiliates')}}"
                                    class="{{ Request::path() == 'affiliates' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Afiliados                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/listadoPracticas')}}"
                                    class="{{ Request::path() === 'listadoPracticas' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-hashtag"></i>
                                    <p>
                                        Prácticas                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('convenios')}}"
                                    class="{{ Request::path() === 'convenios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-handshake"></i>
                                    <p>
                                        Convenios                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ url('egresos')}}"
                                    class="{{ Request::path() === 'egresos' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                        Egresos                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('rendicion')}}"
                                    class="{{ Request::path() === 'rendicion' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                                    <p>
                                        Rendiciones                           
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>

                            @if ($usuario = Auth::user()->nivel != 'admin' || $usuario = Auth::user()->username == 'admin')
                            <li class="nav-item">
                                <a href="{{ url('reporteUsuario')}}"
                                    class="{{ Request::path() === 'reporteUsuario' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Reportes por Usuario                                      
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>
                            @endif

                            @if ($usuario = Auth::user()->nivel == 'admin')
                            <li class="nav-item">
                                <a href="{{ url('copagos')}}"
                                    class="{{ Request::path() === 'copagos' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                                    <p>
                                        Copagos                                      
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('rendicionUsuarios')}}"
                                    class="{{ Request::path() === 'rendicionUsuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                    <p>
                                        Rendiciones coseguro                                     
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('reporteCantidad')}}"
                                    class="{{ Request::path() === 'reporteCantidad' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-sort-amount-down"></i>
                                    <p>
                                        Cantidad por Afiliado                                     
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('limites')}}"
                                    class="{{ Request::path() === 'limites' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon far fa-folder-open"></i>
                                    <p>
                                        Limites                                     
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('reporte-fechas')}}"
                                    class="{{ Request::path() === 'reporte-fechas' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Reportes por fechas                                      
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>
                            

                            <div style="border-bottom: 1px dashed white"></div>
                            <li class="nav-item">
                                <a href="{{ url('usuarios')}}"
                                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Lista de Usuarios                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('register')}}"
                                    class="{{ Request::path() === 'register' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>
                                        Nuevo Usuario                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>

                            @endif
                            

                            

                           

                           

                            <li class="nav-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="{{ Request::path() === 'usuarios' ? 'nav-link ' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-user-lock"></i>
                                    <p>
                                        Salir
                                    </p>
                                </a>
                            </li>

                            

                            {{-- <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Notas<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="notas/todas"
                                            class="{{ Request::path() === 'notas/todas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Todas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="notas/favoritas"
                                            class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Favoritas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="notas/archivadas"
                                            class="{{ Request::path() === 'notas/archivadas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Archivadas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                Desarrollado por <b>MisioWEB</b> para el Grupo MELD Salud S.A.
                    <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0
                    </div>
            </footer>

            
        </div>
    </div>
<!-- jQuery -->
<script src="{{URL('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{URL('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{URL('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{URL('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{URL('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL('/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL('/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#reporte1").DataTable({
        dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excel',
      text: 'Bajar Excel <i class="fa fa-file-excel-o"></i>',
      className: 'btn btn-danger',
      filename: 'Reportes',
      exportOptions: {
        modifier: {
          page: 'all' } } },



      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#reporte').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Select2 -->
<script src="{{URL('/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $( ".select2-single" ).select2( {
				placeholder: 'Seleccionar una Opción',
				width: null,
				containerCssClass: ':all:'
			});
    });
    
   
  </script>



</body>
</html>