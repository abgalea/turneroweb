<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ticket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="{{URL('/css/styles.css')}}" rel="stylesheet" type="text/css" media="screen" />
  <link href="{{URL('css/responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />	
  <META HTTP-EQUIV="REFRESH" CONTENT="60;URL=/turnero/{{ $sucursal }}/{{$totem}}">
</head>
<body> 
   <div class="hero-registry">
    <div class="logo">
        <img src="{{URL('images/logo.png')}}" alt="" width="300" class="d-inline-block align-text-top">
    </div>
    <div class="title-registry">  
        <h2><span class="ticket__title">Imprimiendo su ticket, espere un momento</span></h2>
     <div class="ticket-print">
        <h2>{{$turnos->cat->letra}}{{$turnos->numero}}</h2>
     </div>
    </div>
     <div class="ticket">
        <button class="btn primary">Retire su ticket</button>
     </div>
    <footer>
      <h2><span>© <?php echo date('Y'); ?>, </span>Desarrollado por www.misioweb.com</h2>
    </footer>   
  </div>
 </body>
</html>