<?php

namespace App\Http\Controllers;

use App\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosEventos= Eventos::get();

        echo(json_encode($datosEventos));
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
        $datosEventos = request()->except('_token');

        Eventos::insert($datosEventos); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit($eve_id)
    {
        //
        $eventos= Eventos::where('eve_id','=',$eve_id)->get();
        echo(json_encode($eventos));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update($eve_id)
    {
        //
        $datosEventos = request()->except(['_token','_method']);
        Eventos::where('eve_id','=',$eve_id)->update($datosEventos);
    }

    public function enable($eve_id)
    {
        Eventos::where('eve_id', '=', $eve_id)->update(['eve_estado' => 'Activo']);
    }

    public function disable($eve_id)
    {
        Eventos::where('eve_id', '=', $eve_id)->update(['eve_estado' => 'Inactivo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventos $eventos)
    {
        //
    }
}
