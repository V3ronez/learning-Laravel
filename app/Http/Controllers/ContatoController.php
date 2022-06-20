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
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:150',
        ]);
    // SiteContato::create($request->all());
    }
}
