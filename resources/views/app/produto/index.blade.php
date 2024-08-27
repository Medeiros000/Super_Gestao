@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de {{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-right: auto; margin-left: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Id</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade->unidade }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? '' }} {{ $produto->itemDetalhe->unidade->unidade ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '' }} {{ $produto->itemDetalhe->unidade->unidade ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '' }} {{ $produto->itemDetalhe->unidade->unidade ?? ''}}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $produto->id }}" method="post"
                                        action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
								{{-- {{ $produtos->appends($request)->links() }} --}}
                @component('app.layouts._components.registros', ['collection' => $produtos, 'request' => $request])
                @endcomponent
                @component('app.layouts._components.indices', ['collection' => $produtos, 'request' => $request])
                @endcomponent

                <br>
            </div>
        </div>
    @endsection
