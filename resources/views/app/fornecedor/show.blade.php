@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar {{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('fornecedor.index') }}">Voltar</a></li>
                <li><a href="{{ route('fornecedor-search') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:50%; margin: 0 auto">
                <table border="1" style="width:100%; text-align: left; margin: 0 auto;">
                    <tr>
                        <td>Fornecedor id:</td>
                        <td>{{ $fornecedor->id }}</td>
                    </tr>
                    <tr>
                        <td>ID:</td>
                        <td>{{ $fornecedor->nome }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
