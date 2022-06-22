<h1>Fornecedor</h1>

{{-- comment test --}}
{{-- ?? 'texto default'--}}
{{-- @ escapa o caracter e não faz a interpretação--}}

{{ 'txt de teste - blade' }}
<br />
<?= 'texto de teste - php' ?>

@php
// comment php

echo '<br />echo do php puro<br />';
@endphp


{{-- array --}}
{{-- @dd($fornecedores) --}}

{{-- if --}}
@if(count($fornecedores) > 1 && count($fornecedores) < 10)
    <h3>Existem varios fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existe muitos fornecedores</h3>
@else
    <h3>Esse é o limite máximo de fornecedores</h3>
@endif
<br>

@isset($fornecedores)
{{-- @for($i = 0; isset($fornecedores[$i]); $i++) --}}
{{-- @foreach ($fornecedores as $indice => $fornecedor) --}}

        Fornecedor: {{$fornecedores['nome']}}
        <br>
        Status: {{$fornecedores['status']}}
        <br>
        CNPJ: {{$fornecedores['cnpj'] ?? 'Dados não preenchidos'}} {{-- ?? 'texto default'--}}

<hr>
{{-- @endforeach --}}
{{-- @endfor --}}


    {{-- Fornecedor: {{$fornecedores[1] ['nome']}}
    <br>
    Status: {{$fornecedores[1] ['status']}}
    <br>
    @isset($fornecedores[1] ['cnpj'])
    CNPJ: {{$fornecedores[1] ['cnpj']}}
    @empty($fornecedores[1] ['cnpj'])
        -Vazioo
    @endempty
    @endisset --}}
@endisset

{{-- @unless  retorna se a condicao for false @endunless --}}