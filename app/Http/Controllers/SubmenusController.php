<?php

namespace App\Http\Controllers;

use App\Submenus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //order by sm_nombre desc
        $datosSubmenus = Submenus::where('sm_estado','=','Activo')->get();

        echo(json_encode($datosSubmenus));
    }
    public function mostrarTodo(){
        $datosSubmenus = DB::table('submenuses')
        ->join('menuses','menuses.men_id','=','submenuses.men_id')->get();
        echo(json_encode($datosSubmenus));
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
        $datosSubmenus = request()->except(['_token','men_nombre','men_foto','men_cantidadPromedio','men_descripcion','men_estado']);

        Submenus::insert($datosSubmenus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submenus  $submenus
     * @return \Illuminate\Http\Response
     */
    public function show(Submenus $submenus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submenus  $submenus
     * @return \Illuminate\Http\Response
     */
    public function edit($sm_id)
    {
        //
        $submenus= Submenus::where('sm_id','=',$sm_id)->get();
        echo(json_encode($submenus));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submenus  $submenus
     * @return \Illuminate\Http\Response
     */
    public function update($sm_id)
    {
        //
        $datosSubmenus = request()->except(['_token','_method']);
        Submenus::where('sm_id','=',$sm_id)->update($datosSubmenus);
    }


    public function enable($sm_id)
    {
        
        Submenus::where('sm_id', '=', $sm_id)->update(['sm_estado' => 'Activo']);
    }

    public function disable($sm_id)
    {
        
        Submenus::where('sm_id', '=', $sm_id)->update(['sm_estado' => 'Inactivo']);
    }
    public function select($men_id){
        $submenus=Submenus::where('men_id','=',$men_id)->get();
        echo(json_encode($submenus));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submenus  $submenus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenus $submenus)
    {
        //
    }
}
