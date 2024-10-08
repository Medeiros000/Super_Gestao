@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin: 0 auto">
                @component('app.produto._components.form_create_edit', ['unidades' => $unidades, 'produto' => $produto, 'fornecedores' => $fornecedores])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
