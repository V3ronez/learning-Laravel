@if (isset($produto_detalhe->id))
    <form method="POST" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="POST" action="{{ route('produto-detalhe.store') }}">
@endif
@csrf
<input type="text" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" name="produto_id"
    placeholder="ID do produto" class="borda-preta">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
<input type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento"
    placeholder="Comprimento" class="borda-preta">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
<input type="text" value="{{ $produto_detalhe->altura ?? old('altura') }}" name="altura" placeholder="Altura"
    class="borda-preta">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}
<input type="text" value="{{ $produto_detalhe->largura ?? old('largura') }}" name="largura" placeholder="Largura"
    class="borda-preta">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}
<select name="unidade_id">
    <option>-- Selecione a unidade de medida --</option>
    @foreach ($unidades as $unidade)
        <option
            value="{{ $unidade->id }}"{{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'Selected' : '' }}>
            {{ $unidade->descricao }}
        </option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
@if (isset($produto_detalhe->id))
    <button type="submit" class="borda-preta">Editar produto</button>
@else
    <button type="submit" class="borda-preta">Cadastrar</button>
@endif
</form>
