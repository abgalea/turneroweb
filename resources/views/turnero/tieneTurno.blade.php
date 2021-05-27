<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Bienvenidos {{$totem}} </title>
    <style>
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color:#df040b;
          color: white;
          text-align: center;
        }
    </style>
    <META HTTP-EQUIV="REFRESH" CONTENT="40;URL=/turnero/{{ $sucursal }}/{{$totem}}">
  </head>
  <body class="d-flex flex-column h-100">
    <nav class="navbar navbar-light" style="background-color: #df040b;">
        <div class="container-fluid">
            <a class="navbar-brand" >
              <img src="{{URL('images/logo.png')}}" alt="" width="300" class="d-inline-block align-text-top">
              {{-- aca puede ir un texto --}}
            </a>
          </div>
    </nav>
        
        <div class="card text-center">
            <div class="card-header">
              Bienvenidos
            </div>
            <div class="card-body">
                <h1 class="card-title" style="font-size: 80px;">Ud. ya cuenta con un turno</h1>
                <h1 class="card-title" style="font-size: 60px; color:red">TICKET: {{$turnos->cat->letra}}{{$turnos->numero}} ({{$turnos->cat->nombre}})</h1>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <div class="row"></div>
                    
                        
                    <a class="btn btn-danger btn-lg" role="button" aria-pressed="true"> 
                        <h1>PEDIR NUEVO</h1>
                    </a>
                    <a class="btn btn-danger btn-lg" role="button" aria-pressed="true" href="/turnero/{{$sucursal}}/{{$totem}} "> 
                        <h1>SEGUIR ESPERANDO</h1>
                    </a>
                            
                   
                    
                    
                </div>
            </div>
            
          </div>
  
    

    <div class="footer">
        <p><h2><span>© {{date('Y')}}, </span>Desarrollado por www.misioweb.com</h2></p>
      </div>
    
     
  </body>
</html>