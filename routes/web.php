<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReservaMailable;
use Illuminate\Support\Facades\Mail;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/post.avatar/{filename}', [App\Http\Controllers\AdminController::class, 'getavatar'])->name('getavatar');

Route::get('/post/{filename}', [App\Http\Controllers\HomeController::class, 'getimagee'])->name('getimagee');


/*****************************************************************************/
/* USERS */

//editar usuari
Route::get('/edit', [App\Http\Controllers\UserController::class, 'index'])->name('edit');

Route::put('/edita', [App\Http\Controllers\UserController::class, 'update'])->name('edita');

Route::get('/editpass', [App\Http\Controllers\UserController::class, 'updatepass'])->name('editpass');



//eliminar usuari

Route::get('/deleteuser', [App\Http\Controllers\UserController::class, 'deleteuser'])->name('deleteuser');
Route::get('/deleteusersegur', [App\Http\Controllers\UserController::class, 'deleteusersegur'])->name('deleteusersegur');

/*****************************************************************************/
/* CARTA */
//crear platos

Route::get('/crea_plat', [App\Http\Controllers\CartaController::class, 'index'])->name('plat');

Route::put('/crear', [App\Http\Controllers\CartaController::class, 'update'])->name('crear');

Route::get('/carta', [App\Http\Controllers\CartaController::class, 'show'])->name('carta');

//imagenes carta
Route::get('/entr/{filename}', [App\Http\Controllers\CartaController::class, 'getimageE'])->name('getimageEE');

Route::get('/prim/{filename}', [App\Http\Controllers\CartaController::class, 'getimagePP'])->name('getimagePP');

Route::get('/postre/{filename}', [App\Http\Controllers\CartaController::class, 'getimageP'])->name('getimageP');

Route::get('/vino/{filename}', [App\Http\Controllers\CartaController::class, 'getimageV'])->name('getimageV');




//eliminar platos carta

Route::get('/eliminaplat/{filename}/{filename2}', [App\Http\Controllers\CartaController::class, 'eliminar'])->name('eliminaplat');

//detail de plato de la carta

Route::get('/detailE/{filename}', [App\Http\Controllers\CartaController::class, 'detailE'])->name('detailE');
Route::get('/detailPP/{filename}', [App\Http\Controllers\CartaController::class, 'detailPP'])->name('detailPP');
Route::get('/detailP/{filename}', [App\Http\Controllers\CartaController::class, 'detailP'])->name('detailP');

//Carta vinos

Route::get('/crea_vi', [App\Http\Controllers\CartaController::class, 'index2'])->name('vi');

Route::put('/afegir_vi', [App\Http\Controllers\CartaController::class, 'update2'])->name('af_vi');

Route::get('/carta_vino', [App\Http\Controllers\CartaController::class, 'show2'])->name('carta_vi');

//eliminar carta vinos
Route::get('/eliminavi/{filename}', [App\Http\Controllers\CartaController::class, 'eliminarvino'])->name('eliminavi');



//EDITAR ROLES
Route::get('/edit-role', [App\Http\Controllers\AdminController::class, 'index'])->name('edit-role');

Route::get('/editaa-role/{filename}', [App\Http\Controllers\AdminController::class, 'update'])->name('editaa-role');

//EDITAR RESERVAS
Route::get('/edit-reserva', [App\Http\Controllers\AdminController::class, 'reservestaules'])->name('edit-reserva');

Route::get('/editaa-reserva/{filename}', [App\Http\Controllers\AdminController::class, 'updatereserva'])->name('editaa-reserva');

Route::get('/elimina-reserva', [App\Http\Controllers\AdminController::class, 'eliminareserva'])->name('elimina-reserva');



//crear menu

Route::get('/crea_menu', [App\Http\Controllers\MenuController::class, 'index'])->name('dia');

Route::put('/Menu_created', [App\Http\Controllers\MenuController::class, 'update'])->name('crearM');

Route::get('/menu-dia', [App\Http\Controllers\MenuController::class, 'show'])->name('menu');



//penjar events

Route::get('/imgnova', [App\Http\Controllers\EventoController::class, 'penja'])->name('imgnova');

Route::put('/imgnovaa', [App\Http\Controllers\EventoController::class, 'penjaimg'])->name('imgnovaa');


Route::get('/image/{filename}', [App\Http\Controllers\UserController::class, 'getimage'])->name('avatar');

//eliminar events


Route::get('/veureevents', [App\Http\Controllers\AdminController::class, 'veureevents'])->name('veureevents');
Route::get('/updateevent/{filename}', [App\Http\Controllers\AdminController::class, 'updateevent'])->name('updateevent');

//Reserva

Route::get('/res', [App\Http\Controllers\ReservaController::class, 'index'])->name('reserva');
Route::get('/res2', [App\Http\Controllers\ReservaController::class, 'reserva'])->name('reserva2');

Route::get('/verres', [App\Http\Controllers\UserController::class, 'verreserva'])->name('verreserva');
Route::get('/verres2/{filename}', [App\Http\Controllers\UserController::class, 'updateverreserva'])->name('verreserva2');



//contacte

Route::get('/contact-form', [App\Http\Controllers\EmailController::class,'contacto'])->name('contact-form');

Route::get('/emailres', [App\Http\Controllers\EmailController::class,'emailreserva'])->name('emailres');

Route::get('/emailcon', [App\Http\Controllers\EmailController::class,'emailcontact'])->name('emailcon');







