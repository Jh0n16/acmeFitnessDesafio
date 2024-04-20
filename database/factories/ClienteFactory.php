<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomeCompleto' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###########'),
            'dataDeNascimento' => $this->faker->date('Y-m-d'),
        ];
    }
}
