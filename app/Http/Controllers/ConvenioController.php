<?php

namespace App\Http\Controllers;

use App\Convenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        

        if ($request){
            $convenios = Convenio::where('prestadora', 'LIKE', '%'.$query.'%')
            ->orWhere('localidad','LIKE',"%$query%")
            ->orWhere('cuit','LIKE',"%$query%")
            ->orWhere('cbu','LIKE',"%$query%")
            ->orderBy('id', 'asc')
            ->get();
            // ->paginate(10);
            return view('convenios.index', ['convenios' => $convenios, 'search' => $query]);
        }
    }

   
    public function create()
    {
        return view('convenios.create');
    }

   
    public function store(Request $request)
    {
        $convenio = new Convenio();
        $convenio->localidad = $request->input('localidad');
        $convenio->prestadora = $request->input('prestadora');
        $convenio->desde = $request->input('desde');
        $convenio->plazo = $request->input('plazo');
        $convenio->cuit = $request->input('cuit');
        $convenio->cbu = $request->input('cbu');
        
        

        $convenio->save();
        //$users = User::all();
        return redirect('/convenios');
    }

    public function show($id)
    {
        return view('convenios.show', ['convenio'=>Convenio::findOrFail($id)]);
    }

    
    public function edit($id)
    {
        return view('convenios.edit', ['convenio'=>Convenio::findOrFail($id)]);
    }

   
    public function update(Request $request, $id)
    {
        $convenio = Convenio::findOrFail($id);
        $convenio->localidad = $request->get('localidad');
        $convenio->prestadora = $request->get('prestadora');
        $convenio->desde = $request->get('desde');
        $convenio->plazo = $request->get('plazo');
        $convenio->cuit = $request->get('cuit');
        $convenio->cbu = $request->get('cbu');

        $convenio->update();
        // echo json_encode($certificado);
        return redirect('/convenios');
    }

   
    public function destroy($id)
    {
        $convenio = Convenio::findOrFail($id);
        $convenio->delete();

        return redirect('/convenios');
    }
}
