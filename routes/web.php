<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
});

//
Route::get('home', [Login::class, 'Home'])->name('home');
Route::get('login', [Login::class, 'login'])->name('login');
Route::get('signUp', [Login::class, 'SignUp'])->name('SignUp');
Route::get('homeAdmin', [Login::class, 'homeAdmin'])->name('homeAdmin');
Route::get('ventanaAdmin', [Login::class, 'ventanaAdmin'])->name('ventanaAdmin');
Route::get('libroCrear', [LibroController::class, 'crear'])->name('libroCrear');
Route::post('GuardaBd', [LibroController::class, 'store'])->name('GuardaBd');
Route::resource('libros', LibroController::class)->except(['show']);
Route::resource('categorias', CategoriaController::class)->except(['show']);



Route::middleware('auth')->group(function () {
/* Route::resource('libros', LibroController::class)->except(['show']);
    Route::resource('categorias', CategoriaController::class)->except(['show']);
    Route::get('homeAdmin', [Login::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('ventanaAdmin', [Login::class, 'ventanaAdmin'])->name('ventanaAdmin');*/
});
