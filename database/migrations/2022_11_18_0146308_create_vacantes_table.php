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
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id('idVacante');
            $table->bigInteger('fkIdCatedra')->unsigned();
            $table->string('tituloVacante');
            $table->text('descCorta');
            $table->text('descCompleta');
            $table->tinyText('titulosRequeridos');
            $table->tinyText('horarioJornada');
            $table->dateTime('fechaLimite');
            $table->foreign('fkIdCatedra')->references('idCatedra')->on('catedras')
            ->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('vacantes');
    }
};
