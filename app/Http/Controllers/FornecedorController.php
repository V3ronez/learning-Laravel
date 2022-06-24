<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }
    public function adicionar(Request $request)
    {
        $msgSucess = '';

        //inclusao
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:25',
                'site' => 'required|',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];
            $feedback = [
                'required' => 'O campo ":attribute" deve ser preenchido',
                'nome.min' => 'O campo "Nome" deve ter entre 3 e 25 caracteres',
                'nome.max' => 'O campo "Nome" deve ter no máximo 25 caracteres',
                'uf.min' => 'O campo "UF" deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo "UF" deve ter no máximo 2 caracteres',
                'email.email' => 'O campo "Email" está inválido',
            ];
            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msgSucess = 'Cadastro realizado com sucesso!';
        }

        //Update
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msgSucess = 'Atualização feita com sucesso';
            }
            else {
                $msgSucess = 'Erro ao atualizar, tente novamente em alguns segundo.';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msgSucess' => $msgSucess]);
        }

        return view('app.fornecedor.adicionar', ['msgSucess' => $msgSucess]);
    }
    public function listar(Request $request)
    {

        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome'))
            ->where('site', 'like', '%' . $request->input('site'))
            ->where('uf', 'like', '%' . $request->input('uf'))
            ->where('email', 'like', '%' . $request->input('email'))->get();
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }
    public function editar($id, $msgSucess = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msgSucess' => $msgSucess]);
    }
}
