@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-right: auto; margin-left: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
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
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $fornecedores->appends($request)->links() }}
                <div style="margin: 1rem">
                    <a style="margin: 0.5rem; text-decoration:none;" href="{{ $fornecedores->appends($request)->previousPageUrl() ?? '' }}">« Anterior</a>
                            Exibindo {{ ($fornecedores->firstItem()) }} ao {{ ($fornecedores->lastItem()) }} do total de {{ $fornecedores->total() }}
                    <a style="margin: 0.5rem; text-decoration:none;" href="{{ $fornecedores->appends($request)->nextPageUrl() ?? '' }}">Próxima »</a>
                </div>
                <br>
                {{-- {{ print_r($request) }} --}}
            </div>
        </div>
    </div>
@endsection
