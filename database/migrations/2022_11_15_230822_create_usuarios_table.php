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
            $table->bigInteger('fkiduser')->unsigned();
            $table->tinyText('titulos')->nullable();
            $table->tinyText('experiencia')->nullable();
            $table->tinyText('con_asignatura')->nullable();
            $table->tinyText('disponibilidad')->nullable();
            $table->tinyText('congresos')->nullable();
            $table->text('publicaciones')->nullable();
            $table->text('con_profesionales')->nullable();
            $table->text('educacion')->nullable();
            $table->text('investigaciones')->nullable();
            $table->timestamps();
            $table->foreign('fkiduser')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
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
