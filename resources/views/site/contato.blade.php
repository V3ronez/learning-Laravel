@extends('site.layouts.base')

@section('titulo', $titulo)
@section('conteudo')
    @include('site.layouts.__partials.top')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entrem em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts.__components.form_contato', ['classe' => 'borda-preta'])
                    {{-- aqui entra o codigo do $slot --}}
                    {{-- Array associativo ['classe'] vira $classe --}}
                    {{-- 'borda-preta' é uma classe css --}}
                    <p>Nossa equipe leva em média de 48 horas para retornar. Aguarde por favor</p>
                    <p>Agradecemos o contato e volte sempre.</p>
                @endcomponent
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
