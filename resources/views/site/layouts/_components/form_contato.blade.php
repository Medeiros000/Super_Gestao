{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @method('POST')
    @csrf

    <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}" value="{{ old("nome")}}">
    {{ $errors->has('nome') ? $errors->first('nome') : "" }}
    <br>

    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}" value="{{ old("telefone")}}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : "" }}
    <br>

    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}" value="{{ old("email")}}">
    {{ $errors->has('email') ? $errors->first('email') : "" }}
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old("motivo_contatos_id") == $motivo_contato->id ? "selected" : "" }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : "" }}
    <br>

    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem">{{ old("mensagem") != "" ? old("mensagem") : ''}}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : "" }}
    <br>
    
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

<div>
    @if(isset($errors) && count($errors) > 0)
        <div style="position: absolute; top: 0; left: 0; background-color: #ff0000; color: #fff; padding: 15px;">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
</div>