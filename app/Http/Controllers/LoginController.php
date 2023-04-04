<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Verificar credenciales
        if (Auth::attempt($request->only('email', 'password'))) {
            // Guardar sesión
            session()->regenerate();
            session(['user' => Auth::user()]);
            session()->save();

            // Redirigir a la página de inicio
            return redirect()->intended('/productos')->with('session', session('user'));
        }

        // Si las credenciales son inválidas, mostrar un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar la sesión del usuario actual
        $request->session()->invalidate(); // Invalidar la sesión actual
        $request->session()->regenerateToken(); // Generar un nuevo token CSRF
        return redirect('/'); // Redirigir a la página de inicio
    }

    function form(Request $r)
    {
        return view('login');
    }
}