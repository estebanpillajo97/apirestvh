<?php

namespace App\Http\Controllers;

use App\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{

    public function index()
    {
        //
        $datosMenus= Menus::where('men_estado','=','Activo')->get();

        echo(json_encode($datosMenus));

        //return view('menus.index');
    }

    public function mostrarTodosMenus()
    {
        //
        $datosMenus= Menus::get();

        echo(json_encode($datosMenus));

        //return view('menus.index');
    }

    public function store(Request $request)
    {
        //
        //$datosMenus = $request()->all();

        $datosMenus = request()->except('_token');
        if($request->hasFile('men_foto')){
            $datosMenus['men_foto']=$request->file('men_foto')->store('menus','public');
        }
        Menus::insert($datosMenus);

    }

    public function edit($men_id)
    {
        //
        $menus= Menus::where('men_id','=',$men_id)->get();
        echo(json_encode($menus));
    }

    public function update($men_id,Request $request)
    {
        //
        $datosMenus = request()->except(['_token','_method']);

        if($request->hasFile('men_foto')){
            
            $datosMenus['men_foto']=$request->file('men_foto')->store('menus','public');
        }

        Menus::where('men_id','=',$men_id)->update($datosMenus);
    }

    public function enable($men_id)
    {
        Menus::where('men_id', '=', $men_id)->update(['men_estado' => 'Activo']);
    }

    public function disable($men_id)
    {
        Menus::where('men_id', '=', $men_id)->update(['men_estado' => 'Inactivo']);
    }

    public function mostrarInicio(){
        Menus::where('men_estado','=','Activo')->get();
    }
    public function destroy(Menus $menus)
    {
        //
    }
}
