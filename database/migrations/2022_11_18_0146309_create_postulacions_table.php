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
        Schema::create('postulacions', function (Blueprint $table) {
            $table->id('idPostulacion');
            $table->bigInteger('fkIdUsuario')->unsigned();
            $table->bigInteger('fkIdVacante')->unsigned();
            $table->dateTime('fechaPostulacion');
            $table->integer('titulo')->nullable();
            $table->integer('experiencia')->nullable();
            $table->integer('con_asignatura')->nullable();
            $table->integer('con_profesionales')->nullable();
            $table->integer('publicaciones')->nullable();
            $table->integer('congresos')->nullable();
            $table->integer('actitud')->nullable();
            $table->integer('disponibilidad')->nullable();
            $table->integer('entrevista')->nullable();
            $table->integer('ubicacion')->nullable();
            $table->integer('sueldo')->nullable();
            $table->integer('relacion_uni')->nullable();
            $table->integer('investigaciones')->nullable();
            $table->timestamps();
            $table->foreign('fkIdUsuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('fkIdVacante')->references('idVacante')->on('vacantes')->onUpdate('cascade')->onDelete('restrict');
            $table->unique(['fkIdUsuario', 'fkIdVacante']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulacions');
    }
};
