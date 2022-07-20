<?php

namespace App\Http\Controllers;

use App\Arreglos;
use Illuminate\Http\Request;

class ArreglosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosArreglos= Arreglos::get();

        echo(json_encode($datosArreglos));
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
        $datosArreglos = request()->except('_token');

        Arreglos::insert($datosArreglos); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Arreglos  $arreglos
     * @return \Illuminate\Http\Response
     */
    public function show(Arreglos $arreglos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Arreglos  $arreglos
     * @return \Illuminate\Http\Response
     */
    public function edit($arr_id)
    {
        //
        $arreglos= Arreglos::where('arr_id','=',$arr_id)->get();
        echo(json_encode($arreglos));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Arreglos  $arreglos
     * @return \Illuminate\Http\Response
     */
    public function update($arr_id)
    {
        //
        $datosArreglos = request()->except(['_token','_method']);
        Arreglos::where('arr_id','=',$arr_id)->update($datosArreglos);
    }

    public function enable($arr_id)
    {
        Arreglos::where('arr_id', '=', $arr_id)->update(['arr_estado' => 'Activo']);
    }

    public function disable($arr_id)
    {
        Arreglos::where('arr_id', '=', $arr_id)->update(['arr_estado' => 'Inactivo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Arreglos  $arreglos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arreglos $arreglos)
    {
        //
    }
}
