
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cliente DNI: {{$dni}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link href="{{URL('/css/styles.css')}}" rel="stylesheet" type="text/css" media="screen" />
 <link href="{{URL('/css/responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />	
</head>
<body> 
   <div class="hero-web">
    <div class="logo">
      <img src="{{URL('images/logo.png')}}">
    </div>
    {{-- <div class="select">
       <h2>Hola :)</h2>
       <p>Por favor seleccioná tu opción</p>
    </div>    --}}
    @foreach ($categorias as $categoria)
        <div class="web">
            <button class="btn secundary" onclick="location.href='login.html'">{{ $categoria->btn_totem }}</button>
        </div>
    @endforeach
       
    <footer>
      <h2><span>© 2019, </span>Desarrollado por www.misioweb.com</h2>
    </footer>  
  </div>
 </body>
</html>