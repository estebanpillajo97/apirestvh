<?php

namespace App\Http\Controllers;

use App\tipo_cedula;
use Illuminate\Http\Request;

class TipoCedulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipoCedula=tipo_cedula::get();
        echo(json_encode($tipoCedula));

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
     * @param  \App\tipo_cedula  $tipo_cedula
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_cedula $tipo_cedula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_cedula  $tipo_cedula
     * @return \Illuminate\Http\Response
     */
    public function edit(tipo_cedula $tipo_cedula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_cedula  $tipo_cedula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipo_cedula $tipo_cedula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_cedula  $tipo_cedula
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipo_cedula $tipo_cedula)
    {
        //
    }
}
