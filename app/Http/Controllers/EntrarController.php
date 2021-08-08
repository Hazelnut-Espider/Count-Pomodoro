<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
    }

    public function entrar(Request $request)
    {
        if (!Auth::user($request->only(['email', 'password']))){
            return redirect()->back()->withErrors('Erro ao tentar autenticar, usuário/senha incorreto(s)');
        }

        return redirect()->route('listar_series');
    }
}
