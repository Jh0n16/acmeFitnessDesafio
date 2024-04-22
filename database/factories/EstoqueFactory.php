<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tamanho' => $this->faker->randomElement(['P', 'M', 'G', 'GG', 'XGG']),
            'quantidadeDoEstoque' => $this->faker->randomNumber(3),
            'produto_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
