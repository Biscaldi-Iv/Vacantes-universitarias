<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\tipoPreguntas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preguntas>
 */
class PreguntasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pregunta' => fake()->sentence(),
            'respuesta' => fake()->sentence(),
            'fkIdTipoPregunta' => tipoPreguntas::all()->random()->idTipoPregunta,
        ];
    }
}
