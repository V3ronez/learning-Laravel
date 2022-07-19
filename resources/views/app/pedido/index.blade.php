@extends('app.layout.base')
@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de pedidos</p>
        </div>
        <div class="menu">
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </div>
        <div class="informacao-pagina">
            <div style="width:80%; margin-left:auto; margin-right:auto;">
                <table border="1" width="90%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar produto</a></td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $pedido->id }}" method="POST"
                                        action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pedidos->appends($request)->links() }}
                <br />
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de
                {{ $pedidos->firstItem() }} até
                {{ $pedidos->lastItem() }})
            </div>
        </div>
    </div>

@endsection
