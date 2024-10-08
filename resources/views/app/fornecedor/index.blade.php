@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('fornecedor.create') }}">Novo</a></li>
                <li><a href="{{ route('fornecedor-search') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-right: auto; margin-left: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->id }}</td>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{ route('fornecedor.edit', ['fornecedor' => $fornecedor->id]) }}">Editar</a>
                                </td>
                                <td>
                                    <form id="form_{{ $fornecedor->id }}" method="post"
                                        action="{{ route('fornecedor.destroy', ['fornecedor' => $fornecedor->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $fornecedor->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='7'>
                                    <p>Lista de Produtos</p>
                                    {{ count($fornecedor->produtos) == 0 ? 'Nenhum produto cadastrado' : count($fornecedor->produtos) . ' produto(s)' }}
                                    <table border="1" style="margin: 0 auto; width: 60%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Descrição</th>
                                                <th>Peso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedor->produtos as $produto)
                                                <tr>
                                                    <td>{{ $produto->id }}</td>
                                                    <td>{{ $produto->nome }}</td>
                                                    <td>{{ $produto->descricao }}</td>
                                                    <td>{{ $produto->peso }} kg</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.layouts._components.registros', ['collection' => $fornecedores, 'request' => $request])
                @endcomponent
                @component('app.layouts._components.indices', ['collection' => $fornecedores, 'request' => $request])
                @endcomponent
                <br>
            </div>
        </div>
    @endsection
