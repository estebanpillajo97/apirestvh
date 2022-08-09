<?php

namespace App\Http\Controllers;

use App\aforo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AforoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$datosAforo = Aforo::get();
        $datosAforo = DB::table('aforo')
        ->join('salones','salones.sa_id','=','aforo.sa_id')
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aforo  $aforo
     * @return \Illuminate\Http\Response
     */
    public function show(aforo $aforo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aforo  $aforo
     * @return \Illuminate\Http\Response
     */
    public function edit($af_id)
    {
        //
        $aforo= Aforo::where('af_id','=',$af_id)->get();
        echo(json_encode($aforo));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aforo  $aforo
     * @return \Illuminate\Http\Response
     */
    public function update($af_id)
    {
        //
        $datosAforo = request()->except(['_token','_method']);
        Aforo::where('af_id','=',$af_id)->update($datosAforo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aforo  $aforo
     * @return \Illuminate\Http\Response
     */
    public function destroy(aforo $aforo)
    {
        //
    }
}
