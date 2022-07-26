<?php

namespace App\Http\Controllers;

use App\numAdultos;
use Illuminate\Http\Request;

class NumAdultosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $numAdultos = numAdultos::get();
        echo(json_encode($numAdultos));
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
     * @param  \App\numAdultos  $numAdultos
     * @return \Illuminate\Http\Response
     */
    public function show(numAdultos $numAdultos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\numAdultos  $numAdultos
     * @return \Illuminate\Http\Response
     */
    public function edit(numAdultos $numAdultos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\numAdultos  $numAdultos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, numAdultos $numAdultos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\numAdultos  $numAdultos
     * @return \Illuminate\Http\Response
     */
    public function destroy(numAdultos $numAdultos)
    {
        //
    }
}
