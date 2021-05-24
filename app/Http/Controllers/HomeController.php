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
        
        
        
        

        

    return view('home', []);

      

        
        
        
        
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
