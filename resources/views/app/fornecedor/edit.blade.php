@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('fornecedor.index') }}">Voltar</a></li>
                <li><a href="{{ route('fornecedor-search') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin: 0 auto">
                @component('app.fornecedor._components.form_create_edit', ['fornecedor' => $fornecedor])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
