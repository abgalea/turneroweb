<?php

namespace App\Http\Controllers;

use App\Copago;
use Illuminate\Http\Request;

class CopagoController extends Controller
{
   
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        

        if ($request){
            $copagos = Copago::where('copago', 'LIKE', '%'.$query.'%')
            ->orderBy('id', 'asc')
            ->get();
            // ->paginate(10);
            return view('copagos.index', ['copagos' => $copagos, 'search' => $query]);
        }
    }

   
    public function create()
    {
        return view('copagos.create');
    }

    
    public function store(Request $request)
    {
        $copago = new Copago();
        $copago->precio = $request->input('precio');
        $copago->copago = $request->input('copago');
        $copago->vencimiento = $request->input('vencimiento');
        
        
        

        $copago->save();
        return redirect('/copagos');
    }

    
    public function show(Copago $copago)
    {
        //
    }

   
    public function edit($id)
    {
        return view('copagos.edit', ['copago'=>Copago::findOrFail($id)]);
    }

    
    public function update(Request $request, $id)
    {
        $convenio = Copago::findOrFail($id);
        $convenio->copago = $request->get('copago');
        $convenio->precio = $request->get('precio');
        $convenio->vencimiento = $request->get('vencimiento');
        

        $convenio->update();
        // echo json_encode($certificado);
        return redirect('/copagos');
    }

    
    public function destroy(Copago $copago)
    {
        //
    }
}
