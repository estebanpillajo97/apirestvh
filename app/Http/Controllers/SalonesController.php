<?php

namespace App\Http\Controllers;

use App\salones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salones = Salones::get();
        echo(json_encode($salones));
    }
    public function aforo(){
        $datosAforo = DB::table('salones')
        ->where('sa_estado','=','Activo')
        ->where('sa_disponibilidad','=','Disponible')
        ->SUM('sa_capacidad');
        echo(json_encode($datosAforo));
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
        $datosSalones = request()->except(['_token']);

        Salones::insert($datosSalones);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function show(salones $salones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function edit($sa_id)
    {
        //
        $salones= Salones::where('sa_id','=',$sa_id)->get();
        echo(json_encode($salones));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function update($sa_id)
    {
        //
        $datosSalones = request()->except(['_token','_method']);
        Salones::where('sa_id','=',$sa_id)->update($datosSalones);
    }
    public function enable($sa_id)
    {
        Salones::where('sa_id', '=', $sa_id)->update(['sa_estado' => 'Activo']);
    }

    public function disable($sa_id)
    {
        Salones::where('sa_id', '=', $sa_id)->update(['sa_estado' => 'Inactivo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function destroy(salones $salones)
    {
        //
    }
}
