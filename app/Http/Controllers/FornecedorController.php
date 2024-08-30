<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])->orderBy('id')->paginate(15);
        // dd($fornecedores);
        return view('app.fornecedor.index', [
            'titulo' => 'Listagem de Fornecedores',
            'fornecedores' => $fornecedores,
            'request' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('app.fornecedor.create', [
            'titulo' => 'Adicionar Fornecedor',
            'request' => $request->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:fornecedores',
            'site' => 'required',
            'uf' => 'required|size:2',
            'email' => 'required|email',
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está cadastrado',
            'uf.size' => 'O campo UF deve ter 2 caracteres',
            'email.email' => 'O campo email deve ser um email válido',
        ];
        $request->validate($regras, $feedback);

        $fornecedor = new Fornecedor();
        $fornecedor->create($request->all());

        return redirect()->route('fornecedor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('app.fornecedor.show', [
            'titulo' => 'Fornecedor',
            'fornecedor' => Fornecedor::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedor, Request $request)
    {
        return view('app.fornecedor.edit', [
            'titulo' => 'Fornecedor',
            'fornecedor' => $fornecedor,
            'request' => $request,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required|size:2',
            'email' => 'required|email',
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'uf.size' => 'O campo UF deve ter 2 caracteres',
            'email.email' => 'O campo email deve ser um email válido',
        ];
        $request->validate($regras, $feedback);

        $fornecedor = Fornecedor::find($id);
        $fornecedor->update($request->all());

        return redirect()->route('fornecedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        // $fornecedor->delete();
        $fornecedor->forceDelete();
        return redirect()->route('fornecedor.index');
    }

    /**
     * Search for the specified resource in storage.
     */
    public function search()
    {
        return view('app.fornecedor.search', [
            'titulo' => 'Pesquisar Fornecedores'
        ]);
    }

    /**
     * Search for the specified resource in storage.
     */
    public function results(Request $request)
    {
        $type =
            getenv('DB_CONNECTION') === 'pgsql' ?  'ilike' : 'like';
        // Postgres: ilike
        // MySQL: like
        $fornecedores = Fornecedor::with(['produtos'])
            ->where('nome',  $type, '%' . $request->input('nome') . '%')
            ->where('site',  $type, '%' . $request->input('site') . '%')
            ->where('uf',  $type, '%' . $request->input('uf') . '%')
            ->where('email',  $type, '%' . $request->input('email') . '%')
            ->paginate(15);

        return view('app.fornecedor.index', [
            'titulo' => 'Listagem de Resultados de Fornecedores',
            'fornecedores' => $fornecedores,
            'request' => $request->all(),
        ]);
    }
}
