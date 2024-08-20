@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin: 0 auto">
                <form action="{{ route('produto.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <input type="text" name="nome" value="" placeholder="Nome" id=""
                        class="borda-preta">
                    <input type="text" name="descricao" value="" placeholder="Descrição" id=""
                        class="borda-preta">
                    <input type="text" name="peso" value="" placeholder="Peso" id=""
                        class="borda-preta">
                    <select name="unidade_id">
                        <option>-- Selecione a Unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
