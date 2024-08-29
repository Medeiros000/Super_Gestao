@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="informacao-pagina">
            <div>
                <p>
                    Ideal para ser visualizado em telas de 1366x768 à 1920x1080. Foi adicionada visualização para telas menores mas não é a melhor experiência. Para telas mobile, a visualização não é apropriada.
                </p>
            </div>
        </div>
    </div>
@endsection
