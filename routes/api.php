<?php

use Illuminate\Http\Request;

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

Route::resource('cuadro-de-comandos','ComandoController',['only'=>['index','show']]);

Route::resource('franquiciado','FranquiciadoController',['only'=>['index','show']]);

Route::resource('clientes','ClientController',['only'=>['index','show']]);

Route::resource('mesas','MesaController',['only'=>['index','show']]);

Route::resource('pedidos','PedidoController');

Route::resource('reservas','ReservaController');

Route::resource('marketing','MarketingController',['only'=>['index','show']]);

Route::resource('push','PushController',['only'=>['index','show']]);

Route::resource('cupones','CuponController',['only'=>['index','show']]);

Route::resource('estadisticas','EstadisticaController',['only'=>['index','show']]);

Route::resource('comentarios','ComentarioController',['only'=>['index','show']]);

Route::resource('perfiles','PerfilController',['only'=>['index','show']]);

Route::resource('traducciones','TraduccionController',['only'=>['index','show']]);

route::resource('categorias','CategoryController');

	