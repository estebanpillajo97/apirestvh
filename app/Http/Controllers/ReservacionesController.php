<?php

namespace App\Http\Controllers;

use App\Reservaciones;
use Illuminate\Http\Request;

class ReservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosReservaciones= Reservaciones::get();

        echo(json_encode($datosReservaciones));
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
        $datosReservaciones = request()->except('_token');

        Reservaciones::insert($datosReservaciones); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($res_id)
    {
        //
        $reservaciones= Reservaciones::where('res_id','=',$res_id)->get();
        echo(json_encode($reservaciones));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function update($res_id)
    {
        //
        $datosReservaciones = request()->except(['_token','_method']);
        Reservaciones::where('res_id','=',$res_id)->update($datosReservaciones);
    }

    public function enable($res_id)
    {
        Reservaciones::where('res_id', '=', $res_id)->update(['res_estado' => 'Activo']);
    }

    public function disable($res_id)
    {
        Reservaciones::where('res_id', '=', $res_id)->update(['res_estado' => 'Inactivo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservaciones $reservaciones)
    {
        //
    }
}
