<?php

namespace App\Http\Controllers;

use App\Sucursale;
use Illuminate\Http\Request;

class SucursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursale::all();
        return view('sucursales.index', ['sucursales'=>$sucursales]);
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
     * @param  \App\Sucursale  $sucursale
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursale $sucursale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursale  $sucursale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursale $sucursale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursale  $sucursale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursale $sucursale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursale  $sucursale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursale $sucursale)
    {
        //
    }
}
