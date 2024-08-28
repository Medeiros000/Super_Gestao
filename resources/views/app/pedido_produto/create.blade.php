@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <span>ID do Cliente: {{ $pedido->cliente_id }}</span>
            <span>{{$pedido->cliente->nome}}</span>
            <div style="width:50%; margin: 0 auto">
                <h4>Itens do pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Data de inclusão</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pedido->produtos) == 0)
                            <tr>
                                <td colspan="4">Nenhum item encontrado</td>
                            </tr>
                        @else
                        {{-- {{$pedido->produtos}} --}}
                            @foreach ($pedido->produtos as $produto)
                                <tr>
                                    <td>{{ $produto->id }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->pivot->quantidade }}</td>
                                    <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <form id="form_{{ $produto->pivot->id }}" method="post"
                                            action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido' => $pedido->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="#"
                                                onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Excluir</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
