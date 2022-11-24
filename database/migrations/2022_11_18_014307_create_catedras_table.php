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
        Schema::create('catedras', function (Blueprint $table) {
            $table->id('idCatedra');
            $table->bigInteger('fkIdUniversidad', false, true);
            $table->string('nombreCatedra');
            $table->text('descripcion')->nullable();
            $table->foreign('fkIdUniversidad')->references('idUniversidad')->on('universidads')
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
        Schema::dropIfExists('catedras');
    }
};
