<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Universidad>
 */
class UniversidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return
           [ 'nombreUniversidad' => fake()->company(),
            'direccionUniversidad' => fake()->address(),
            'telefono'=> fake()->phoneNumber(),
            'emailRRHH' => fake()->companyEmail(),
            'sitioWeb' => fake()->sentence(),
            ]
        ;
    }
}
