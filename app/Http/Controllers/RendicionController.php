<?php

namespace App\Http\Controllers;

use App\Rendicion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendicionController extends Controller
{
    
    public function index(Request $request)
    {
        $query = trim($request->get('search'));

        if ($request){
            $desde = $request->get('desde');
        if ($desde == null) {
            $desde = date('Y-m-01');
        }
            $hasta = $request->get('hasta');
        if ($hasta == null) {
            $hasta = date('Y-m-30');
        }
            $users = Rendicion::whereBetween('fecha', [$desde, $hasta])
            ->where('users_id', '=', Auth::user()->id)
            ->orderBy('id', 'asc')
            ->get();
            // ->paginate(15)
            // ->appends(request()->query());
            return view('rendicion.index', ['users' => $users, 'search' => $query]);
        }
    }

    
    public function create()
    {
        $usuarios = User::all();

        return view('rendicion.create', ['usuarios'=>$usuarios]);
    }

    
    public function store(Request $request)
    {
        $Rendicion = new Rendicion();
        $Rendicion->monto = $request->input('monto');
        $Rendicion->users_id = $request->input('users_id');
        $Rendicion->fecha = $request->input('fecha');
        $Rendicion->detalle = $request->input('detalle');
        
        
        

        $Rendicion->save();
        return redirect('/rendicion');
    }

   
    public function show(Rendicion $rendicion)
    {
        //
    }

   
    public function edit(Rendicion $rendicion)
    {
        $usuarios = User::all();

        return view('rendicion.edit', ['usuarios'=>$usuarios, 'rendicion'=>$rendicion]);
    }

   
    public function update(Request $request, Rendicion $rendicion)
    {
        $rendicion->monto = $request->get('monto');
        $rendicion->fecha = $request->get('fecha');
        $rendicion->detalle = $request->get('detalle');
        $rendicion->users_id = $request->get('users_id');

        $rendicion->update();
        return redirect('/rendicion');
    }

    
    public function destroy(Rendicion $rendicion)
    {
        //
    }
}
