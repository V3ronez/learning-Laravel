<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

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
        $contato = new SiteContato();

        $contato->name = $request->input('name');
        $contato->phone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->contact_reason = $request->input('motivo_contato');
        $contato->messenger = $request->input('textarea');
        $contato->save();

        //2-METODO DE PERSISTIR NO DB.
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        return view('site.contato', ['titulo' => 'titulo Controller']);
    }
}
