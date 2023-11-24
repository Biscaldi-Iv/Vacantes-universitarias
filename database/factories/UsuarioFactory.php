<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fkiduser' => User::factory()->create(['privilegio'=>1]),
            'titulos' => fake()->sentence(),
            'experiencia' => fake()->sentence(),
            'con_asignatura' => fake()->sentence(),
            'congresos' => fake()->sentence(),
            'publicaciones' => fake()->sentence(),
            'con_profesionales' => fake()->sentence(),
            'educacion' => fake()->sentence(),
            'investigaciones' => fake()->sentence(),

        ];
    }
}
