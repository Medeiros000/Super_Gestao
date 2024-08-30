@if (isset($fornecedor->id))
    <form action="{{ route('fornecedor.update', ['fornecedor' => $fornecedor->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('fornecedor.store') }}" method="post">
            @csrf
@endif

    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
    <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" id=""
        class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site"
        id="" class="borda-preta">
    {{ $errors->has('site') ? $errors->first('site') : '' }}
    <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF" id=""
        class="borda-preta">
    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
    <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="Email"
        id="" class="borda-preta">
    {{ $errors->has('email') ? $errors->first('email') : '' }}

    <button type="submit" class="borda-preta">{{ isset($fornecedor->id) ? 'Atualizar' : 'Cadastrar' }}</button>
</form>
