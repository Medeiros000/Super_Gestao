<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FornecedorSeeder::class,
            SiteContatoSeeder::class,
            MotivoContatoSeeder::class,
            ProdutoSeeder::class,
        ]);
    }
}
