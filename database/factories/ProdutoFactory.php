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
            'nome' => $this->faker->word(),
            'cor' => $this->faker->colorName(),
            'imagem' => $this->faker->image(),
            'preco' => $this->faker->randomFloat(2, 0, 20),
            'descricao' => $this->faker->text(128),
            'peso' => $this->faker->randomFloat(2, 0, 1),
            'categoria_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
