<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logradouro' => $this->faker->streetAddress(),
            'cidade' => $this->faker->city(),
            'bairro' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'cep' => str_replace('-','', $this->faker->postcode()),
            'complemento' => $this->faker->text(32),
            'cliente_id' => $this->faker->numberBetween(1, 15)
        ];
    }
}
