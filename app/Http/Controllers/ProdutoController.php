<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //eager loading
        $produtos = Produto::with(['produtoDetalhe', 'fornecedor'])->paginate(10);

        // --- forma 'complicada' de fazer relacao 1 pra 1 de atributos de outras tabelas ---

        // // dd($produtos);
        // foreach ($produtos as $key => $produto) {
        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
        //     //sem first o return é uma -- Collection ProdutoDetalhe
        //     //com first ja é a propria instancia -- ProdutoDetalhe

        //     if (isset($produtoDetalhe)) {
        //         // $produtos[$key/indice]['nome_para_representar_a_key']
        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;
        //     }
        // // dd($produtos);
        // }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        // dd($unidades);
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tratando request separadamente antes de persistir no db;
        // $produto = new Produto();
        // $nome = $request->get('nome');
        // $descricao = $request->get('descricao');

        // $nome = strtolower($nome);
        // $descricao = strtolower($descricao);

        // $produto->nome = $nome;
        // $produto->descricao = $descricao;
        // $produto->save();

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id', //exists:<table>,<column>
        ];
        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo Nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo Descrição deve ter no mínimo 5 caracteres',
            'descricao.max' => 'O campo Descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo Peso deve ser um inteiro',
            'unidade_id.exists' => 'Selecione uma opção acima',
            'fornecedor_id.exists' => 'Um fornecedor válido deve ser escolhido',
        ];

        $request->validate($regras, $feedbacks);

        // persistir sem validar
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        // print_r($request->all()); //novos valores a serem atualizado
        // echo '<br><br><br><br>';
        // print_r($produto); //instancia desatualizada do produto

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id', //exists:<table>,<column>
        ];
        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo Nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo Descrição deve ter no mínimo 5 caracteres',
            'descricao.max' => 'O campo Descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo Peso deve ser um inteiro',
            'unidade_id.exists' => 'Selecione uma opção acima',
            'fornecedor_id.exists' => 'Um fornecedor válido deve ser escolhido',
        ];

        $request->validate($regras, $feedbacks);
        $produto->update($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {

        $produto->delete();
        return redirect()->route('produto.index');
    }
}
