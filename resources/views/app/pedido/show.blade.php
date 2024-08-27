@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:50%; margin: 0 auto">
                <table border="1" style="width:100%; text-align: left; margin: 0 auto;">
                    <tr>
                        <td>Fornecedor id:</td>
                        <td>{{ $pedido->produto_id }}</td>
                    </tr>
                    <tr>
                        <td>ID:</td>
                        <td>{{ $pedido->cliente_id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
