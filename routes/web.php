<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;




Route::get('/', function () {
    return redirect()->route('home');
});

//rutas del home publico
Route::get('home', [Login::class, 'Home'])->name('home');


Route::get('login', [Login::class, 'login'])->name('login');
Route::post('post-login', [Login::class, 'postLogin'])->name('login.post');
Route::get('registration', [Login::class, 'SignUp'])->name('register');
Route::post('post-registration', [Login::class, 'postRegistration'])->name('register.post');
Route::post('logout', [Login::class, 'logout'])->name('logout');





//rutas para autenticar 
Route::middleware([EnsureUserHasRole::class])->group(function () { // Ventanas para autenticar 
    Route::get('homeAdmin', [Login::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('ventanaAdmin', [Login::class, 'ventanaAdmin'])->name('ventanaAdmin');
    Route::get('libroCrear', [LibroController::class, 'crear'])->name('libroCrear');
    Route::post('GuardaBd', [LibroController::class, 'store'])->name('GuardaBd');
    Route::resource('libros', LibroController::class)->except(['show']);
    Route::resource('categorias', CategoriaController::class)->except(['show']);
    Route::get('libros', [LibroController::class, 'index'])->name('libros.index');
    Route::get('categorias', [CategoriaController::class, 'categoriaIndex'])->name('categorias.index');
    Route::get('categorias/{id}', [CategoriaController::class, 'mostrar'])->name('categorias.mostrar');
    
});



