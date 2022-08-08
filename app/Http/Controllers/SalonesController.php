<?php

namespace App\Http\Controllers;

use App\salones;
use Illuminate\Http\Request;

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
