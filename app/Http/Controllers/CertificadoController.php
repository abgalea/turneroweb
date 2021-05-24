<?php

namespace App\Http\Controllers;

use App\Certificados;
use App\Orden;
use App\Practica;
use App\PracticaOrden;
use App\User;

use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CertificadoController extends Controller
{

    public function reporte2(Request $request)
    {
       

        return view('certificados.fechas2');


    }

    public function exitoso()
    {
       

        return view('certificados.exitoso');


    }

    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        $localidad = trim($request->get('localidad'));
        $porVencer = trim($request->get('porVencer'));
        
        
        if (Auth::user()->nivel == 'cargador' AND Auth::user()->dependencia != 'Dir. Bros.'){
            $certificados = Certificados::where('localidad', 'LIKE', Auth::user()->localidad)
            ->where('dependencia','LIKE',Auth::user()->dependencia)
             ->orderBy('id', 'desc')
             ->paginate(100);
             return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        }
        
        if (Auth::user()->nivel == 'supervisor'){
            $certificados = Certificados::where('dependencia','LIKE',Auth::user()->dependencia)
             ->orderBy('id', 'desc')
             ->paginate(100);
             return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        }

        

        if (Auth::user()->nivel == 'admin'){
            if ($localidad != ''){
                $certificados = Certificados::where('localidad', 'LIKE', "%$localidad%")
                ->orderBy('id', 'desc')
                ->paginate(100);
            }else{
                $certificados = Certificados::where('localidad', 'LIKE', "%$localidad%")
                ->orWhere('nro_certificado','LIKE',"%$query%")
                ->orWhere('nombre_comerciante','LIKE',"%$query%")
                ->orWhere('nombre_comercio','LIKE',"%$query%")
                ->orWhere('observaciones','LIKE',"%$query%")
                ->orWhere('localidad','LIKE',"%$query%")
                ->orWhere('dependencia','LIKE',"%$query%")
                ->orWhere('usuario','LIKE',"%$query%")
                ->orderBy('id', 'desc')
                ->paginate(100);
            }
            if($porVencer == '1'){
                $desdevencimiento = date('Y-m-d');
                $hastavencimiento = date( "Y-m-d", strtotime( "$desdevencimiento + 7 day"));
                $certificados = Certificados::whereBetween('hasta', [$desdevencimiento, $hastavencimiento])
                ->orderBy('id', 'desc')
                ->paginate(100);
            }
             $nivel = Auth::user()->nivel;
             return view('certificados.index', ['certificados' => $certificados, 'search' => $query, 'nivel' => $nivel, 'localidad' => $localidad]);
        }

        if (Auth::user()->dependencia == 'Dir. Bros.'){
            if ($localidad != ''){
                $certificados = Certificados::where('localidad', 'LIKE', "%$localidad%")
                ->orderBy('id', 'desc')
                ->paginate(100);
            }else{
                $certificados = Certificados::where('localidad', 'LIKE', "%$localidad%")
                ->orWhere('nro_certificado','LIKE',"%$query%")
                ->orWhere('nombre_comerciante','LIKE',"%$query%")
                ->orWhere('nombre_comercio','LIKE',"%$query%")
                ->orWhere('observaciones','LIKE',"%$query%")
                ->orWhere('localidad','LIKE',"%$query%")
                ->orWhere('dependencia','LIKE',"%$query%")
                ->orWhere('usuario','LIKE',"%$query%")
                ->orderBy('id', 'desc')
                ->paginate(100);
            }
            if($porVencer == '1'){
                $desdevencimiento = date('Y-m-d');
                $hastavencimiento = date( "Y-m-d", strtotime( "$desdevencimiento + 7 day"));
                $certificados = Certificados::whereBetween('hasta', [$desdevencimiento, $hastavencimiento])
                ->orderBy('id', 'desc')
                ->paginate(100);
            }
             $nivel = Auth::user()->nivel;
             return view('certificados.index', ['certificados' => $certificados, 'search' => $query, 'nivel' => $nivel, 'localidad' => $localidad]);
        }

        
        
        // if ($request){
        //     $certificados = Certificados::where('usuario', '=', Auth::user()->username)
        //     ->orWhere('nro_certificado','LIKE',"%$query%")
        //     ->orWhere('nombre_comerciante','LIKE',"%$query%")
        //     ->orWhere('nombre_comercio','LIKE',"%$query%")
        //     ->orWhere('observaciones','LIKE',"%$query%")
        //     ->where('usuario', '=', Auth::user()->username)
        //     ->orderBy('id', 'desc')
        //     ->paginate(5);
        //     return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        // }
        // $certificados = Certificados::all();
        // return view('certificados.index', ['certificados' => $certificados]);
    }

    
    public function create()
    {
        return view('certificados.create');
    }
    public function reporte1(Request $request)
    {
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $usuario = $request->get('usuario');

        // $usuarios = Orden::all();
        $desde = $request->get('desde');
        if ($desde == null) {
            $desde = date('Y-m-01');
        }
        $hasta = $request->get('hasta');
        if ($hasta == null) {
            $hasta = date('Y-m-30');
        }

        $usuarios = Orden::whereBetween('fecha', [$desde, $hasta])
        ->get();
        
        
          
        return view('certificados.fechas', ['usuarios'=>$usuarios, 'desde'=> $desde, 'hasta'=>$hasta]);
    }

    

    
    public function store(Request $request)
    {
            //  dd($request);
             if($request->tipo_orden == 4){
                //   dd($request -> all());
                $orden = new Orden();
                $orden->fecha = $request->input('fecha');
                $orden->vencimiento = $request->input('vencimiento');
                $orden->estado = 1;
                $orden->copago_id = 1;
                $orden->medio_pagos_id = 1;
                $orden->users_id = $request->input('user_id');
                $orden->nro_doc = $request->input('id_afiliado');
                $orden->cantidad = 1;
                $orden->precio = 0;
                $orden->detalle = $request->input('detalle');
                // $orden->medico = $request->input('medico');
                // $orden->especialista = $request->input('especialista');
                $orden->tipo_orden = $request->tipo_orden;
                $orden->save();
                $idRecienGuardada = $orden->id;
                

                return redirect('/imprimir/'.$idRecienGuardada);
            }


            if($request->tipo_orden == 1){
                //  dd($request -> all());
                $orden = new Orden();
                $orden->fecha = $request->input('fecha');
                $orden->vencimiento = $request->input('vencimiento');
                $orden->estado = 1;
                $orden->copago_id = $request->input('copago');
                $orden->medio_pagos_id = $request->input('medio_pagos');
                $orden->users_id = $request->input('user_id');
                $orden->nro_doc = $request->input('id_afiliado');
                $orden->cantidad = $request->input('cantidad');
                $orden->precio = $request->input('precio');
                $orden->detalle = $request->input('detalle');
                $orden->medico = $request->input('medico');
                $orden->especialista = $request->input('especialista');
                $orden->tipo_orden = $request->tipo_orden;
                $orden->save();
                $idRecienGuardada = $orden->id;
                $practicas = new PracticaOrden();
                $practicas->ordene_id = $idRecienGuardada;
                $practicas->practica_id = $request->input('nomenclador');
                $detalle = Practica::where('id', $practicas->practica_id)->firstOrFail();
                $practicas->detalle = $detalle->codigo.' - '.$detalle->grupo.' - '.$detalle->practica;
                $practicas->save();
            }else{
                // dd($request);
                $orden = new Orden();
                $orden->fecha = $request->input('fecha');
                $orden->vencimiento = $request->input('vencimiento');
                $orden->estado = 1;
                $orden->copago_id = $request->input('copago');
                $orden->medio_pagos_id = $request->input('medio_pagos');
                $orden->users_id = $request->input('user_id');
                $orden->nro_doc = $request->input('id_afiliado');
                $orden->cantidad = $request->input('cantidad');
                $orden->tipo_orden = $request->input('tipo_orden');
                $orden->precio = $request->input('precio');
                $orden->detalle = $request->input('detalle');
                $orden->medico = $request->input('medico');
                $orden->especialista = $request->input('especialista');
                $orden->save();
                $idRecienGuardada = $orden->id;
                $investidura_id = $request->input('practica');
                // dd($investidura_id);
                $cont= 0;
                while($cont < count($investidura_id)){
                   
                    
                    $practicas = new PracticaOrden();
                    $practicas->ordene_id = $idRecienGuardada;
                    $practicas->practica_id = $investidura_id[$cont];
                    $detalle = Practica::where('id', $practicas->practica_id)->firstOrFail();
                    $practicas->detalle = $detalle->codigo.' - '.$detalle->grupo.' - '.$detalle->practica;
                    $practicas->save();
                
                    $cont=$cont + 1;
                }
            }

            // if($request->tipo_orden == 3){
            //     //  dd($request -> all());
            //     $orden = new Orden();
            //     $orden->fecha = $request->input('fecha');
            //     $orden->vencimiento = $request->input('vencimiento');
            //     $orden->estado = 1;
            //     $orden->copago_id = $request->input('copago');
            //     $orden->medio_pagos_id = $request->input('medio_pagos');
            //     $orden->users_id = $request->input('user_id');
            //     $orden->nro_doc = $request->input('id_afiliado');
            //     $orden->cantidad = $request->input('cantidad');
            //     $orden->precio = $request->input('precio');
            //     $orden->detalle = $request->input('detalle');
            //     $orden->medico = $request->input('medico');
            //     $orden->especialista = $request->input('especialista');
            //     $orden->tipo_orden = $request->tipo_orden;
            //     $orden->save();
            //     $idRecienGuardada = $orden->id;
            //     $practicas = new PracticaOrden();
            //     $practicas->ordene_id = $idRecienGuardada;
            //     $practicas->practica_id = $request->input('nomenclador');
            //     $detalle = Practica::where('id', $practicas->practica_id)->firstOrFail();
            //     $practicas->detalle = $detalle->codigo.' - '.$detalle->grupo.' - '.$detalle->practica;
            //     $practicas->save();
            // }
            
            
            

            // $certificado->save();
            // $idRecienGuardada = $certificado->id;
            // # Y podemos obtener cualquier propiedad, pues está refrescado
            // # Aquí ya puedes hacer lo que quieras con el id
            // // echo json_encode($certificado);
              return redirect('/imprimir/'.$idRecienGuardada);
    }

    
    public function show($id)
    {
        return view('certificados.show', ['certificados'=>Certificados::findOrFail($id)]);
    }

    public function ver($id)
    {
        return view('certificados.ver', ['certificados'=>Certificados::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('certificados.edit', ['certificados'=>Certificados::findOrFail($id)]);
    }

  
    public function update(Request $request, $id)
    {
        //  dd($request);

         if ($request->tipo_edicion == 1) {
            $anular = Orden::findOrFail($id);
            $anular->anular = $request->get('anular');
            $anular->motivo = $request->get('motivo');
            $anular->update();
            return redirect('/reporteUsuario');
        }
        // print_r($request -> all());
        // $certificado = Certificados::findOrFail($id);
        // $certificado->orden = $request->get('orden');
        // $certificado->fecha = $request->get('fecha');
        // $certificado->desde = $request->get('desde');
        // $certificado->hasta = $request->get('hasta');
        // $certificado->localidad = $request->get('localidad');
        // $certificado->dependencia = $request->get('dependencia');
        // $certificado->nombre_comerciante = $request->get('nombre_comerciante');
        // $certificado->telefono_contacto = $request->get('telefono_contacto');
        // $certificado->correo_contacto = $request->get('correo_contacto');
        // $certificado->nombre_comercio = $request->get('nombre_comercio');
        // $certificado->rubro = $request->get('rubro');
        // $certificado->direccion = $request->get('direccion');
        // $certificado->observaciones = $request->get('observaciones');
        // $certificado->previa = $request->get('previa');
        // $certificado->usuario = $request->get('usuario');

        // $certificado->update();
        // // echo json_encode($certificado);
        // return redirect('/certificados');
    }

    
    public function destroy($id)
    {
        $certificado = Certificados::findOrFail($id);
        $certificado->delete();

        return redirect('/certificados');
    }

    public function reporteUsuario(Request $request)
    {
        $desde = $request->get('desde');
        if ($desde == null) {
            $desde = date('Y-m-01');
        }
        $hasta = $request->get('hasta');
        if ($hasta == null) {
            $hasta = date('Y-m-30');
        }
        $usuario = Auth::user()->id;

        $usuarios = Orden::where('users_id', '=', $usuario)
        ->whereBetween('fecha', [$desde, $hasta])
        ->get();

        // $rendicion = DB::select("SELECT SUM(copagos.precio) as monto, ordenes.users_id, users.name, users.localidad 
        //     FROM ordenes 
        //     JOIN copagos ON copagos.id = ordenes.copago_id 
        //     JOIN users ON users.id = ordenes.users_id 
        //     WHERE ordenes.users_id = $usuario AND fecha BETWEEN '$desde' AND '$hasta' 
        //     GROUP BY users_id");
        //     if ($rendicion) {
        //         foreach ($rendicion as $monto){
        //             $renidr = $monto->monto;
        //         }
        //     }else{
        //         $renidr = 0;
        //     }
            
            
        $rendicion = DB::select("SELECT SUM(ordenes.precio) as monto, ordenes.users_id, users.name, users.localidad 
            FROM ordenes 
            JOIN copagos ON copagos.id = ordenes.copago_id 
            JOIN users ON users.id = ordenes.users_id 
            WHERE ordenes.users_id = $usuario AND fecha BETWEEN '$desde' AND '$hasta' 
            AND medio_pagos_id = 1
            AND anular is null
            GROUP BY users_id");
            if ($rendicion) {
                foreach ($rendicion as $monto){
                    $renidr = $monto->monto;
                }
            }else{
                $renidr = 0;
            }

        $egresos = DB::select(" SELECT SUM(egresos.monto) as monto, egresos.user_id, users.name, users.localidad 
        FROM egresos 
        JOIN users ON users.id = egresos.user_id 
        WHERE egresos.user_id = $usuario AND fecha BETWEEN '$desde' AND '$hasta'
        GROUP BY user_id");
        if ($egresos) {
            foreach ($egresos as $egreso){
                $gastado = $egreso->monto;
            }
        }else{
            $gastado = 0;
        }

        
        $rendicion = DB::select("SELECT SUM(ordenes.precio) as monto, ordenes.users_id, users.name, users.localidad 
            FROM ordenes 
            JOIN copagos ON copagos.id = ordenes.copago_id 
            JOIN users ON users.id = ordenes.users_id 
            WHERE ordenes.users_id = $usuario AND fecha BETWEEN '$desde' AND '$hasta' 
            AND medio_pagos_id = 3
            AND anular is null
            GROUP BY users_id");
            if ($rendicion) {
                foreach ($rendicion as $monto){
                    $electronico = $monto->monto;
                }
            }else{
                $electronico = 0;
            }

        $rendido = DB::select("SELECT SUM(rendicion.monto) as monto, rendicion.users_id, users.name, users.localidad 
            FROM rendicion 
            JOIN users ON users.id = rendicion.users_id 
            WHERE rendicion.users_id = $usuario AND fecha BETWEEN '$desde' AND '$hasta' 
            GROUP BY users_id");
            if ($rendido) {
                foreach ($rendido as $monto){
                    $rendidos = $monto->monto;
                }
            }else{
                $rendidos = 0;
            }

            $subtotal = $electronico + $rendidos;
            $deuda = $electronico + $renidr;
            $saldo = $deuda - $gastado - $rendidos;
        

        return view('certificados.reporteUsuario', ['usuarios'=>$usuarios, 'desde'=>$desde, 'hasta'=>$hasta, 'monto'=>$renidr, 'electronico'=>$electronico, 'rendidos'=>$rendidos, 'subtotal'=>$subtotal, 'saldo'=>$saldo, 'gastado'=>$gastado]);
    }
    public function reporteCantidad(Request $request)
    {
        $desde = $request->get('desde');
        if ($desde == null) {
            $desde = date('Y-m-01');
        }
        $hasta = $request->get('hasta');
        if ($hasta == null) {
            $hasta = date('Y-m-30');
        }
        $usuario = Auth::user()->id;
       
            
        $rendicion = DB::select("SELECT COUNT(*) AS cantidades , ordenes.nro_doc, afiliado.nom_beneficiario, ordenes.tipo_orden, limites.nombre
        FROM ordenes
        JOIN afiliado ON afiliado.nro_doc = ordenes.nro_doc
        JOIN limites ON limites.id = ordenes.tipo_orden
        WHERE fecha BETWEEN '$desde' AND '$hasta'
        AND anular is null
        GROUP by nro_doc, tipo_orden
        ORDER BY cantidades DESC");

        $total = Orden::whereBetween('fecha', [$desde, $hasta])
        ->get();
        
            
        

        return view('certificados.reporteCantidad', ['usuarios'=>$rendicion, 'desde'=>$desde, 'hasta'=>$hasta, 'total'=>$total]);
    }
    public function rendicionUsuarios(Request $request)
    {
        $desde = $request->get('desde');
        if ($desde == null) {
            $desde = date('Y-m-01');
        }
        $hasta = $request->get('hasta');
        if ($hasta == null) {
            $hasta = date('Y-m-30');
        }
        $usuario = $request->get('usuario');
        // if ($usuario == null) {
        //     $users = DB::select("SELECT SUM(copagos.precio) as monto, ordenes.users_id, users.name, users.localidad 
        //     FROM ordenes 
        //     JOIN copagos ON copagos.id = ordenes.copago_id 
        //     JOIN users ON users.id = ordenes.users_id 
        //     WHERE fecha BETWEEN '$desde' AND '$hasta' 
        //     GROUP BY users_id");
        // }else{
        //     $users = DB::select("SELECT SUM(copagos.precio) as monto, ordenes.users_id, users.name, users.localidad 
        //     FROM ordenes 
        //     JOIN copagos ON copagos.id = ordenes.copago_id 
        //     JOIN users ON users.id = ordenes.users_id 
        //     WHERE ordenes.users_id = $usuario AND fecha BETWEEN '$desde' AND '$hasta' 
        //     GROUP BY users_id");
        // }



        // SELECT SUM(ordenes.precio) as monto, ordenes.users_id, users.name, users.localidad, ordenes.medio_pagos_id AS tipo_pago, medio_pagos.nombre 
        //     FROM ordenes 
        //     JOIN copagos ON copagos.id = ordenes.copago_id 
        //     JOIN users ON users.id = ordenes.users_id 
        //     JOIN medio_pagos ON medio_pagos.id = ordenes.medio_pagos_id
        //     WHERE fecha BETWEEN '2021-04-01' AND '2021-04-30' 
        //     GROUP BY users_id, tipo_pago


        




        if ($usuario == null) {
            $users = DB::select("SELECT SUM(ordenes.precio) as monto, ordenes.users_id, users.name, users.localidad 
            FROM ordenes 
            JOIN copagos ON copagos.id = ordenes.copago_id 
            JOIN users ON users.id = ordenes.users_id 
            WHERE fecha BETWEEN '$desde' AND '$hasta' 
            AND anular is null
            GROUP BY users_id");

            $egreso = DB::select("SELECT SUM(egresos.monto) as egreso, user_id AS usuario 
            FROM egresos 
            WHERE fecha BETWEEN '$desde' AND '$hasta' 
            GROUP BY user_id
            ");

            $rendido = DB::select("SELECT SUM(rendicion.monto) as rendido, users_id AS usuario 
            FROM rendicion 
            WHERE fecha BETWEEN '$desde' AND '$hasta' 
            GROUP BY users_id
            ");
            

            $efectivo = DB::select("SELECT SUM(ordenes.precio) as monto, ordenes.users_id, users.name, users.localidad
            FROM ordenes 
            JOIN copagos ON copagos.id = ordenes.copago_id 
            JOIN users ON users.id = ordenes.users_id 
            WHERE fecha BETWEEN '$desde' AND '$hasta'
            AND anular is null
            AND ordenes.medio_pagos_id = 1
            GROUP BY users_id");

            $electronico = DB::select("SELECT SUM(ordenes.precio) as monto, ordenes.users_id, users.name, users.localidad
            FROM ordenes 
            JOIN copagos ON copagos.id = ordenes.copago_id 
            JOIN users ON users.id = ordenes.users_id 
            WHERE fecha BETWEEN '$desde' AND '$hasta'
            AND ordenes.medio_pagos_id = 3
            AND anular is null
            GROUP BY users_id");
        }else{
            $users = DB::select("SELECT SUM(ordenes.precio) as monto, ordenes.users_id, users.name, users.localidad 
            FROM ordenes 
            JOIN copagos ON copagos.id = ordenes.copago_id 
            JOIN users ON users.id = ordenes.users_id 
            WHERE ordenes.users_id = $usuario 
            AND fecha BETWEEN '$desde' AND '$hasta' 
            AND anular is null
            GROUP BY users_id");
        }

//         SELECT SUM(copagos.precio), ordenes.users_id, users.name
// FROM `ordenes` 
// JOIN copagos ON copagos.id = ordenes.copago_id 
// JOIN users ON users.id = ordenes.users_id 
// WHERE ordenes.users_id = 3 AND fecha BETWEEN '2021-03-01' AND '2021-03-31' GROUP BY users_id
        
        // $users = DB::table('ordenes')
        //     ->join('copagos', 'ordenes.copago_id', '=', 'copagos.id')
        //     ->join('users', 'users.id', '=', 'ordenes.users_id')
        //     ->select('ordenes.*', 'copagos.precio', 'users.name')
        //     ->whereBetween('fecha', [$desde, $hasta])
        //     ->orderBy('users.name', 'asc')
        //     ->get();
        //   dd($users);
        // $usuarios = Orden::where('users_id', '=', $usuario)
        // ->whereBetween('fecha', [$desde, $hasta])
        // ->get();

        return view('certificados.rendicionUsuarios', ['usuarios'=>$users, 'desde'=>$desde, 'hasta'=>$hasta, 'efectivo'=>$efectivo, 'electronico'=>$electronico, 'egreso'=>$egreso, 'rendido'=>$rendido ]);
    }
}
