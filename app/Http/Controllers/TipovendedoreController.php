<?php

namespace App\Http\Controllers;

use App\Tipovendedore;
use Illuminate\Http\Request;

class TipovendedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipovendedore::all();
        return view('tiposvendedores.index', ['tipos'=>$tipos]);
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
     * @param  \App\Tipovendedore  $tipovendedore
     * @return \Illuminate\Http\Response
     */
    public function show(Tipovendedore $tipovendedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipovendedore  $tipovendedore
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipovendedore $tipovendedore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipovendedore  $tipovendedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipovendedore $tipovendedore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipovendedore  $tipovendedore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipovendedore $tipovendedore)
    {
        //
    }
}
