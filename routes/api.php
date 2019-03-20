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

Route::get('users', 'UserController@index')->name('api.users');
Route::get('franquicias', 'FranchiseController@index')->name('api.franchise');
/*
Route::resource('cuadro-de-comandos','ComandoController',['only'=>['index','show']]);

Route::resource('franquiciado','FranquiciadoController',['only'=>['index','show']]);

Route::resource('clientes','ClientController',['except'=>['create','edit']]);

//Route::post('clientes','ClientController@store')->name('clientes.store');

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

Route::resource('categorias','CategoryController',['only'=>['index','show']]);
*/


Route::post('oauth.token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

Route::get('/api/clasificaciones','ClassificationsController@index')->name('api.clasificaciones');

Route::post('/api/register','RegistrationController@store')->name('api.register');

Route::get('/api/franquiciado_estuve/{id}','SalesController@estuve')->name('api.sales_estuve');

Route::get('/api/mispuntos/{id}','PointsController@mispuntos')->name('api.mispuntos');
Route::get('/api/regalos/{id}','GiftsController@misregalos')->name('api.regalos');
Route::get('/api/reservas/{id}','BookingController@misreservas')->name('api.reservas');
Route::get('/api/pedidos/{id}','SalesController@mispedidos')->name('api.pedidos');
Route::get('/api/cupones/{id}','CouponsController@miscupones')->name('api.cupones');

Route::get('/franquiciado/detaill_franchised/{id}','ClientController@getDetailRestaurante')->name('api.detaillrestaurant');
Route::get('/api/puntajes/{id}','ClientsComentariosController@getResumenPuntajes')->name('api.puntajes');




	