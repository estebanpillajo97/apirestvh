<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::resource('usuarios', UsuariosController::class);
//Route::resource('eventos', EventosController::class);
//Route::resource('reservaciones', ReservacionesController::class);
//Route::resource('arreglos', ArreglosController::class);
//Route::resource('menus', MenusController::class);

//Route::resource('submenus', SubmenusController::class);
//Route::resource('roles', RolesController::class);
//mostrar
Route::get('/arreglos','ArreglosController@index');
Route::get('/aforo','SalonesController@aforo');
Route::get('/eventos','EventosController@index');
Route::get('/eventos_cliente','EventoClienteController@index');
Route::get('/menus','MenusController@index');
Route::get('/reservaciones','ReservacionesController@index');
Route::get('/reservas_cliente','ReservaClienteController@index');
Route::get('/roles','RolesController@index');
Route::get('/submenus','SubmenusController@index');
Route::get('/usuarios','UsuariosController@index');
Route::get('/usuarios_sin_rol','UsuariosController@sinRoles');
Route::get('/menus/listado','MenusController@mostrarTodosMenus');
Route::get('/submenus_select/{men_id}','SubmenusController@select');
Route::get('/eventos_cliente_filtrado/{ec_fecha}_{ec_fechaH}','EventoClienteController@filtradoFechas');
Route::get('/reservas_cliente_filtrado/{rc_fecha}_{rc_fechaH}','ReservaClienteController@filtradoFechas');
Route::get('/tipo_cedula','TipoCedulaController@index');
Route::get('/eventos_cliente_activos','EventoClienteController@activos');
Route::get('/eventos_cliente_inactivos','EventoClienteController@inactivos');
Route::get('/reservas_cliente_activos','ReservaClienteController@activos');
Route::get('/reservas_cliente_inactivos','ReservaClienteController@inactivos');
Route::get('/numAdultos','NumAdultosController@index');
Route::get('/numNinios','NumNiniosController@index');
Route::get('/numpersonasres','NumPersonasResController@index');
Route::get('/submenu_inventario_adultos/{sm_id}_{ec_fecha}_{ec_fechaH}','EventoClienteController@inventarioSubmenuAdultos');
Route::get('/submenu_inventario_ninios/{sm_id}_{ec_fecha}_{ec_fechaH}','EventoClienteController@inventarioSubmenuNinios');
Route::get('/submenu_inventario_tabla/{sm_id}_{ec_fecha}_{ec_fechaH}','EventoClienteController@inventarioSubmenuTabla');
Route::get('/submenu_inventario_menus/{sm_id}','EventoClienteController@inventarioSubmenus');
//Route::get('/reserva_cliente_aforo/{rc_fecha}_{rc_fechaH}', 'ReservaClienteController@inventarioAforo');
Route::get('/submenus/listado','SubmenusController@mostrarTodo');
Route::get('/salones','SalonesController@index');
Route::get('/aforo_reservas_eventos/{fecha}','SalonesController@aforoReservasEventos');
//Route::post('/usuarios_verify','UsuariosController@verificar');

//crear
Route::post('/arreglos','ArreglosController@store');
Route::post('/eventos','EventosController@store');
Route::post('/eventos_cliente','EventoClienteController@store');
Route::post('/menus', 'MenusController@store');
Route::post('/reservaciones','ReservacionesController@store');
Route::post('/reservas_cliente','ReservaClienteController@store');
Route::post('/roles', 'RolesController@store');
Route::post('/submenus','SubmenusController@store');
Route::post('/usuarios','UsuariosController@store');
Route::post('/salones','SalonesController@store');
Route::post('/usuarios/verify','UsuariosController@comprobarLogin');
//editar
Route::get('/arreglos/{arr_id}','ArreglosController@edit');
Route::post('/arreglos/{arr_id}', 'ArreglosController@update');
Route::get('/eventos/{eve_id}','EventosController@edit');
Route::post('/eventos/{eve_id}', 'EventosController@update');
Route::get('/eventos_cliente/{ec_id}','EventoClienteController@edit');
Route::post('/eventos_cliente/{ec_id}', 'EventoClienteController@update');
Route::get('/menus/{men_id}','MenusController@edit');
Route::post('/menus/{men_id}', 'MenusController@update');
Route::get('/reservaciones/{res_id}','ReservacionesController@edit');
Route::post('/reservaciones/{res_id}', 'ReservacionesController@update');
Route::get('/reservas_cliente/{rc_id}','ReservaClienteController@edit');
Route::post('/reservas_cliente/{rc_id}', 'ReservaClienteController@update');
Route::get('/roles/{rol_id}','RolesController@edit');
Route::post('/roles/{rol_id}', 'RolesController@update');
Route::get('/submenus/{sm_id}','SubmenusController@edit');
Route::post('/submenus/{sm_id}', 'SubmenusController@update');
Route::get('/usuarios/{usu_id}','UsuariosController@edit');
Route::post('/usuarios/{usu_id}', 'UsuariosController@update');
Route::get('/salones/{sa_id}','SalonesController@edit');
Route::post('/salones/{sa_id}', 'SalonesController@update');
//Activar e Inactivar
Route::post('/arreglos/{arr_id}/disable','ArreglosController@disable');
Route::post('/arreglos/{arr_id}/enable','ArreglosController@enable');
Route::post('/eventos/{eve_id}/disable','EventosController@disable');
Route::post('/eventos/{eve_id}/enable','EventosController@enable');
Route::post('/eventos_cliente/{ec_id}/disable','EventoClienteController@disable');
Route::post('/eventos_cliente/{ec_id}/enable','EventoClienteController@enable');
Route::post('/menus/{men_id}/disable','MenusController@disable');
Route::post('/menus/{men_id}/enable','MenusController@enable');
Route::post('/reservaciones/{res_id}/disable','ReservacionesController@disable');
Route::post('/reservaciones/{res_id}/enable','ReservacionesController@enable');
Route::post('/reservas_cliente/{rc_id}/disable','ReservaClienteController@disable');
Route::post('/reservas_cliente/{rc_id}/enable','ReservaClienteController@enable');
Route::post('/submenus/{sm_id}/disable','SubmenusController@disable');
Route::post('/submenus/{sm_id}/enable','SubmenusController@enable');
Route::post('/usuarios/{usu_id}/disable','UsuariosController@disable');
Route::post('/usuarios/{usu_id}/enable','UsuariosController@enable');
Route::post('/salones/{sa_id}/disable','SalonesController@disable');
Route::post('/salones/{sa_id}/enable','SalonesController@enable');