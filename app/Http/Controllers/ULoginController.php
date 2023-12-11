<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fazenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ULoginController extends Controller
{
    public function u_inicio()
    {
        return view('usuario.inicio');
    }
    //======================================
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    //======================================
    public function login()
    {
        $faz = Fazenda::whereNull('delete')->get();
        return view('login', compact('faz'));
    }
    //======================================
    public function login_user(Request $r)
    {
        $credentials = $r->only('name', 'password', 'fazenda_id');
        if (Auth::attempt($credentials)) {
            return redirect()->route('u_inicio');
        } else {
            toast('Usuario ou Senha Invalido', 'error');
            return redirect()->route('login');
        }
    }
    //======================================
}
