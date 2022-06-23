<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;


class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if($request->get('erro')== 1) {
            $erro = 'Usuário e/ou Senha inválido';
        }

        if($request->get('erro')== 2) {
            $erro = 'Necessário fazer login';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request)
    {
        //regra de validacao
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        //msg de erro da validacao
        $errorMsg = [
            'usuario.email' => 'O campo usuário deve ser preenchido corretamente',
            'senha.required' => 'O campo senha deve ser informado'
        ];

        //validando
        $request->validate($regras, $errorMsg);

        //recebendo os valores do login
        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();



        if(isset($usuario->name)) {
            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        }else {
            return redirect()-> route('site.login', ['erro' => 1]);
        }

    }
    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
