<?php

namespace App\Http\Controllers;

use App\Egreso;
use App\Tipocomprobante;
use App\Tipomovimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admin = Auth::user()->nivel;
        if ($admin == 'admin') {
            // where('dependencia','LIKE',Auth::user()->dependencia)
            $egresos = Egreso::all();
        }else{
            $egresos = Egreso::where('user_id', '=', Auth::user()->id)
            ->get();
        }
       
        
        return view('egresos.index', ['egresos' => $egresos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_movi = Tipomovimiento::all();
        $tipo_comp = Tipocomprobante::all();
        
        return view('egresos.create', ['tipo_movi'=>$tipo_movi, 'tipo_comp'=>$tipo_comp]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $egreso = new Egreso();
        $egreso->fecha = $request->input('fecha');
        $egreso->tipo_mov_id = $request->input('tipo_mov_id');
        $egreso->tipo_comprobante_id = $request->input('tipo_comprobante_id');
        $egreso->num_comprobante = $request->input('num_comprobante');
        $egreso->concepto = $request->input('concepto');
        $egreso->monto = $request->input('monto');
        $egreso->autorizado = $request->input('autorizado');
        $egreso->user_id = auth()->user()->id;
        // dd($egreso);
        $egreso->save();
        $admin = Auth::user()->nivel;
        if ($admin == 'admin') {
            // where('dependencia','LIKE',Auth::user()->dependencia)
            $egresos = Egreso::paginate(50);
        }else{
            $egresos = Egreso::where('user_id', '=', Auth::user()->id)
            ->paginate(50);
        }
       
        
        return view('egresos.index', ['egresos' => $egresos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function show(Egreso $egreso)
    {
        dd($egreso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Egreso $egreso)
    {
        $tipo_movi = Tipomovimiento::all();
        $tipo_comp = Tipocomprobante::all();
        return view('egresos.edit', ['egreso'=>$egreso, 'tipo_movi'=>$tipo_movi, 'tipo_comp'=>$tipo_comp]);
    }

    
    public function update(Request $request, Egreso $egreso)
    {
        
        // dd($egreso);
        // $egreso = Egreso::findOrFail($egreso);
        // dd($egreso);
        $egreso->fecha = $request->get('fecha');
        $egreso->tipo_mov_id = $request->get('tipo_mov_id');
        $egreso->tipo_comprobante_id = $request->get('tipo_comprobante_id');
        $egreso->num_comprobante = $request->get('num_comprobante');
        $egreso->concepto = $request->get('concepto');
        $egreso->monto = $request->get('monto');
        $egreso->autorizado = $request->get('autorizado');
        // $egreso->user_id = auth()->user()->id;

       

        $egreso->update();
        // echo json_encode($certificado);
        return redirect('/egresos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egreso $egreso)
    {
        //
    }
}
