<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depoimento>
 */
class DepoimentosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'depoimento' => $this->faker->paragraph,
            'nome_user' => $this->faker->name,
            'foto' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        ];
    }
}
