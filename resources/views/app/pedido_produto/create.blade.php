@extends('app.layout.base')
@section('titulo', 'Pedido produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Pedido Produto</p>
        </div>
        <div class="menu">
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </div>
        <div class="informacao-pagina">
            <h3>Detalhes do produto</h3>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <h3>Itens pedido</h3>
                <table border="1" width=100%>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome Produto</th>
                            <th>Data de criação</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- $pedido->produtos é igual utilizar o eager loagin --}}
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <th>{{ $produto->id }}</th>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->pivot->created_at->format('d/m/Y - H:i:s') }}</th>
                                <th>
                                    {{-- <form id="form_{{ $pedido->id }}_{{ $produto->id }}" method="POST"        FORMA ANTIGA --}}
                                    <form id="form_{{ $produto->pivot->id }}" method="POST"
                                        action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Excluir</a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @component('app.pedido_produto._components.form_create', ['produtos' => $produtos, 'pedido' => $pedido])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
