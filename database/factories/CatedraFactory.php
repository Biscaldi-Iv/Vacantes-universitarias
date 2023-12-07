<?php

namespace Database\Factories;

use App\Models\Universidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catedra>
 */
class CatedraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreCatedra' => fake()->randomElement(['Matemática Superior', 'Legislación', 'Análisis Matemático', 'Comunicaciones', 'Redes']),
            'descripcion' => fake()->paragraph(),
        ];
    }
}
