<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosUsuarios= DB::table('usuarios')->join('roles','roles.rol_id','=','usuarios.rol_id')->get();

        echo(json_encode($datosUsuarios));

    }
    public function sinRoles(){
        $datosUsuarios= DB::select('select * from usuarios where rol_id IS NULL');

        echo(json_encode($datosUsuarios));
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
        $datosU = $request->all();
        $verificador = usuarios::where('usu_usuario', '=', $datosU['usu_usuario'])->get();
        if (!$verificador->isEmpty()) {
            $response['message']="El usuario ya existe";
            $response['status']=1;
        } else {
            $datosU['usu_password'] = Hash::make($request->usu_password);
            usuarios::insert($datosU); // inserto si no existe
            $response['message']="Usuario registrado exitosamente";
            $response['status']=0;
        }
        return response()->json($response,200);  
    }

    /*public function verificar(Request $request){
        $datosU = $request->all();
        $menus= Usuarios::where('usu_usuario','=',$datosU['usu_usuario'], 'AND', 
        'usu_password','=',$datosU['usu_password'] )->get();
        if (!$menus->isEmpty()) {
            return response()->json('1', 200); // ya existe
        }else{
            return response()->json('0',200);//no existe
        }
    }*/
    public function comprobarLogin(Request $request)
    {
        $datosU = $request->all();
        $item = usuarios::where('usu_usuario', '=', $datosU['usu_usuario'])->get('usu_password');  // if para ver si el user no existe
        if (!$item->isEmpty()) {
            if (Hash::check($datosU['usu_password'], $item[0]->usu_password)) {
                return response()->json("404", 200);
            } else {
                $usuariosMostrar = usuarios::where('usu_usuario', '=', $datosU['usu_usuario'])
                    ->where('usu_password', '=', $item[0]->usu_password)->get();
                    return response()->json($usuariosMostrar, 200);
            }
        } else {
            return response()->json("403", 200);
        }

    }

    public function edit($usu_id)
    {
        //
        $usuarios= usuarios::where('usu_id','=',$usu_id)->get();
        echo(json_encode($usuarios));
    }


    public function update($usu_id)
    {
        //}
        $datosUsuarios = request()->except(['_token','_method']);
        Usuarios::where('usu_id','=',$usu_id)->update($datosUsuarios);
    }

    public function enable($usu_id)
    {
        Usuarios::where('usu_id', '=', $usu_id)->update(['usu_estado' => 'Activo']);
    }

    public function disable($usu_id)
    {
        Usuarios::where('usu_id', '=', $usu_id)->update(['usu_estado' => 'Inactivo']);
    }

    public function destroy(Usuarios $usuarios)
    {
        //
    }
}

/*        $datosU = $request->all();
        $item = usuarios::where('usu_usuario', '=', $datosU['usu_usuario'])->get('usu_password');  // if para ver si el user no existe
        if (!$item->isEmpty()) {
            if (Hash::check($datosU['usu_password'], $item[0]->usu_password)) {
                return response()->json("404", 200);
            } else {
                $usuariosMostrar = usuarios::where('usu_usuario', '=', $datosU['usu_usuario'])
                    ->where('usu_password', '=', $item[0]->usu_password)->get();
                    return response()->json($usuariosMostrar, 200);
            }
        } else {
            return response()->json("403", 200);
        }*/