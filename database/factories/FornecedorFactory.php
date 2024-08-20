<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Faker\Provider\pt_BR\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company_nome = ucfirst(fake()->company());
        $clear_name_company = limpar($company_nome);
        return [
            'nome' => $company_nome,
            'site' => "$clear_name_company.com.br",
            'uf' => fake_estado(),
            'email' => "contato@$clear_name_company.com.br"
        ];
    }
}

function limpar($string)
{
    $pattern = [
        "/(á|à|ã|â|ä)/",
        "/(Á|À|Ã|Â|Ä)/",
        "/(é|è|ê|ë)/",
        "/(É|È|Ê|Ë)/",
        "/(í|ì|î|ï)/",
        "/(Í|Ì|Î|Ï)/",
        "/(ó|ò|õ|ô|ö)/",
        "/(Ó|Ò|Õ|Ô|Ö)/",
        "/(ú|ù|û|ü)/",
        "/(Ú|Ù|Û|Ü)/",
        "/(ñ)/",
        "/(Ñ)/",
        "/(ç)/",
        "/(Ç)/",
    ];
    $replacement = ['a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'n', 'N', 'c', 'C'];
    return str_replace([' ', '-', '.', '\''], '', preg_replace($pattern, $replacement, strtolower($string)));
}

function fake_estado()
{
    $br_abbr = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
    $f_n = fake()->numberBetween(0, 26);
    return $br_abbr[$f_n];
}