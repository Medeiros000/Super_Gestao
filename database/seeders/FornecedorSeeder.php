<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // instânciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        // método create
        Fornecedor::create([
            'nome' => 'Fornecedor200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        // insert (não inicia o created_at e nem o updated_at)
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
