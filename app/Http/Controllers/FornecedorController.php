<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index', ['titulo' => 'Fornecedores']);
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'ilike', '%' . $request->input('nome') . '%')
            ->where('site', 'ilike', '%' . $request->input('site') . '%')
            ->where('uf', 'ilike', '%'.$request->input('uf').'%' )
            ->where('email', 'ilike', '%'.$request->input('email').'%' )
            ->paginate(2);
        
        return view('app.fornecedor.listar', ['titulo' => 'Fornecedor - Listar', 'fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        // Se o token não estiver vazio e o id estiver vazio, então é um novo cadastro
        if ($request->input('_token') != '' && $request->input('id') == '') {
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

            $msg = 'Cadastro realizado com sucesso';

        } 
        
        // Se o token não estiver vazio e o id não estiver vazio, então é uma edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Atualização apresentou problema';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedor - Adicionar', 'msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        echo 'Fornecedor - Editar - ' . $id;
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedor - Editar' , 'fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
