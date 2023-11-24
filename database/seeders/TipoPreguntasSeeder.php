<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tipoPreguntas;

class TipoPreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipoPreguntas::factory()->create(['descripcion'=>'Navegacion']);
        tipoPreguntas::factory()->create(['descripcion'=>'Errores']);
        tipoPreguntas::factory()->create(['descripcion'=>'Cuenta de usuario']);
        tipoPreguntas::factory()->create(['descripcion'=>'Postulaciones']);
        tipoPreguntas::factory()->create(['descripcion'=>'Vacantes']);
    }
}
