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
Route::get('clientes', 'ClientController@index')->name('api.client');
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

//recibe los puntos de un usuario no del cliente como parte de compras de puntos para subir en ranking
Route::get('/api/mispuntos/{id}','UserClientPointController@mispuntos')->name('api.mispuntos');

Route::get('/api/regalos/{id}','GiftsController@misregalos')->name('api.regalos');
Route::get('/api/reservas/{id}','BookingController@misreservas')->name('api.reservas');
Route::get('/api/pedidos/{id}','SalesController@mispedidos')->name('api.pedidos');
Route::get('/api/cupones/{id}','CouponsController@miscupones')->name('api.cupones');

//para ver todos los cupones vigentes
Route::get('/api/allcupones','CouponsController@allcupones')->name('api.allcupones');

//para hacer una reservacion desde el app
Route::post('/api/reservar','BookingController@store')->name('api.reservar');

//obtiene los datos detallados de un client
Route::get('/franquiciado/detaill_franchised/{id}','ClientController@getDetailRestaurante')->name('api.detaillrestaurant');

//obtiene el puntaje promedio de un cliente
Route::get('/api/puntajes/{id}','ClientsComentariosController@getResumenPuntajes')->name('api.puntajes');

//para ver las categorias, subcategorias y tipos de platos en un restaurante
Route::get('/api/franquicia_categories/{id}','CategoryController@getFranchiseedCategories')->name('api.franchiseed_category');
Route::get('/api/franquicia_subcategories/{id}','CategoryController@getFranchiseedSubCategories')->name('api.franchiseed_subcategory');
Route::get('/api/franquicia_platos/{id}','MenusController@getFranchiseedMenus')->name('api.franchiseed_menus');
    
//para enviar un pedido delivery o local 
Route::post('/api/pedido','SalesController@store')->name('api.pedido.store');

//obtiene los datos del encargado del franchiseed
Route::get('/api/data_contact/{id}','FranchiseedController@data_contact')->name('api.franchiseed.data_contact');

//cuando el usuario accede por qr a un local
Route::get('/api/inside_restaurante/{id}','ClientController@inside_restaurante')->name('api.client.insideqr');

//devuelve la informacion basica del restaurante, no la detallada
Route::get('/api/franquicia_basic/{id}','ClientController@franquicia_basic')->name('api.client.insideqr');

//devuelve la informacion del mozo
Route::get('/api/info_mozo/{id}','MozosController@getinfo')->name('api.mozo.getinfo');

//devuelve los puntajes de un cliente de un client
Route::get('/api/puntajes_single/{client_id}/{user_id}','PointsController@puntajes_single')->name('api.points.puntajes_single');

//recibe la calificacion del mozo y comentarios
Route::post('/api/calificacion/{id}','MozoController@calificacion')->name('api.mozo.calificacion');

//cuando ve un plato el usuario, envia el dato
Route::post('/api/viomenu','MenusController@see')->name('api.menus.see');

//cuando hace un pedido, para cada plato se registra su preferencia
Route::post('/api/pidiomenu','MenusController@pidio')->name('api.menus.like');

//cuando un usuario envia una foto de un restaurante
Route::post('/api/client_photofranchiseed','FranchiseedController@client_photo')->name('api.franchiseed.client_photo');

//cuando un usuario hace un comentario y su puntuacion de un restaurante
Route::post('/api/client_comentariofranchiseed','FranchiseedController@client_comentario')->name('api.franchiseed.client_comentario');
 
//cuando el login es en android o iphone
Route::post('/api/deviceLogin','HomeController@logindevice')->name('api.login.typedevice');

//devuelve el voucher del cliente
Route::get('/api/voucher','MozoController@get_voucher')->name('api.mozo.get_voucher');

//el comensal solicita la asistencia del mozo, debe llegar una notificacion
Route::get('/api/llamarMozo/{id}','MozoController@llamar_mozo')->name('api.mozo.llamar_mozo');


//////////////////////////////////
Route::get('/api/photos_restaurante/{id}','ClientController@photos_restaurante')->name('api.client.photos_restaurante');
Route::get('/api/politicas_restaurante/{id}','ClientController@politicas_restaurante')->name('api.client.politicas_restaurante');
Route::get('/api/horarios_restaurante/{id}','ClientController@horarios_restaurante')->name('api.client.horarios_restaurante');
Route::get('/api/services_restaurante/{id}','ClientController@services_restaurante')->name('api.client.services_restaurante');
Route::get('/api/resenias_restaurante/{id}','ClientController@resenias_restaurante')->name('api.client.resenias_restaurante');

//cuando le da like a un plato el usuario, envia el dato
Route::post('/api/post_like_plato','UserMenuLikeController@store')->name('api.menulike.post');

//cuando le da like a un franquisiado el usuario, envia el dato
Route::post('/api/post_like_restaurante','UserClientLikeController@store')->name('api.clientlike.post');

//cuando le da like a un franquisiado el usuario, envia el dato
Route::get('/api/franquicia_guarniciones/{id}','CategoryController@get_guarniciones')->name('api.category.get_guarniciones');

//cuando accede recolecta los datos segun genero
Route::post('/api/store_access_gener','AccessGenerController@store')->name('api.access.gener');

//cuando accede recolecta los datos segun tipo de dispositivo
Route::post('/api/store_access_device','AccessDeviceController@store')->name('api.access.device');

//cuando accede recolecta los datos segun tipo de dispositivo
Route::post('/api/store_access_age','AccessAgeController@store')->name('api.access.age');

//lista de restaurantes favoritos
Route::get('/api/userfav_restaurants/{id}','UserClientLikeController@userLikes')->name('api.fav_restaurant.get');

//lista de platos o menus favoritos
Route::get('/api/userfav_menus/{id}','UserMenuLikeController@userLikes')->name('api.fav_menu.get');

//cancela un pedido
Route::post('/api/cancelar_pedido','SalesController@cancelar')->name('api.sales.get');

//cancela una reserva
Route::post('/api/cancelar_reserva','BookingController@cancelar')->name('api.booking.get');

//otorga puntos al usuario
Route::post('/api/put_points_user','UserClientPointController@store')->name('api.client_point.store');

//registra la ultima vez que un usuario ingreso al sistema o que se deslogueo
Route::post('/api/cel_activo','UserActivoController@store')->name('api.user_activo.store');

//registrar visita
Route::post('/api/registrar_visita','ClientVisitaController@store')->name('api.registrar_visita.store');

//ver mesas disponibles
Route::get('/api/mesas/enabled/{sector_id}/{dia}/{h0}/{hf}','MesaController@enabled')->name('mesas.create')
/*->middleware('permission:mesas.enabled')*/;
 
//obtiene lista de sectores
Route::get('/api/sector/{client}','SectorController@fromClient')->name('sector.client');

//añade el numero telefonico del usuario
Route::post('/api/user/addcellphone','UserController@addCellphone')->name('user.cellphone');

//mercado pago, crear preferencia
Route::post('/api/mercadopago/gen_preference','MercadoPagoController@createPaymentPreferences')->name('mercadopago.createPreferences');

Route::get('/api/mercadopago/on_success','MercadoPagoController@onPaymentSuccess')->name('sector.sucess');

Route::get('/api/mercadopago/on_cancelled','MercadoPagoController@onPaymentCancelled')->name('sector.cancelled');

Route::get('/api/mercadopago/on_rejected','MercadoPagoController@onPaymentRejected')->name('sector.rejected');

Route::get('/api/mercadopago/notification_url','MercadoPagoController@notification_url')->name('sector.notification');

