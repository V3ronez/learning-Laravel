<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        // echo('<pre>');
        // print_r($request->all()); //acessar as info encaminhas pelos forms (O ARRAY DE PARAM)
        // echo('</pre>');
        // echo('</br');
        // $name = $request->input('name');
        // echo($name); //acessar o valor de um input especifico


        // 1-METODO DE SALVAR NO DB; $contato->(nome da coluna no db);
        // $contato = new SiteContato();

        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        // 2-METODO DE PERSISTIR NO DB.
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        //array para comparacao com info que veio do DB
        // $motivo_contatos = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação',
        // ];
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'titulo Controller', 'motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request)
    {
        //'nome' = name do input do form e nome da coluna no db;
        $validation = [
            'nome' => 'required|min:3|max:50|unique:site_contatos', //a coluna tem que tem o mesmo nome que o 'name' do input
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:150',
        ];

        $customErrors = [
            'nome.required' => 'O nome deve ser preenchido.',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
            'nome.max' => 'O nome deve ter pelo máximo 40 caracteres',
            'nome.unique' => 'Nome ja utilizado',
            'telefone.required' => 'O telefone deve ser preenchido',
            'email.email' => 'Email inválido',
            'motivo_contatos_id.required' => 'Selecione um motivo do contato',
            'mensagem.reqired' => 'Mensagem deve ser preenchida',
            'mensagem.max' => 'A mensagem deve ter no máximo 150 caracteres',

            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($validation, $customErrors);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
