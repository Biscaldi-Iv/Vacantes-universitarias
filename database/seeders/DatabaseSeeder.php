<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Catedra;
use App\Models\PersonalUniversidad;
use App\Models\Postulacion;
use App\Models\Universidad;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Vacantes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email' => 'admin@admin.com', 'privilegio' => 3]);
        User::factory()->create(['email' => 'jefe@jefe.com','privilegio' => 2]);
        User::factory()->create(['email' => 'user@user.com','privilegio' => 1]);
        Usuario::factory()->create(['fkiduser' => 2]);
        Usuario::factory(10)->create();
        Catedra::factory(10)->create();
        Universidad::factory()->create(['nombreUniversidad' => 'UTN', 'emailRRHH' => 'info@utn.edu.ar', 'sitioWeb' => 'utn.edu.ar']);
        Universidad::factory()->create(['nombreUniversidad' => 'UNR', 'emailRRHH' => 'info@unr.edu.ar', 'sitioWeb' => 'unr.edu.ar']);
        Universidad::factory()->create(['nombreUniversidad' => 'UCA', 'emailRRHH' => 'info@uca.edu.ar', 'sitioWeb' => 'uca.edu.ar']);
        Universidad::factory()->create(['nombreUniversidad' => 'Austral', 'emailRRHH' => 'info@austral.edu.ar', 'sitioWeb' => 'austral.edu.ar']);
        Vacantes::factory(10)->create();
        PersonalUniversidad::factory(10)->create();
        Postulacion::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
