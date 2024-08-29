@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }} - Pesquisar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div>
                {{ $msg ?? '' }}
                <form action="{{ route('app.fornecedor.listar') }}" method="post">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" id="" class="borda-preta">
                    <input type="text" name="site" placeholder="Site" id="" class="borda-preta">
                    <input type="text" name="uf" placeholder="UF" id="" class="borda-preta">
                    <input type="text" name="email" placeholder="Email" id="" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
