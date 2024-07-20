<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\View\View;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function login(): View
    {
        return view('login.login');
    }
    public function Home(): View
    {
        $libros = Libro::all(); // todos los libros desde la base de datos
       return view('home', compact('libros')); // Pasar los libros a la vista 'home'

    }
    public function SignUp(): View
    {
        return view('login.signUp');
    }
    public function homeAdmin(): View
    {
        $libros = Libro::with('categoria')->get(); 
        return view('admi.homeAdmin', compact('libros'));
    }
    public function ventanaAdmin(): View
    {
        return view('admi.ventanaAdmin');
    }
    public function libroCrear(): View
    {
        return view('admi.crear');
    }
    public function libroeditaEliminar(): View
    {
        return view('admi.editaEliminar');
    }
}
