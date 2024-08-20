<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'descricao' => $this->faker->sentence,
            'peso' => $this->faker->numberBetween(1, 10),
            'unidade_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
