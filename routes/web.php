<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::view('/login', "pages.login")->name('login');


//Solo puede acceder los registrados.
Route::view('/chat', "pages.chat")->middleware('auth')->name('principal');

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/iniciar-sesion', [LoginController::class, 'login'])->name('iniciar-sesion');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');



Route::post('/buscar-usuario', [BuscarController::class, 'busqueda'])->name('buscar-usuario');


