<?php

namespace Database\Factories;

use App\Models\Catedra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacantes>
 */
class VacantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fkIdCatedra' => Catedra::all()->random()->idCatedra,
            'tituloVacante' => fake()->sentence(),
            'descCorta' =>fake()->sentence(),
            'descCompleta' =>fake()->sentence(),
            'titulosRequeridos' =>fake()->sentence(),
            'horarioJornada' =>fake()->sentence(),
            'fechaLimite' => fake()->dateTimeBetween('now','+15 days'),
        ];
    }
}
