@extends('app.layout.base')
@section('titulo', 'Produto detalhes')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Produto</p>
        </div>
        <div class="menu">
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <table border="1">
                        <tr>
                            <td>ID:</td>
                            <td>{{ $produto->id }}</td>
                        </tr>
                        <tr>
                            <td>Nome:</td>
                            <td>{{ $produto->nome }}</td>
                        </tr>
                        <tr>
                            <td>Descrição:</td>
                            <td>{{ $produto->descricao }}</td>
                        </tr>
                        <tr>
                            <td>Peso:</td>
                            <td>{{ $produto->peso }}</td>
                        </tr>
                        <tr>
                            <td>Unidade:</td>
                            <td>{{ $produto->unidade_id }}</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
