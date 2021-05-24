<?php

namespace App\Http\Controllers;

use App\Limite;
use Illuminate\Http\Request;

class LimiteController extends Controller
{
    
    public function index(Request $request)
    {
        
        $copagos = Limite::all();    
        return view('limites.index', ['copagos' => $copagos]);
        
    }

    
    public function create()
    {
        return view('limites.create');
    }

    
    public function store(Request $request)
    {
        $copago = new Limite();
        $copago->nombre = $request->input('nombre');
        $copago->cantidad = $request->input('cantidad');
       

        $copago->save();
        return redirect('/limites');
    }

   
    public function show(Limite $limite)
    {
        //
    }

    
    public function edit(Limite $limite)
    {
        return view('limites.edit', ['copago'=>$limite]);
    }

   
    public function update(Request $request, Limite $limite)
    {
        // $convenio = Limite::findOrFail($id);
        $limite->nombre = $request->get('nombre');
        $limite->cantidad = $request->get('cantidad');        

        $limite->update();
        // echo json_encode($certificado);
        return redirect('/limites');
    }

  
    public function destroy(Limite $limite)
    {
        //
    }


    
}
