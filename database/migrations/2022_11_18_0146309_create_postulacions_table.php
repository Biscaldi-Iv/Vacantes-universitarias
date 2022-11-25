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
            $table->integer('titulo');
            $table->integer('experiencia');
            $table->integer('con_asignatura');
            $table->integer('con_profecionales');
            $table->integer('publicaciones');
            $table->integer('congresos');
            $table->integer('actitud');
            $table->integer('disponibilidad');
            $table->integer('entrevista');
            $table->integer('ubicacion');
            $table->integer('sueldo');
            $table->integer('relacion_uni');
            $table->integer('investigaciones');
            $table->timestamps();
            $table->foreign('fkIdUsuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('fkIdVacante')->references('idVacante')->on('vacantes')->onUpdate('cascade')->onDelete('restrict');
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
