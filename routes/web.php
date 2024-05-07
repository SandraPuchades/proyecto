<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EnviarController;
use App\Http\Controllers\EventoController;


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

Route::get('/calendario-', [EventoController::class,'mostarCalendario'])->middleware('auth')->name('calendario-page');
Route::view('/calendario', "pages.evento")->middleware('auth')->name('calendario');
Route::get('/mostarCalendario',[EventoController::class,'mostarCalendario'])->middleware('auth')->name('mostarCalendario');
Route::post('/calendario-page', [EventoController::class,'crearEvento'])->middleware('auth')->name('crearEvento');



?>
