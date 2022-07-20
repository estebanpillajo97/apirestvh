<?php

namespace App\Http\Controllers;

use App\ReservaCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosReservaCliente = DB::select('select * from (reserva_clientes INNER JOIN reservaciones ON reservaciones.res_id = reserva_clientes.rc_id) ORDER BY rc_fecha DESC');
        
        echo(json_encode($datosReservaCliente));
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
        $datosReservaCliente = request()->except(['_token','res_nombre','res_descripcion','res_estado']);

        ReservaCliente::insert($datosReservaCliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservaCliente  $reservaCliente
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaCliente $reservaCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservaCliente  $reservaCliente
     * @return \Illuminate\Http\Response
     */
    public function edit($rc_id)
    {
        //
        $reservaCliente= ReservaCliente::where('rc_id','=',$rc_id)->get();
        echo(json_encode($reservaCliente));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservaCliente  $reservaCliente
     * @return \Illuminate\Http\Response
     */
    public function update($rc_id)
    {
        //
        $datosReservaCliente = request()->except(['_token','_method']);
        
        ReservaCliente::where('rc_id','=',$rc_id)->update($datosReservaCliente);
    }

    public function enable($rc_id)
    {
        ReservaCliente::where('rc_id', '=', $rc_id)->update(['rc_estado' => 'Activo']);
    }

    public function disable($rc_id)
    {
        ReservaCliente::where('rc_id', '=', $rc_id)->update(['rc_estado' => 'Inactivo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservaCliente  $reservaCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaCliente $reservaCliente)
    {
        //
    }
}
