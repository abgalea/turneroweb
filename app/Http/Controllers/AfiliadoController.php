<?php

namespace App\Http\Controllers;

use App\Afiliado;
use Illuminate\Http\Request;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        // $afiliados = Afiliado::paginate(100);
        // ->paginate(100);
        $afiliados = Afiliado::where('localidad', 'LIKE', "%$query%")
                // ->orWhere('usuario_id','LIKE',"%$query%")
                ->orWhere('nro_doc','LIKE',"%$query%")
                ->orWhere('nro_gru_familiar','LIKE',"%$query%")
                ->orWhere('nom_titular','LIKE',"%$query%")
                ->orWhere('cuil_titular','LIKE',"%$query%")
                ->orWhere('tipo_familia','LIKE',"%$query%")
                // ->orWhere('clase_familia','LIKE',"%$query%")
                // ->orWhere('tipo_documento','LIKE',"%$query%")
                // ->orWhere('prefijo','LIKE',"%$query%")
                ->orWhere('nom_beneficiario','LIKE',"%$query%")
                ->orWhere('cuil_beneficiario','LIKE',"%$query%")
                ->orWhere('nacimiento','LIKE',"%$query%")
                ->orWhere('edad','LIKE',"%$query%")
                ->orWhere('sexo','LIKE',"%$query%")
                ->orWhere('estado_civil','LIKE',"%$query%")
                ->orWhere('nacionalidad','LIKE',"%$query%")
                ->orWhere('calle','LIKE',"%$query%")
                ->orWhere('numero','LIKE',"%$query%")
                ->orWhere('piso','LIKE',"%$query%")
                ->orWhere('cod_postal','LIKE',"%$query%")
                ->orWhere('provincia','LIKE',"%$query%")
                ->orWhere('telefono','LIKE',"%$query%")
                ->orWhere('plan','LIKE',"%$query%")
                ->orWhere('vigencia','LIKE',"%$query%")
                ->orWhere('credencial','LIKE',"%$query%")
                ->orWhere('codigo_ingreso','LIKE',"%$query%")
                ->orderBy('nom_beneficiario', 'asc')
                ->paginate(100);
        $cantidad_afiliados = Afiliado::where('localidad', 'LIKE', "%$query%")
                // ->orWhere('usuario_id','LIKE',"%$query%")
                ->orWhere('nro_doc','LIKE',"%$query%")
                ->orWhere('nro_gru_familiar','LIKE',"%$query%")
                ->orWhere('nom_titular','LIKE',"%$query%")
                ->orWhere('cuil_titular','LIKE',"%$query%")
                ->orWhere('tipo_familia','LIKE',"%$query%")
                // ->orWhere('clase_familia','LIKE',"%$query%")
                // ->orWhere('tipo_documento','LIKE',"%$query%")
                // ->orWhere('prefijo','LIKE',"%$query%")
                ->orWhere('nom_beneficiario','LIKE',"%$query%")
                ->orWhere('cuil_beneficiario','LIKE',"%$query%")
                ->orWhere('nacimiento','LIKE',"%$query%")
                ->orWhere('edad','LIKE',"%$query%")
                ->orWhere('sexo','LIKE',"%$query%")
                ->orWhere('estado_civil','LIKE',"%$query%")
                ->orWhere('nacionalidad','LIKE',"%$query%")
                ->orWhere('calle','LIKE',"%$query%")
                ->orWhere('numero','LIKE',"%$query%")
                ->orWhere('piso','LIKE',"%$query%")
                ->orWhere('cod_postal','LIKE',"%$query%")
                ->orWhere('provincia','LIKE',"%$query%")
                ->orWhere('telefono','LIKE',"%$query%")
                ->orWhere('plan','LIKE',"%$query%")
                ->orWhere('vigencia','LIKE',"%$query%")
                ->orWhere('credencial','LIKE',"%$query%")
                ->orWhere('codigo_ingreso','LIKE',"%$query%")
                ->count();
        return view('affiliates.index', ['certificados' => $afiliados, 'cantidad_afiliados'=>$cantidad_afiliados]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function buscar()
    {
        return view('affiliates.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function show(Afiliado $afiliado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function edit(Afiliado $afiliado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afiliado $afiliado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Afiliado $afiliado)
    {
        //
    }

    
}
