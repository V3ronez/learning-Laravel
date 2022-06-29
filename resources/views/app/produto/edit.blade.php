@extends('app.layout.base')
@section('titulo', 'Editar produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>
        <div class="menu">
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form method="POST" action="{{ route('produto.update', ['produto' => $produto]) }}">
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{ $produto->nome ?? old('nome') }}" name="nome" placeholder="nome"
                        class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" value="{{ $produto->descricao ?? old('descricao') }}" name="descricao"
                        placeholder="descrição" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    <input type="text" value="{{ $produto->peso ?? old('peso') }}" name="peso" placeholder="peso"
                        class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                    <select name="unidade_id">
                        <option>-- Selecione a unidade de medida --</option>
                        @foreach ($unidades as $unidade)
                            <option
                                value="{{ $unidade->id }}"{{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'Selected' : '' }}>
                                {{ $unidade->descricao }}
                            </option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <button type="submit" class="borda-preta">Atualizar produto</button>
                </form>
            </div>
        </div>
    </div>
@endsection
