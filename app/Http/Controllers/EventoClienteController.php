<?php

namespace App\Http\Controllers;

use App\EventoCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$datosEventoCliente = DB::select('select * from (evento_clientes INNER JOIN eventos ON eventos.eve_id = evento_clientes.eve_id INNER JOIN submenuses ON submenuses.sm_id = evento_clientes.sm_id) ORDER BY ec_fecha DESC');
        $datosEventoCliente = DB::table('evento_clientes')->join('eventos','eventos.eve_id','=','evento_clientes.eve_id')
        ->join('submenuses','submenuses.sm_id','=','evento_clientes.sm_id')
        ->join('tipo_cedulas','tipo_cedulas.tc_id','=','evento_clientes.tc_id')
        ->join('num_adultos','num_adultos.na_id','=','evento_clientes.na_id')
        ->join('num_ninios','num_ninios.nn_id','=','evento_clientes.nn_id')
        ->reorder('ec_fecha','desc')->get();
        echo(json_encode($datosEventoCliente));
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
        $datosEventoCliente = request()->except(['_token','eve_nombre','eve_descripcion','eve_estado','arr_nombre','arr_descripcion','arr_estado','men_id']);

        EventoCliente::insert($datosEventoCliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventoCliente  $eventoCliente
     * @return \Illuminate\Http\Response
     */
    public function show(EventoCliente $eventoCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventoCliente  $eventoCliente
     * @return \Illuminate\Http\Response
     */
    public function edit($ec_id)
    {
        //
        $eventoCliente= EventoCliente::where('ec_id','=',$ec_id)->get();
        echo(json_encode($eventoCliente));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventoCliente  $eventoCliente
     * @return \Illuminate\Http\Response
     */
    public function update($ec_id)
    {
        //
        $datosEventoCliente = request()->except(['_token','_method']);
        
        EventoCliente::where('ec_id','=',$ec_id)->update($datosEventoCliente);
    }

    public function enable($ec_id)
    {
        EventoCliente::where('ec_id', '=', $ec_id)->update(['ec_estado' => 'Activo']);
    }

    public function disable($ec_id)
    {
        EventoCliente::where('ec_id', '=', $ec_id)->update(['ec_estado' => 'Inactivo']);
    }
    public function filtradoFechas($ec_fecha,$ec_fechaH){
        //$eventoCliente = EventoCliente::where('ec_fecha','=',$ec_fecha)->and('ec_fecha','=',$ec_fecha)->get();
        //$eventoCliente = EventoCliente::select("*")->whereBetween('ec_fecha',[$ec_fecha,$ec_fechaH])->get();
        $eventoCliente = DB::table('evento_clientes')->join('eventos','eventos.eve_id','=','evento_clientes.eve_id')
        ->join('submenuses','submenuses.sm_id','=','evento_clientes.sm_id')
        ->join('tipo_cedulas','tipo_cedulas.tc_id','=','evento_clientes.tc_id')
        ->join('num_adultos','num_adultos.na_id','=','evento_clientes.na_id')
        ->join('num_ninios','num_ninios.nn_id','=','evento_clientes.nn_id')
        ->whereBetween('ec_fecha',[$ec_fecha,$ec_fechaH])->reorder('ec_fecha','desc')->get();
        echo(json_encode($eventoCliente));
    }
    public function activos(){
        $eventoCliente = DB::table('evento_clientes')->join('eventos','eventos.eve_id','=','evento_clientes.eve_id')
        ->join('submenuses','submenuses.sm_id','=','evento_clientes.sm_id')
        ->join('tipo_cedulas','tipo_cedulas.tc_id','=','evento_clientes.tc_id')
        ->join('num_adultos','num_adultos.na_id','=','evento_clientes.na_id')
        ->join('num_ninios','num_ninios.nn_id','=','evento_clientes.nn_id')
        ->where('ec_estado','=','Activo')->reorder('ec_fecha','desc')->get();
        echo(json_encode($eventoCliente));
    }
    public function inactivos(){
        $eventoCliente = DB::table('evento_clientes')->join('eventos','eventos.eve_id','=','evento_clientes.eve_id')
        ->join('submenuses','submenuses.sm_id','=','evento_clientes.sm_id')
        ->join('num_adultos','num_adultos.na_id','=','evento_clientes.na_id')
        ->join('num_ninios','num_ninios.nn_id','=','evento_clientes.nn_id')
        ->join('tipo_cedulas','tipo_cedulas.tc_id','=','evento_clientes.tc_id')
        ->where('ec_estado','=','Inactivo')->reorder('ec_fecha','desc')->get();
        echo(json_encode($eventoCliente));
    }
    public function inventarioSubmenuAdultos($sm_id,$ec_fecha,$ec_fechaH){
        $submenusAdultos=DB::table('evento_clientes')
        ->join('num_adultos','num_adultos.na_id','=','evento_clientes.na_id')
        ->where('ec_estado','=','Activo')
        ->where('sm_id','=',$sm_id)
        ->whereBetween('ec_fecha',[$ec_fecha,$ec_fechaH])->sum('na_numeroAdultos');

        echo(json_encode($submenusAdultos));
    }
    public function inventarioSubmenuNinios($sm_id,$ec_fecha,$ec_fechaH){
        $submenusNinios=DB::table('evento_clientes')
        ->join('num_ninios','num_ninios.nn_id','=','evento_clientes.nn_id')
        ->where('ec_estado','=','Activo')
        ->where('sm_id','=',$sm_id)
        ->whereBetween('ec_fecha',[$ec_fecha,$ec_fechaH])->sum('nn_numeroNinios');

        echo(json_encode($submenusNinios));
    }
    public function inventarioSubmenuTabla($sm_id,$ec_fecha,$ec_fechaH){
        $datosEventoCliente = DB::table('evento_clientes')->join('eventos','eventos.eve_id','=','evento_clientes.eve_id')
        ->join('submenuses','submenuses.sm_id','=','evento_clientes.sm_id')
        ->join('tipo_cedulas','tipo_cedulas.tc_id','=','evento_clientes.tc_id')
        ->join('num_adultos','num_adultos.na_id','=','evento_clientes.na_id')
        ->join('num_ninios','num_ninios.nn_id','=','evento_clientes.nn_id')
        ->where('ec_estado','=','Activo')->where('sm_id','=',$sm_id)->reorder('ec_fecha','desc')->get();
        echo(json_encode($datosEventoCliente));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventoCliente  $eventoCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventoCliente $eventoCliente)
    {
        //
    }
}
