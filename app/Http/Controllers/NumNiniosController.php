<?php

namespace App\Http\Controllers;

use App\numNinios;
use Illuminate\Http\Request;

class NumNiniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $numNinios = numNinios::get();
        echo(json_encode($numNinios));
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
     * @param  \App\numNinios  $numNinios
     * @return \Illuminate\Http\Response
     */
    public function show(numNinios $numNinios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\numNinios  $numNinios
     * @return \Illuminate\Http\Response
     */
    public function edit(numNinios $numNinios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\numNinios  $numNinios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, numNinios $numNinios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\numNinios  $numNinios
     * @return \Illuminate\Http\Response
     */
    public function destroy(numNinios $numNinios)
    {
        //
    }
}
