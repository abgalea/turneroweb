<?php

namespace App\Http\Controllers;

use App\Afiliado;
use Illuminate\Http\Request;
use App\Certificados;
use App\Copago;
use App\Limite;
use App\Mail\Autorizacion;
use App\MedioPago;
use App\nomenclatura;
use App\Orden;
use App\Practica;
use App\PracticaOrden;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\PDF;


class GeneradorController extends Controller
{
    public function imprimir($id){
        // $pdf = \PDF::loadView('certificados.imprimir');
        // return $pdf->download('ejemplo.pdf');
        //$today = Carbon::now()->format('d/m/Y');
        //$certificados = Certificados::where('id', '=', $id);
        // $pdf = \PDF::loadView('certificados.imprimir', ['certificados'=>Certificados::findOrFail($id)])
        $orden = Orden::findOrFail($id);
        $practicas_solicitadas = PracticaOrden::where('ordene_id', $orden->id)->get();
        $afiliados = Afiliado::where('nro_doc', $orden->nro_doc)->firstOrFail();
        $contents = file_get_contents("https://chart.googleapis.com/chart?chs=90x90&cht=qr&chl=https://policiamisiones.gob.ar/bomberos/index.php?id=".$orden->id);
        $vendedor = User::where('id', $orden->users_id)->firstOrFail();
        //  dd($orden);
        if($orden->tipo_orden == 1){
            $pdf = \PDF::loadView('affiliates.orden', ['afiliado'=>$afiliados, 'orden'=>$orden, 'practicas_solicitadas'=>$practicas_solicitadas, 'vendedor'=>$vendedor, 'contents'=>$contents])
        ->setPaper('a4', 'portrait');
        }
        
        if($orden->tipo_orden == 2){
            $pdf = \PDF::loadView('affiliates.laboratorio', ['afiliado'=>$afiliados, 'orden'=>$orden, 'practicas_solicitadas'=>$practicas_solicitadas, 'vendedor'=>$vendedor, 'contents'=>$contents])
        ->setPaper('a4', 'portrait');
        }

        if($orden->tipo_orden == 3){
          $pdf = \PDF::loadView('affiliates.practicas', ['afiliado'=>$afiliados, 'orden'=>$orden, 'practicas_solicitadas'=>$practicas_solicitadas, 'vendedor'=>$vendedor, 'contents'=>$contents])
        ->setPaper('a4', 'portrait');
        }

        if($orden->tipo_orden == 4){
            $pdf = \PDF::loadView('affiliates.recetas', ['afiliado'=>$afiliados, 'orden'=>$orden, 'practicas_solicitadas'=>$practicas_solicitadas, 'vendedor'=>$vendedor, 'contents'=>$contents])
        ->setPaper('a4', 'portrait');
        }
        
        

        // dd($orden);
        return $pdf->stream('ORDEN_Nro_'.$id.'.pdf');
   }
    public function controlOrden($id){
        
        $orden = Orden::findOrFail($id);
        $practicas_solicitadas = PracticaOrden::where('ordene_id', $orden->id)->get();
        $afiliados = Afiliado::where('nro_doc', $orden->nro_doc)->firstOrFail();
        $contents = file_get_contents("https://chart.googleapis.com/chart?chs=90x90&cht=qr&chl=https://policiamisiones.gob.ar/bomberos/index.php?id=".$orden->id);
        $vendedor = User::where('id', $orden->users_id)->firstOrFail();
        //  dd($orden);
        
        
        

        return view('affiliates.control', ['afiliado'=>$afiliados, 'orden'=>$orden, 'practicas_solicitadas'=>$practicas_solicitadas, 'vendedor'=>$vendedor, 'contents'=>$contents]);
   }

   public function anularOrden($id)
   {
     try {
      $orden = Orden::findOrFail($id);
      $afiliados = Afiliado::where('nro_doc', $orden->nro_doc)->firstOrFail();
      $usuario = Auth::user()->id;
      if ($usuario == $orden->users_id) {
        return view('certificados.anularOrden', ['afiliado'=>$afiliados, 'orden'=>$orden]);
      }else{
        $mensaje = 'No puede anular una orden generada por otro usuario';
        $tipo = 'danger';
        return view('error.error', ['mensaje'=>$mensaje, 'tipo'=>$tipo]);
      }
      return view('certificados.anularOrden', ['afiliado'=>$afiliados, 'orden'=>$orden]);
     } catch (\Throwable $orden) {
      abort(404, 'Oops...Not found!');
     }
        
   }
    public function comprobar($id){
        // $pdf = \PDF::loadView('certificados.imprimir');
        // return $pdf->download('ejemplo.pdf');
        //$today = Carbon::now()->format('d/m/Y');
        //$certificados = Certificados::where('id', '=', $id);
        // $pdf = \PDF::loadView('certificados.imprimir', ['certificados'=>Certificados::findOrFail($id)])
        $orden = Orden::findOrFail($id);
        $practicas_solicitadas = PracticaOrden::where('ordene_id', $orden->id)->get();
        $afiliados = Afiliado::where('nro_doc', $orden->nro_doc)->firstOrFail();
        
        return view('affiliates.orden', ['afiliado'=>$afiliados, 'orden'=>$orden, 'practicas_solicitadas'=>$practicas_solicitadas]);
   }

   public function orden($id){
    
    $desde = date('Y-m-01');
    $hasta = date('Y-m-30');
    
    $cant_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->where('tipo_orden','=',1)
    ->count();
    $total_orden_generada = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->count();
    
    $las_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->orderBy('id', 'desc')
    ->paginate(100);
    // $afiliado = Afiliado::findOrFail($id);
    
    $afiliado = Afiliado::where('nro_doc', $id)->firstOrFail();
    $limite = Limite::where('id', 1)->firstOrFail();
    
    
    $afiliado->autorizacion = substr(md5(uniqid(rand(), true)),0,7);
    $afiliado->vendedor = Auth::user()->name;
    if ($cant_ordenes >= $limite->cantidad) {
        $responsable = 'aagaleano@gmail.com';
        $fecha = date('d-m-Y');
        $afiliado->oculto = 'hidden';
        $afiliado->mostrar_auto = 'block';
        $afiliado->style_mostrar_auto = 'visibility';
        $mailable = new Autorizacion($afiliado, $fecha);
          Mail::to($responsable)
           ->bcc('grupomeldsaludsa@gmail.com')
          ->send($mailable);
    }else{
        $afiliado->oculto = 'inline';
        $afiliado->style_mostrar_auto = 'visibility';
        $afiliado->mostrar_auto = 'hidden';
    }
    $nomenclatura = nomenclatura::all();    
    $medio_pagos = MedioPago::all();
    $copagos = Copago::all();

    
    

    return view('certificados.create', ['medio_pagos'=>$medio_pagos,'ordenes'=> $las_ordenes,'afiliado'=> $afiliado , 'nomenclaturas'=> $nomenclatura, 'copagos'=> $copagos, 'cant_ordenes' => $cant_ordenes, 'total_orden_generada'=>$total_orden_generada]);

   }



   public function recetas($id){
    
    $desde = date('Y-m-01');
    $hasta = date('Y-m-30');
    
    $cant_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->count();
    $total_orden_generada = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->count();
    $las_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->orderBy('id', 'desc')
    ->paginate(100);
    // $afiliado = Afiliado::findOrFail($id);
    $afiliado = Afiliado::where('nro_doc', $id)->firstOrFail();
    
    $afiliado->autorizacion = substr(md5(uniqid(rand(), true)),0,7);
    $afiliado->vendedor = Auth::user()->name;
    if ($cant_ordenes >= 2) {
        $responsable = 'aagaleano@gmail.com';
        $fecha = date('d-m-Y');
        $afiliado->oculto = 'hidden';
        $afiliado->mostrar_auto = 'block';
        $afiliado->style_mostrar_auto = 'visibility';
        $mailable = new Autorizacion($afiliado, $fecha);
          Mail::to($responsable)
           ->bcc('grupomeldsaludsa@gmail.com')
          ->send($mailable);
    }else{
        $afiliado->oculto = 'inline';
        $afiliado->style_mostrar_auto = 'visibility';
        $afiliado->mostrar_auto = 'hidden';
    }
    $nomenclatura = nomenclatura::all();    
    $medio_pagos = MedioPago::all();
    $copagos = Copago::all();

    
    

    return view('certificados.recetas', ['medio_pagos'=>$medio_pagos,'ordenes'=> $las_ordenes,'afiliado'=> $afiliado , 'nomenclaturas'=> $nomenclatura, 'copagos'=> $copagos, 'cant_ordenes' => $cant_ordenes, 'total_orden_generada'=>$total_orden_generada]);

   }

   public function laboratorio($id){
    
    $desde = date('Y-m-01');
    $hasta = date('Y-m-30');
    
    $cant_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->where('tipo_orden','=',2)
    ->count();
    $total_orden_generada = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->count();
    $las_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->orderBy('id', 'desc')
    ->paginate(100);
    // $afiliado = Afiliado::findOrFail($id);
    $afiliado = Afiliado::where('nro_doc', $id)->firstOrFail();
    
    $afiliado->autorizacion = substr(md5(uniqid(rand(), true)),0,7);
    $afiliado->vendedor = Auth::user()->name;
    $limite = Limite::where('id', 2)->firstOrFail();
    if ($cant_ordenes >= $limite->cantidad) {
        $responsable = 'aagaleano@gmail.com';
        $fecha = date('d-m-Y');
        $afiliado->oculto = 'hidden';
        $afiliado->mostrar_auto = 'block';
        $afiliado->style_mostrar_auto = 'visibility';
        $mailable = new Autorizacion($afiliado, $fecha);
          Mail::to($responsable)
        //   ->bcc('grupomeldsaludsa@gmail.com')
          ->send($mailable);
    }else{
        $afiliado->oculto = 'inline';
        $afiliado->style_mostrar_auto = 'visibility';
        $afiliado->mostrar_auto = 'hidden';
    }
    $nomenclatura = Practica::all();
    $medio_pagos = MedioPago::all();
    $copagos = Copago::all();

    
    

    return view('certificados.laboratorio', ['medio_pagos'=>$medio_pagos, 'ordenes'=> $las_ordenes,'afiliado'=> $afiliado , 'nomenclaturas'=> $nomenclatura, 'copagos'=> $copagos, 'cant_ordenes' => $cant_ordenes, 'total_orden_generada'=>$total_orden_generada]);

   }

   public function practica($id){
    $desde = date('Y-m-01');
    $hasta = date('Y-m-30');
    $cant_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->where('tipo_orden','=',3)
    ->count();

    $total_orden_generada = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->count();
    

    $las_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->orderBy('id', 'desc')
    ->paginate(100);
    // $afiliado = Afiliado::findOrFail($id);
    $afiliado = Afiliado::where('nro_doc', $id)->firstOrFail();
    
    $afiliado->autorizacion = substr(md5(uniqid(rand(), true)),0,7);
    $afiliado->vendedor = Auth::user()->name;
    $limite = Limite::where('id', 3)->firstOrFail();

    if ($cant_ordenes >= $limite->cantidad) {
        $responsable = 'aagaleano@gmail.com';
        $fecha = date('d-m-Y');
        $afiliado->oculto = 'hidden';
        $afiliado->mostrar_auto = 'block';
        $afiliado->style_mostrar_auto = 'visibility';
        $mailable = new Autorizacion($afiliado, $fecha);
          Mail::to($responsable)
        //   ->bcc('grupomeldsaludsa@gmail.com')
          ->send($mailable);
    }else{
        $afiliado->oculto = 'inline';
        $afiliado->style_mostrar_auto = 'visibility';
        $afiliado->mostrar_auto = 'hidden';
    }
    $nomenclatura = Practica::all();
    $medio_pagos = MedioPago::all();
    $copagos = Copago::all();

    
    

    return view('certificados.practicas', ['medio_pagos'=>$medio_pagos, 'ordenes'=> $las_ordenes,'afiliado'=> $afiliado , 'nomenclaturas'=> $nomenclatura, 'copagos'=> $copagos, 'cant_ordenes' => $cant_ordenes, 'total_orden_generada'=>$total_orden_generada]);

   }

   public function solorecetario($id){
    
    $desde = date('Y-m-01');
    $hasta = date('Y-m-30');
    
    $cant_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->where('tipo_orden','=',1)
    ->count();
    $total_orden_generada = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->count();
    
    $las_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
    ->where('nro_doc','=',$id)
    ->orderBy('id', 'desc')
    ->paginate(100);
    // $afiliado = Afiliado::findOrFail($id);
    
    $afiliado = Afiliado::where('nro_doc', $id)->firstOrFail();
    $limite = Limite::where('id', 1)->firstOrFail();
    
    
    $afiliado->autorizacion = substr(md5(uniqid(rand(), true)),0,7);
    $afiliado->vendedor = Auth::user()->name;
    if ($cant_ordenes >= $limite->cantidad) {
        $responsable = 'aagaleano@gmail.com';
        $fecha = date('d-m-Y');
        $afiliado->oculto = 'hidden';
        $afiliado->mostrar_auto = 'block';
        $afiliado->style_mostrar_auto = 'visibility';
        $mailable = new Autorizacion($afiliado, $fecha);
          Mail::to($responsable)
        //   ->bcc('grupomeldsaludsa@gmail.com')
          ->send($mailable);
    }else{
        $afiliado->oculto = 'inline';
        $afiliado->style_mostrar_auto = 'visibility';
        $afiliado->mostrar_auto = 'hidden';
    }
    $nomenclatura = nomenclatura::all();    
    $medio_pagos = MedioPago::all();
    $copagos = Copago::all();

    
    

    return view('certificados.solorecetas', ['medio_pagos'=>$medio_pagos,'ordenes'=> $las_ordenes,'afiliado'=> $afiliado , 'nomenclaturas'=> $nomenclatura, 'copagos'=> $copagos, 'cant_ordenes' => $cant_ordenes, 'total_orden_generada'=>$total_orden_generada]);

   }



   public function showAfi($id){
    $certificados = Afiliado::where('nro_doc', $id)->firstOrFail();

    return view('affiliates.show', ['certificados'=>$certificados]);
   }
}
