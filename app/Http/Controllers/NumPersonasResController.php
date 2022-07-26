<?php

namespace App\Http\Controllers;

use App\numPersonasRes;
use Illuminate\Http\Request;

class NumPersonasResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $numPersonasRes = numPersonasRes::get();
        echo(json_encode($numPersonasRes));
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
     * @param  \App\numPersonasRes  $numPersonasRes
     * @return \Illuminate\Http\Response
     */
    public function show(numPersonasRes $numPersonasRes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\numPersonasRes  $numPersonasRes
     * @return \Illuminate\Http\Response
     */
    public function edit(numPersonasRes $numPersonasRes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\numPersonasRes  $numPersonasRes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, numPersonasRes $numPersonasRes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\numPersonasRes  $numPersonasRes
     * @return \Illuminate\Http\Response
     */
    public function destroy(numPersonasRes $numPersonasRes)
    {
        //
    }
}
