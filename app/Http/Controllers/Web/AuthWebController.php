<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthWebController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ], [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido',
            'password.required' => 'La contraseña es obligatoria',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors(['email' => 'Credenciales inválidas'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect()->route('clients.index')->with('success', 'Login OK');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
