<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
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
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['titulo' => 'Detalhes do Produto', 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        echo 'Cadastro realizado com sucesso!';
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
     * 
     * @param ProdutoDetalhe $produtoDetalhe
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', [ 'titulo' => 'Detalhes do Produto', 'produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param ProdutoDetalhe $produtoDetalhe
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo 'Atualização realizada com sucesso!';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
