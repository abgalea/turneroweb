
<html>
	<head>
		<meta charset="utf-8">
		<title>Orden de Consulta</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.css" >
		
		<style type="text/css" media="all">
		/* #watermark {
                position: fixed;
                bottom:   0px;
                left:     0px;
                width:    21.8cm;
                height:   28cm;
		        z-index:  -1000;
				opacity: 0.10;
            } */
		
/* content editable */

*[contenteditable] { border-radius: 0; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, 
*[contenteditable]:focus, 
td:hover *[contenteditable], 
td:focus *[contenteditable], 
	 

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate;  }
th, td { padding: 0 0 0 0; position: relative; text-align: left; }
/*th, td { border-radius: 0.25em; border-style: solid; }*/
th { background: #EEE; border-color: #BBB; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 1px; overflow: hidden; padding: 0.5in; width: 7.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 0; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: rgb(216, 216, 216); border-radius: 0.25em; color: rgb(0, 0, 0); margin: 0 0 1em; padding: 0.2em 0; }
header address { float: left; font-size: 100%; font-weight: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0; }
header fechas { float: right; font-size: 90%; font-weight: normal; line-height: 1; margin: 0 0 0 0; }
header fechas p { margin: 0 -20px 0; }
header span, header img { display: flex; float: left; }
header span { margin: 10px 0 0 0; max-height: 20%; max-width: 40%; }
header img { max-height: 100%; max-width: 50%; }


/* article */



article address { font-size: 100%; font-weight: normal; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 0; }
aside h1 {  border-bottom-style: solid; }

feImage {position: relative;}

/* javascript */





tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	
}

@page { margin: 0; }
</style>
	</head>
	<body>
    {{-- <div id="watermark">
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			<h1>ESTA ORDEN ES DE PRUEBA</h1>
            <h1>ESTA ORDEN NO ES NEGOCIABLE</h1>
			
			
        </div> --}}
		<header>
			{{-- <img class="" src="data:image/png;base64,{{base64_encode($contents)}}"> --}}
			<h1>Orden de COnsulta </h1>
			<address contenteditable>
				<p>GRUPO MELD SALUD S.A.</p>
				<p>Sistema de emisión de órdenes</p>
				{{-- <p><img width="250px" src="{{URL('/img/logo_orden.jpg')}}"></p> --}}
				@if ($afiliado->plan == 'GRUPO MELD SALUD MISIONES')
					{{-- <td><img src='{{URL('/img/ospta_meld.jpg')}}' width="20%" /></td> --}}
					<p><img width="350px" src="{{URL('/img/ospta_meld_106.jpg')}}"></p>
				@else
					<p><img width="350px" src="{{URL('/img/banner.jpg')}}"></p>
				@endif
				
				
			</address>
			<fechas style="margin: 10 50px 0 0" >
				
				<p  >ORDEN NRO: {{$orden->id}}<br>
					EMISIÓN: {{date('d/m/Y H:s', strtotime($orden->created_at))}}<br>
				VENCIMIENTO: {{date('d/m/Y', strtotime($orden->vencimiento))}}</p>
				
			</fechas>
     
			
		</header><br>
		<br>
		<br>
		<hr style="border: double 0.5px; margin: 0px;  ">
		<article>
			<address contenteditable>
				<table class="table" style="padding: 1px 0px; font-size: x-small;" >
				  <thead >
				    <tr>
				      <th colspan="2">Afiliado: {{$afiliado->nom_beneficiario}} </th>
				      <th scope="col">DNI: {{$afiliado->nro_doc}}</th>
				      <th scope="col">-- {{$afiliado->tipo_familia}}</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="col">EDAD: {{$afiliado->edad}}</th>
				      <th scope="col">FECHA NAC.: {{$afiliado->nacimiento}}</th>
				      <th scope="col">SEXO: {{$afiliado->sexo}}</th>
					  <th scope="col">CARNET: {{$afiliado->credencial}}</th>
				    </tr>
				  </tbody>
				</table>
				    
				</div>
			</address>
			<br>
			<br>
			<article>
			<div  style="margin: -10px;">
				<table class="table table-borderless" style="margin: 0 0 -5px 20px;">
					<tr><td><span>EFECTOR:</span></td></tr>
					<tr><td><span>PROFESIONAL:</span> {{$orden->medico}}</td></tr>
					<tr><td><span>ESPECIALIDAD:</span> {{$orden->especialista}}</td></tr>
				</table>
				<br>
				
				<br>
				<table class="table table-borderless" style="margin: 0 0 -10px 20px; border-top: solid 1px; border-bottom: solid 1px;">
					<tr>
						<td><span><b>PRESTACIÓN</b></span></td>
						<td><span></span></td>
						<td><span><b>CANTIDAD</b></span></td>
					</tr>
					{{-- <tr>
						<td colspan="2"><span>{{$orden->practicas->practica}}</span>  <span>asd </span></td>
						<td><span>{{$orden->cantidad}}</span></td>
					</tr> --}}
					
					@foreach ($practicas_solicitadas as $practica_solicitada)
					<tr>
						<td colspan="2"><span>{{\Illuminate\Support\Str::limit($practica_solicitada->detalle, 150, $end = '...')}}</span></td>
						<td><span>{{$orden->cantidad}}</span></td>
					</tr>    
                    @endforeach
				</table>
				
			</div>
			</article>
			<br>
			<br>
      <br>
			<article>
				DIAGNOSTICO: 
			</article>
			<br>
			<br>
      <br>
			<table style="padding-top: 10px;">
				<tr>
					<td><div style="width:90px ;font-size: 10px; border-top-style: solid; margin-left:20em;  ">FIRMA Profesional</div></td>
					<td><div style="width:90px ;font-size: 10px; border-top-style: solid;   ">FIRMA Afiliado</div></td>
				</tr>
			</table>
			<br>
			<hr style="border-top: dashed 2px;" />
			
			<header>
				<h1>recetario</h1>
				<address >
					<p>GRUPO MELD SALUD S.A.</p>
					<p>Sistema de emisión de órdenes</p>
					@if ($afiliado->plan == 'GRUPO MELD SALUD MISIONES')
						{{-- <td><img src='{{URL('/img/ospta_meld.jpg')}}' width="20%" /></td> --}}
						<p><img width="350px" src="{{URL('/img/ospta_meld_106.jpg')}}"></p>
					@else
						<p><img width="350px" src="{{URL('/img/banner.jpg')}}"></p>
					@endif
					{{-- <p><img width="350px" src="{{URL('/img/banner.jpg')}}"></p> --}}
				</address>
				<fechas style="margin: 10 50px 0 0" >
					<p  >ORDEN NRO: {{$orden->id}}<br>
					EMISIÓN: {{date('d/m/Y H:s', strtotime($orden->created_at))}}<br>
					VENCIMIENTO: {{date('d/m/Y', strtotime($orden->vencimiento))}}</p>
				</fechas>
				
			</header><br>
			<br>
			<br>
			<hr style="border: double 0.5px; margin: 0px;  ">
			<article>
				<address contenteditable>
			<table class="table" style="padding: 1px 0px; font-size: x-small;" >
            <thead >
              <tr>
                <th colspan="2">Afiliado: {{$afiliado->nom_beneficiario}} </th>
                <th scope="col">DNI: {{$afiliado->nro_doc}}</th>
                <th scope="col">-- {{$afiliado->tipo_familia}}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="col">EDAD: {{$afiliado->edad}}</th>
                <th scope="col">FECHA NAC.: {{$afiliado->nacimiento}}</th>
                <th scope="col">SEXO: {{$afiliado->sexo}}</th>
				<th scope="col">CARNET: {{$afiliado->credencial}}</th>
              </tr>
            </tbody>
          </table>
		  <br>
		  <table class="table ">
			<thead>
			  <tr>
				<th scope="col">CANTIDAD</th>
				<th scope="col">MEDICAMENTO</th>
				<th scope="col">TROQUELES</th>
				<th scope="col">IMPORTE</th>
			  </tr>
			</thead>
			<tbody>
				<tr>
					<th scope="col"><br><br><br><br></th>
					<th scope="col"><br><br><br><br></th>
					<th scope="col"><br><br><br><br></th>
					<th scope="col"><br><br><br><br></th>
				</tr>
				<tr>
				<th scope="col"><br><br><br><br></th>
				<th scope="col"><br><br><br><br></th>
				<th scope="col"><br><br><br><br></th>
				<th scope="col"><br><br><br><br></th>
				</tr>
			  
			</tbody>
		  </table>
						
					</div>
				</address>
				<br>
        		<br>
				<br>
				<article>
					DIAGNOSTICO: 
				</article>
				<table style="border-bottom:  dashed 1px">
					<tr>
						<td><div style="width:90px ;font-size: 10px; border-top-style: solid; margin-left:20em;  ">FIRMA Profesional</div></td>
						<td><div style="width:90px ;font-size: 10px; border-top-style: solid;   ">FIRMA Afiliado</div></td>
					</tr>
				</table>
				<div style="font-size: 8px; opacity: 0.80; ">
					Coseguro: $ {{$orden->precio}} | 
					Forma Pago: {{$orden->medio_pago->nombre}} | 
					Usuario: {{$vendedor->name}}
					
				</div>
				
				

			
	</article> 
	</body>
</html>
