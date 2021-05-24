<?php

namespace App\Http\Controllers;

use App\ciuviejos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CiuviejosController extends Controller
{
    
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        if ($request){
            $certificados = ciuviejos::where('direccion','LIKE',"%$query%")
            ->orWhere('certificado','LIKE',"%$query%")
            ->orWhere('nombre','LIKE',"%$query%")
            ->orWhere('comercio','LIKE',"%$query%")
            ->orWhere('orden','LIKE',"%$query%")
            ->orWhere('legajo','LIKE',"%$query%")
            ->orderBy('id', 'desc')
            ->paginate(50);
            return view('ciuviejo.index', ['certificados' => $certificados, 'search' => $query]);
        }
        // $certificados = Certificados::all();
        // return view('ciuviejo.index', ['certificados' => $certificados]);
    }

    
    

   
    public function show($id)
    {
        return view('ciuviejo.show', ['certificados'=>ciuviejos::findOrFail($id)]);
    }

}
