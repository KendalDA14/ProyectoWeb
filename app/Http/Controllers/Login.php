<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;


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

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        //$remember = $request->has('remember'); // Verifica si el checkbox "remember me" está marcado

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('You have Successfully logged in');
        }

        return redirect("login")->withErrors('Oops! You have entered invalid credentials');
    }

    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);

        return redirect("home")->withSuccess('Great! You have Successfully loggedin');
        
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return Redirect('home');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
