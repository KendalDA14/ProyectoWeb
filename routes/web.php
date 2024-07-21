<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
});

//rutas del home publico
Route::get('home', [Login::class, 'Home'])->name('home');
Route::get('login', [Login::class, 'login'])->name('login');
Route::get('signUp', [Login::class, 'SignUp'])->name('SignUp');

//rutas del home admin
Route::get('homeAdmin', [Login::class, 'homeAdmin'])->name('homeAdmin');
Route::get('ventanaAdmin', [Login::class, 'ventanaAdmin'])->name('ventanaAdmin');
Route::get('libroCrear', [LibroController::class, 'crear'])->name('libroCrear');
Route::post('GuardaBd', [LibroController::class, 'store'])->name('GuardaBd');
Route::resource('libros', LibroController::class)->except(['show']);
Route::resource('categorias', CategoriaController::class)->except(['show']);


//rutas para autenticar 
Route::middleware('auth')->group(function () { // Ventanas para autenticar 
    /* Route::resource('libros', LibroController::class)->except(['show']);
    Route::resource('categorias', CategoriaController::class)->except(['show']);
    Route::get('homeAdmin', [Login::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('ventanaAdmin', [Login::class, 'ventanaAdmin'])->name('ventanaAdmin');*/
});

//rutas para ver categorías
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/categorias', [CategoriaController::class, 'categoriaIndex'])->name('categorias.index');
Route::get('/categorias/{id}', [CategoriaController::class, 'mostrar'])->name('categorias.mostrar');


/*Route::get('sucursales', function () {
    $libro = libro::all();
    $categoria = categoria::all();
    return view('admi.ventana', compact('libros', 'categorias'));
})->name('sucursales');*/

