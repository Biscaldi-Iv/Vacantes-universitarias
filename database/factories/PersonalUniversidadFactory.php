<?php

namespace Database\Factories;

use App\Models\Universidad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalUniversidad>
 */
class PersonalUniversidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fkIdUser' => User::factory()->create(['privilegio' => 2]),
            'fkIdUni' => Universidad::all()->random()->idUniversidad,
        ];
    }
}
