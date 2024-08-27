<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
    @csrf

    <select name="produto_id">
        <option value="0">-- Selecione um Produto --</option>

        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}"
                {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }} {{ $produto->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <button type="submit" class="borda-preta">{{ isset($pedido_produto->id) ? 'Atualizar' : 'Cadastrar' }}</button>
</form>
