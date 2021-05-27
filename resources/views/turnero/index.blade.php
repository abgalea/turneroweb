@php
//session_start(); 
// $sucursal = $_GET['sucursal'];
// $codigo = 0;
// include 'conexion.php';
// $sql="SELECT * FROM sucursales WHERE id='".$sucursal."'";
// $result=mysqli_query($db, $sql);
//     while ($row=mysqli_fetch_array($result)) {
//         $nombreSUC = $row['nombre'];
//         $codigo = $row['codigo'];
//     }
// mysqli_close($db);

// almacenamos el num de totem de la sucursal
    //   if($_GET['totem'] > 0){
    //       $_SESSION["totem"] = $_GET['totem'];
    //   }
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>turnero Sucursal: {{$datos_suc->detalle}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link href="{{URL('/css/styles.css')}}" rel="stylesheet" type="text/css" media="screen" />
 <link href="{{URL('css/responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />	
 <META HTTP-EQUIV="REFRESH" CONTENT="60;URL=/turnero/{{ $sucursal }}/{{$totem}}">
</head>
<body> 

  <script type="text/javascript">
      function borrar() {
        document.getElementById("dni_cliente").value = "";
      }

      function number(ch) {
      document.getElementById("dni_cliente").value += ch;
      }

      function enviar() {

        dni = document.getElementById("dni_cliente").value;

      if (dni.length < 7) {
            document.getElementById("dni_cliente").value = "";
            document.getElementById("dni_cliente").placeholder = "Mínimo 7 dígitos";
      }
      else{
            document.getElementById("btn_continuar").innerHTML = "Buscando ...";
            document.getElementById("btn_continuar").disabled = true;
            // location.href='/sucursal='+document.getElementById("sucursal").value+'&dni='+document.getElementById("dni_cliente").value;
            location.href='/llamador/'+document.getElementById("sucursal").value+'/'+document.getElementById("dni_cliente").value+'/'+document.getElementById("totem").value;


            }
      }

      function cuit() {
        document.getElementById("dni_cliente").placeholder = "Ingrese su CUIT";
      }

      function dni() {
        document.getElementById("dni_cliente").placeholder = "Ingrese su DNI";
      }

      
    </script>

   <div class="hero">
    <div class="logo">
      <img src="{{URL('/img/cebac.svg')}}">
    </div>
    
    {{-- @if ($codigo != '0'){ --}}
    <h2 class="title">¡Hola, gracias por visitarnos! </h2>
    <div class="dni"> 
       <input class="number-dni" type="text" name="dni" placeholder="Ingresá tu DNI ó CUIT" id="dni_cliente" value="">
       <input type="hidden" id="sucursal" name="sucursal" value="{{$sucursal}}">
       <input type="hidden" id="totem" name="totem" value="{{$totem}}">
       <div class="key">
          <div class="key-number">
            <button class="one" id="one" onclick="number(1)">1</button>
            <button class="two" id="two" onclick="number(2)">2</button>
            <button class="three" id="three" onclick="number(3)">3</button>
            <button class="four" id="four" onclick="number(4)">4</button>
            <button class="five" id="five" onclick="number(5)">5</button>
            <button class="six" id="six" onclick="number(6)">6</button>
            <button class="seven" id="seven" onclick="number(7)">7</button>
            <button class="eight" id="eight" onclick="number(8)">8</button>
            <button class="nine" id="nine" onclick="number(9)">9</button>
            <button class="zero" id="zero" onclick="number(0)">0</button> 
            <button class="delete" id="delete" onclick="borrar()">borrar</button>
          </div>  
        </div>
        <!-- <div class="button-dni">  
            <button class="btn secundary" onclick="dni()">DNI</button>
        </div>
        <div class="button-cuit">  
            <button class="btn secundary" onclick="cuit()">CUIT</button>
        </div> -->
        <div class="button-continue">  
            <button id="btn_continuar" class="btn primary" onclick="enviar()">Continuar</button>
        </div>
        <!-- <div class="button-return">  
            <button class="btn primary" onclick="location.href='login.php'">Volver</button>
        </div>   -->     
    </div>
    
    <footer>
      <h2><span>© {{date('Y')}}, </span>Desarrollado por www.misioweb.com - Suc:{{$sucursal}} - T{{$totem}}</h2>
    </footer> 
  </div>
 </body>
</html>