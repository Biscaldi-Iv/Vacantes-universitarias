<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('iduser');
            $table->tinyText('titulos');
            $table->tinyText('experiencia');
            $table->tinyText('con_asignatura');
            $table->tinyText('disponibilidad');
            $table->tinyText('congresos');
            $table->text('publicaciones');
            $table->text('con_profesionales');
            $table->text('educacion');
            $table->text('investigaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
