<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        // $pedido->produtos;
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => Produto::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ];
        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'O campo :attribute deve possuir um valor válido',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro',
            'quantidade.min' => 'A quantidade deve ser no mínimo 1',
        ];
        $request->validate($regras, $feedback);

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        $pedidoProduto->delete();
        // $pedido->produtos()->detach($produto->id);
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
        // return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }
}
