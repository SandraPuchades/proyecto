<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EnviarController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\UsuariosController;

Route::view('/login', "pages.login")->name('login');

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/iniciar-sesion', [LoginController::class, 'login'])->name('iniciar-sesion');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/foro/{id?}',[EnviarController::class,'mostrar'])->middleware('auth')->name('mostrar');

//Solo puede acceder los registrados.
Route::view('/foro-page', "pages.foro")->middleware('auth')->name('foro');

Route::post('/foro/{id?}',[EnviarController::class,'mostrar'] )->middleware('auth')->name('enviar');
Route::post('/hilo/{id?}', [EnviarController::class,'enviar'])->middleware('auth')->name('enviarMensajeHilo');
Route::get('/hilo/{id?}', [EnviarController::class,'mostarPadre'])->middleware('auth')->name('hilo');

Route::view('/hilo-pages', "pages.hilo")->middleware('auth')->name('hiloPage');

Route::get('/calendario-pages', [EventoController::class,'mostrarCalendario'])->middleware('auth')->name('calendario-pages');
Route::view('/calendario', "pages.evento")->middleware('auth')->name('calendario');
Route::post('/calendario-page', [EventoController::class,'crearEvento'])->middleware('auth')->name('crearEvento');

Route::get('/grupo-controller', [GruposController::class,'mostrarGruposUsuario'])->middleware('auth')->name('grupo');
Route::view('/grupos', "pages.grupo")->middleware('auth')->name('grupos');
Route::post('/unirse-grupo', [GruposController::class,'unirseGrupo'])->middleware('auth')->name('unirseGrupo');
Route::get('/grupo-delete', [GruposController::class,'elimiarUsuarioGrupo'])->middleware('auth')->name('user-delete');

Route::get('/user/{nombre}', [UsuariosController::class,'getDatosUsuario'])->middleware('auth')->name('user-name');
Route::view('/user', "pages.user")->middleware('auth')->name('user');

?>
