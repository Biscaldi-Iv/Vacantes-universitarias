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
        Schema::create('personal_universidads', function (Blueprint $table) {
            $table->id('idUP');
            $table->bigInteger('fkIdUser')->unsigned();
            $table->bigInteger('fkIdUni')->unsigned();
            $table->foreign('fkIdUser')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fkIdUni')->references('idUniversidad')->on('universidads')
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
        Schema::dropIfExists('personal_universidads');
    }
};
