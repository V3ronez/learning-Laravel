@extends('app.layout.base')
@section('titulo', 'Editar produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>
        <div class="menu">
            <li><a href="#">Voltar</a></li>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
