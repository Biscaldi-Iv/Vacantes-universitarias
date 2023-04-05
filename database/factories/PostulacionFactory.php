<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacantes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postulacion>
 */
class PostulacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fkIdUsuario' => User::all()->random()->id,
            'fkIdVacante' => Vacantes::all()->random()->idVacante,
            'titulo' => fake()->numberBetween(1,10),
            'experiencia' => fake()->numberBetween(1,10),
            'con_asignatura' => fake()->numberBetween(1,10),
            'congresos' => fake()->numberBetween(1,10),
            'publicaciones' => fake()->numberBetween(1,10),
            'con_profesionales' => fake()->numberBetween(1,10),
            'investigaciones' => fake()->numberBetween(1,10),
            'actitud' => fake()->numberBetween(1,10),
            'disponibilidad' => fake()->numberBetween(1,10),
            'entrevista' => fake()->numberBetween(1,10),
            'ubicacion' => fake()->numberBetween(1,10),
            'sueldo' => fake()->numberBetween(1,10),
            'relacion_uni' => fake()->numberBetween(1,10),
            'fechaPostulacion' => fake()->dateTimeBetween('-15 days. now')
        ];
    }
}
