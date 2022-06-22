<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('site.login', ['titulo' => 'Login']);
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

        $request->validate($regras, $errorMsg);

        //recebendo os valores do login
        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();


        if(isset($usuario->name)) {
            echo('Usuário existe');
        }else {
            echo 'Usuário não existe';
        }

        //validando
    }
}
