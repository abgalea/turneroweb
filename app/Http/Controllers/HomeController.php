<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Certificados;
use App\Orden;
use App\Practica;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $desde = date('Y-01-01');
        $hasta = date('Y-m-d');

        $desdevencimiento = date('Y-m-d');
        $hastavencimiento = date( "Y-m-d", strtotime( "$desdevencimiento + 7 day"));
        // $total_posadas = Certificados::where('localidad','like','Posadas')
        // ->whereBetween('fecha', [$desde, $hasta])
        // ->count();
        $total_afiliados = Afiliado::where('provincia','=','MISIONES')
        ->count();
        $total_afiliados_formosa = Afiliado::where('provincia','=','FORMOSA')
        ->count();

        $total_afiliados_ospta = Afiliado::where('plan','=','GRUPO MELD SALUD MISIONES')
        ->count();
        
        
        // $total_garupa = Certificados::where('localidad','like','Garupa')
        // ->whereBetween('fecha', [$desde, $hasta])
        // ->count();
        // $total_obera = Certificados::where('localidad','like','Obera')
        // ->whereBetween('fecha', [$desde, $hasta])
        // ->count();
        // $total_apostoles = Certificados::where('localidad','like','Apostoles')
        // ->whereBetween('fecha', [$desde, $hasta])
        // ->count();
        // $total_vencer = Certificados::whereBetween('hasta', [$desdevencimiento, $hastavencimiento])
        // ->whereBetween('hasta', [$desdevencimiento, $hastavencimiento])
        // ->count();
        $desde = date('Y-m-01');
        $hasta = date('Y-m-30');
        $cant_ordenes = Orden::whereBetween('fecha', [$desde, $hasta])
        ->count();

        // $user_info = DB::table('ordenes')
        //          ->select('users_id', DB::raw('count(*) as total'))                 
        //          ->groupBy('users_id')
        //          ->get();
        
        // $total_orde_porUsuario = User::withCount([
        //     'cantidadOrden',
        //     'cantidadOrden as cantid' =>function ($query) {
        //         $query->whereBetween('fecha', [date('Y-m-01'), date('Y-m-30')]);
        //     }])
        // ->get();
        
        // dd($total_orde_porUsuario);



        // $total_cert = Certificados::where('usuario', '=', Auth::user()->username)
        // ->count();
        
        $nivel = Auth::user()->nivel;

        $lista_orden = Orden::whereBetween('fecha', [$desde, $hasta])
        ->get();


        $listado = DB::select("SELECT COUNT(ordenes.id) as canti, ordenes.users_id, users.name, users.localidad
                            FROM ordenes 
                            JOIN users ON users.id = ordenes.users_id 
                            WHERE fecha BETWEEN '$desde' AND '$hasta' 
                            GROUP BY users_id");

        
        

        

    return view('home', ['nivel' => $nivel, 'lista_orden'=>$lista_orden, 'total_afiliados'=> $total_afiliados, 'cant_ordenes'=>$cant_ordenes, 'total_afiliados_formosa'=>$total_afiliados_formosa, 'listado'=>$listado, 'total_afiliados_ospta'=>$total_afiliados_ospta]);

        // if (Auth::user()->nivel == 'cargador'){
        //     $total_cert = Certificados::where('usuario', '=', Auth::user()->username)
        //     ->count();
        //     return view('home', ['total_cert' => $total_cert, 'total_posadas' => $total_posadas, 'total_garupa' => $total_garupa, 'total_obera' => $total_obera, 'total_apostoles' => $total_apostoles, 'total_vencer' => $total_vencer, 'total_afiliados'=> $total_afiliados]);
        // }
        // if (Auth::user()->nivel == 'supervisor'){
        //      $total_cert = Certificados::where('usuario', '=', Auth::user()->username)
        //     ->count();
        //     return view('home', ['total_cert' => $total_cert, 'total_posadas' => $total_posadas, 'total_garupa' => $total_garupa, 'total_obera' => $total_obera, 'total_apostoles' => $total_apostoles, 'total_vencer' => $total_vencer, 'total_afiliados'=> $total_afiliados]);

        // }

        
        
        
        
    }
    public function listadoPracticas(Request $request)
    {
        $query = trim($request->get('search'));

        if ($request){
            $users = Practica::where('practica', 'LIKE', '%'.$query.'%')
            ->orWhere('grupo','LIKE',"%$query%")
            ->orWhere('codigo','LIKE',"%$query%")
            ->orderBy('id', 'asc')
            ->paginate(15)
            ->appends(request()->query());
            return view('nomenclador.index', ['users' => $users, 'search' => $query]);
        }
        // $users = User::all();
        // return view('usuarios.index', ['users' => $users]);
    }

}
