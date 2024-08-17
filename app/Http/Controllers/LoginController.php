<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro =
            match (intval($request->get('erro'))) {
                1 => 'Usuário ou senha não existe',
                2 => 'Necessário realizar login para ter acesso',
                default => '',
            };

        return view('site.login', ['titulo' => 'login',  'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $usuario = $request->usuario;
        $password = $request->senha;


        $user = new User();

        $usuario = $user->where('email', $usuario)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
