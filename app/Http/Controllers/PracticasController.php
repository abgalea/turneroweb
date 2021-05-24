<?php

namespace App\Http\Controllers;

use App\Practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PracticasController extends Controller
{
   
    public function index(Request $request)
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nomenclador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->username == 'matias.nahuel' || Auth::user()->nivel == 'admin') {
            $practica = new Practica();
            $practica->codigo = $request->input('codigo');
            $practica->grupo = $request->input('grupo');
            $practica->practica = $request->input('practica');
            $practica->precio = $request->input('precio');
            $practica->obs = $request->input('obs');
            $practica->save();
            //$users = User::all();
            return redirect('/practicas');
        }else{
            return redirect()->back()->with('success', 'Error, solo Matias puede actualizar o agregar una práctica, debe hablar con el');   
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
